<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index() {
        $books = Books::paginate(5);
        return view('books', [
            'books' => $books
        ]);
    }

    public function add() {
        $categories = Categories::all();
        return view('books-add', [
            'categories' => $categories
        ]);
    }

    public function addBook(Request $request) {
        $validate = $request->validate([
            'kode_buku' => 'unique:books,kode_buku'
        ]);

        $newName = '';
        if($request->hasFile('image')) {
            // get name file orginal
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->judul.'-'.now()->timestamp.'.'.$extension;
            // upload cover to folder public/storage/cover
            $request->file('image')->storeAs('cover', $newName);
            // dd($newName);
        }

        $request['cover'] = $newName;
        $books = Books::create($request->all());
        $books->categories()->sync($request->categories);

        return redirect()->route('books')->with('success', 'Buku Berhasil Ditambahkan');

    }

    public function editBook($id) {
        $books = Books::findOrFail($id);
        $categories = Categories::all();
        return view('books-edit', [
            'books'  => $books,
            'categories' => $categories
        ]);
    }

    public function updateBook(Request $request, $id) {
        $newName = '';
        if($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->judul.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Books::where('id', $id)->first();
        $book->update();

        if($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect()->route('books')->with('success', 'Success Edit');
    }

    public function deleteBook($id) {
        $category = Books::findOrFail($id);
        $category->delete();
        return back()->with('successDelete','Book berhasil dihapus!');

    }

    public function viewBookSoftDelete() {
        $softDeleteBooks = Books::with(['categories'])->onlyTrashed()->paginate(5);
        return view('books-softdelete', [
            'softDeleteBooks'=> $softDeleteBooks
        ]);
    }

    public function restoreBooks($id) {
        $books = Books::where('id', $id);
        $books->restore();

        return redirect()->back()->with('successRes', 'Restore Data Berhasil');
    }

    public function deletePermanentlyBook($id) {
        $books = Books::where('id', $id);
        $books->forceDelete();

        return redirect()->back()->with('successDel', 'Delete Data Permanent Berhasil');
    }
}
