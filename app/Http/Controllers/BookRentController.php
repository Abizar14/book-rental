<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\RentLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookRentController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role_id', '!=', 1)->where('status' , '!=', 'inactived')->get();
        $book = Books::all();
        $rent = RentLog::where('user_id', $request->user_id)->where('books_id', $request->books_id)->where('actual_ended_date', null);
        return view('book-rent', [
            'user' => $user,
            'book' => $book,
            'rent' => $rent
        ]);
    }

    public function store(Request $request)
    {
        $request['started_at'] = Carbon::now()->toDateString();
        $request['ended_at'] = Carbon::now()->addDay(6)->toDateString();

        $book = Books::findOrFail($request->books_id)->only('status');
        
        if($book['status'] != 'in stock') {
            return redirect()->back()->with('message', 'The book is not available, because the book is on loan');
        } else {
            $count = RentLog::where('user_id', $request->user_id)->where('actual_ended_date', NULL)->count();
            if ($count >= 3){
                return redirect()->back()->with('error', 'You can only rent 3 books at a time');
            } else {
                try {
                    DB::beginTransaction();
                        RentLog::create($request->all());
                        $book = Books::findOrFail($request->books_id);
                        // $book->status = 'no stock';
                        $book->stok--;
                        $book->save();
                    DB::commit();
                    return redirect()->route('bookRent')->with('success', 'Book rented successfully');
                } catch (\Exception $e) {
                    DB::rollBack();
                        return redirect()->back()->with('errorRent', 'Book rented failed');
                }
            }
            
        }
        
        
    }
}
