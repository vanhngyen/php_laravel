<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbcController extends Controller
{
    //
    public function index(){
        return view("home");
    }

    public function listcategory(){
       //query builder
//        $categories = DB::table("categories")->get();
       // dd($categories);
        //model(ORM)
        $categories = Category::paginate(20);
        //show with condition
        //$categories = Category::where("category_name","LIKE","v%")->get();
        //dd($categories);
        return view("category.list",[
            "categories"=>$categories
        ]);
    }

    public function newcategory(){
        return view("category.new");
    }

    public function savecategory(Request $request){
        $request->validate([
            "category_name"=>"required|string|min:6|unique:categories"
        ]);

        try {
            Category::create([
                "category_name"=>$request->get("category_name"),
            ]);//return an object of Category model
//            DB::table("categories")->insert([
//                "category_name"=>$request->get("category_name"),
//                "created_at"=>Carbon::now(),
//                "updated_at"=>Carbon::now(),
//            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-category");
    }

    public function editCategory($id){
//        $category = Category::find($id);
//        if(is_null($category))
//            abort(404);
        $category = Category::findOrFail($id);
        return view("category.edit",["category"=>$category]);
        //dd($category);
    }

    public function updateCategory($id,Request $request){
        $category = Category::findOrFail($id);
        $request->validate([
            "category_name"=>"required|min:6|unique:categories,category_name,{$id}"
        ]);
        try{
            $category->update([
                "category_name"=>$request->get("category_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-category");
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        try {
            $category->delete();
        }catch (\Exception $exception){

        }
        return redirect()->to("/list-category");
    }

    public function listbrand(){
        $brands = Brand::all();
        //show with condition
        //$categories = Category::where("category_name","LIKE","v%")->get();
        //dd($categories);
        return view("brand.list",[
            "brands"=>$brands
        ]);
    }

    public function newbrand(){
        return view("/brand.new");
    }

    public function savebrand(Request $request){
        $request->validate([
            "brands_name"=>"required|string|min:6|unique:brands"
        ]);

        try {
            Brand::create([
                "brands_name"=>$request->get("brands_name"),
            ]);//return an object of Category model
//            DB::table("categories")->insert([
//                "category_name"=>$request->get("category_name"),
//                "created_at"=>Carbon::now(),
//                "updated_at"=>Carbon::now(),
//            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }

    public function editBrands($id){
//        $category = Category::find($id);
//        if(is_null($category))
//            abort(404);
        $brands = Brand::findOrFail($id);
        return view("brand.edit",["brand"=>$brands]);
        //dd($category);
    }

    public function updateBrand($id,Request $request){
        $brands = Brand::findOrFail($id);
        $request->validate([
            "brands_name"=>"required|min:6|unique:brands,brands_name,{$id}"
        ]);
        try{
            $brands->update([
                "brands_name"=>$request->get("brands_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }

    public function deleteBrand($id){
        $brands = Brand::findOrFail($id);
        try {
            $brands->delete();
        }catch (\Exception $exception){

        }
        return redirect()->to("/list-brand");
    }


}
