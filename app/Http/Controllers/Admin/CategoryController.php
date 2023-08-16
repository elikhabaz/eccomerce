<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allcategories(){
        $categories = Category::all();
        return view('admin.category.all-categories' , compact('categories'));
    }

    public function createcategory(){
        return view('admin.category.createcategory');
    }

    public function storecategory(Request $request){
        $request->validate([
            'name'=>['required','string','max:255']
        ]);
        $category = new Category();
        $category-> name = $request->name;
        $category->save();
        return redirect(route('all-categories'))->with('status','category saved!');
    }

    public function editcategory($id){
        $category = Category::find($id);
        return view('admin.category.editcategory')->with('category' , $category);
    }

    public function updatecategory(Request $request , $id){
        $request->validate([
            'name'=>['required','string','max:255']
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
        return redirect('all-categorise')->with('upd' , 'UPdate');
    }

    // public function distroy($id){
    //     $category = Category::findOrFail($id);
    //     $category->delete();
    //     return redirect()->route('all-categories')->with('del' , 'deleted');
    // }


    public function deletecategory($id){
        $category= Category::find($id);
        $category->delete();
        return response()->json(['status' => 'category deleted successfully']);
    }
}
