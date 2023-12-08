<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index() {
        $categories = Categories::paginate(5);
        return view('categories', [
            'categories' => $categories
        ]);
    }
    
    public function add() {
        return view('categories-add');
    }

    public function addCategory(Request $request) {
        $name = $request->name;

        Categories::create([
            'name' => $name
        ]);

        return redirect()->route('categories')->with('success', 'Category Berhasil Ditambahkan');

    }

    public function edit($id) {
        $category = Categories::findOrFail($id);
        return view('categories-edit', [
            'category'  => $category,
        ]);
    }

    public function addUpdate(Request $request, $id) {
        // Validate data
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Categories::findOrFail($id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('categories')->with('successEdit', 'Category Berhasil Di Edit');
    }
    

    public function deleteCategory($id) {
        $category = Categories::findOrFail($id);
        $category->delete();
        return back()->with('successDelete','Kategori berhasil dihapus!');

    }

    public function viewCategorySoftDelete() {
        $softDeleteCategories = Categories::onlyTrashed()->paginate(5);
        return view('categories-softdelete', [
            'softDeleteCategories'=> $softDeleteCategories
        ]);
    }

    public function restoreCategory($id) {
        $restore = Categories::where('id', $id);
        $restore->restore();

        return redirect()->back()->with('successRes', 'Restore Data Berhasil');
    }

    public function deletePermanentlyCategory($id) {
        $delete = Categories::where('id', $id);
        $delete->forceDelete();

        return redirect()->back()->with('successDel', 'Delete Data Permanent Berhasil');
    }
}
