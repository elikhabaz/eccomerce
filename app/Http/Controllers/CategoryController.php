<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Console\View\Components\Alert;
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
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('all-categories')->with('statuse','category saved!');
    }

    public function editcategory($id){
        $category = Category::find($id);
        return view('admin.category.editcategory')->with('category' , $category);
    }

    public function updatecategory(Request $request , $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
        return view('admin.category.all-categories');
        // redirect('all-categories')->with('status' , 'UPdate');
    }
}
