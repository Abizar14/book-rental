<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request) {
        // dd($request->all());

        if($request->judul) {
            $books = Books::where('judul', 'like', '%' .$request->judul. '%')->get();
        } else {
            $books = Books::all();
        }

        return view('book-lists', [
            'books' => $books
        ]);
    }
}
