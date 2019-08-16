<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {   $categories = Category::orderBy('id', 'desc')->get();
        return view('category.index', compact('categories'));
    }
    public function create()
    {   
        $mainCategory = Category::where('parent_category_id', NULL)->get();
        return view('category.create', compact('mainCategory'));
    }
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:categories,name',
        ]);
        
        if ($validator->passes()) {
            $category = new Category();
            $category->name = $request->name;
            if ($request->parent_category_id) {
                $category->parent_category_id = $request->parent_category_id; 
            }
            $category->save();
            return response()->json(['successMsg'=> 'Category created successfully :)']);
        }else{
            return response()->json(['errorMsg'=> $validator->errors()->all()]); 
        }
    }
    public function edit($catId)
    {   
        $mainCategory = Category::where('parent_category_id', NULL)->get();
        $category = Category::where('id',$catId)->firstOrFail();
        return view('category.edit', compact('mainCategory', 'category'));
    }
    public function update(Request $request,$catId)
    {   
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:categories,name',
        ]);
        $category = Category::find($catId);
        if ($validator->passes()) {
            
            $category->name = $request->name;
            if ($request->parent_category_id) {
                $category->parent_category_id = $request->parent_category_id; 
            }
            $category->save();
            return response()->json(['successMsg'=> 'Category updated successfully :)']);
        }else{
            return response()->json(['errorMsg'=> $validator->errors()->all()]); 
        }
    }
    public function delete($catId)
    {   
        $category = Category::find($catId);
        if (!is_null($category)) {
            $category->delete();
        }
        \session()->flash('successMsg', 'Category deleted successfully :)');
        return \redirect()->back();
    }
}
