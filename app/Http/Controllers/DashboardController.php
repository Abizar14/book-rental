<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $books = Books::count();
        $categories = Categories::count();
        $user_count = User::count();
        $user = User::paginate(5);
        return view('dashboard', [
            'book_count' => $books,
            'categories_count' => $categories,
            'user_count' => $user_count,
            'user' => $user
        ]);
    }
}
