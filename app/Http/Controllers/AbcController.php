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
        $categories = Category::all();
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

    public function brandlist(){
        //$brands = DB::table("brands")->get();

        $brands = Brand::all();
        return view("brand.list",[
            "brands"=>$brands
        ]);
    }

    public function newbrand(){
        return view("brand.new");
    }

    public function savebrand(Request $request){
        $request->validate([
            "brands_name"=>"required|string|min:6|unique:brands"
        ]);

        try {
            Brand::create([
                "brands_name"=>$request->get("brands_name"),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/brand-list");
    }
}
