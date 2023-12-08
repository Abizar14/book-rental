<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Books;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentLogController extends Controller
{
    public function index() {
        $rent = RentLog::with(['user', 'book'])->paginate(5);
        return view('rent-log', [
            'rent' => $rent
        ]);
    }

    public function returnBook(Request $request) {
        $user = User::where('role_id', '!=', 1)->where('status' , '!=', 'inactived')->get();
        $book = Books::all();
        $rent = RentLog::with(['user', 'book'])->where('user_id', Auth::user()->id)->paginate(5);
        return view('return-book', [
            'user' => $user,
            'book' => $book,
            'rent' => $rent
        ]);
    }

    public function saveReturnBook(Request $request){
        $rent = RentLog::where('user_id', $request->user_id)->where('books_id', $request->books_id)->where('actual_ended_date', null);
        $rentFirst = $rent->first();
        $rentCount = $rent->count();
        // dd($book);
        
        if($rentCount == 1) {
            // jika rentan hanya satu buku, maka update status menjadi selesai dan kembalikan ke book
            $rentFirst->actual_ended_date = Carbon::now()->toDateString();
            $rentFirst->save();
            
            // Update book status to 'in stock'
            $book = Books::findOrFail($request->books_id);
            // $book->status = 'in stock';
            $book->stok++;
            $book->save();

            return redirect('return-book')->with('success', 'Return Book Successfully');
        } else {
            return redirect('return-book')->with('error', 'Proccess Return Error');
        }
    }
}
