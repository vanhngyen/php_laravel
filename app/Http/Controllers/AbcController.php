<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbcController extends Controller
{
    //
    public function index(){
        return view("home");
    }

//    public function login(){
//        return view("home");
//    }

    public function listcategory(){
       //query builder
//        $categories = DB::table("categories")->get();
       // dd($categories);
        //model(ORM)
        $categories = Category::withCount("Products")->paginate(20);
        //dd($categories);
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
            $data["message"] = "Vừa thêm 1 danh mục mới là ".$request->get("category_name");
            notify("global","new_category",$data);//["message"=>"thêm thành công"]
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-category");
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
        return redirect()->to("admin/list-category");
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        try {
            $category->delete();
            notify("home","home_page",[]);
        }catch (\Exception $exception){

        }
        return redirect()->to("admin/list-category");
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
        return view("brand.new");
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
        return redirect()->to("admin/list-brand");
    }

    public function editBrand($id){
//        $category = Category::find($id);
//        if(is_null($category))
//            abort(404);
        $brand = Brand::findOrFail($id);
        return view("brand.edit",["brand"=>$brand]);
       // dd($brands);
    }

    public function updateBrand($id,Request $request){
        $brand = Brand::findOrFail($id);
        $request->validate([
            "brands_name"=>"required|min:6|unique:brands,brands_name,{$id}"
        ]);
        try{
            $brand->update([
                "brands_name"=>$request->get("brands_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-brand");
    }

    public function deleteBrand($id){
            $brand = Brand::findOrFail($id);
            try {
                $brand->delete();
            }catch (\Exception $exception){

            }
            return redirect()->to("admin/list-brand");
    }



    //product
    public function listProduct(){
//        $products = Product::leftjoin("categories","categories.id,","=","products.category_id")
//            ->leftjoin("brands","brands.id","=","products.brand_id")
//            ->select("products.*","categories.category_name","brands.brands_name")->paginate(20);
        $products = Product::with("Category")->with("Brand")->paginate(20);
        //dd($products);
        return view("product.list",["products"=>$products]);
    }

    public function newProduct(){
        $categories = Category::all();
        $brands = Brand::all();

        return view("product.new",["categories"=>$categories,"brands"=>$brands]);
    }

    public function saveProduct(Request $request){
        $request->validate([
            "product_name"=>"required|string|min:6|unique:products",
            "product_desc"=>"required|string|min:2|unique:products",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:1",
            "category_id"=>"required",
            "brand_id"=>"required",
        ]);
        try {
            $product_image = null;
            //xử lí để đưa ảnh nên media trong public sau đó đưa nguồn file cho vào biến
            if($request->hasFile("product_image")){
                $file = $request->file("product_image");
                $allow = ["png","jpg","jpeg","gif","jfif"];
                $extName = $file->getClientOriginalExtension();//lay dưới
                if(in_array($extName,$allow)){
                    $fileName = time().$file->getClientOriginalName();//get fileName
                    $file->move(public_path("media"),$fileName);//upload file into public/media
                    //convert string to productImage
                    $product_image ="media/".$fileName;
                }

            }
            Product::create([
                "product_name"=>$request->get("product_name"),
                "product_image"=>$product_image,
                "product_desc"=>$request->get("product_desc"),
                "price" => $request->get("price"),
                "qty" => $request->get("qty"),
                "category_id" => $request->get("category_id"),
                "brand_id" => $request->get("brand_id"),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-product");
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        $category = Category::all();
        $brand = Brand::all();
        return view("product.edit",["product"=>$product,"categories"=>$category,"brands"=>$brand]);
    }

    public function updateProduct($id,Request $request){
        $product = Product::findOrFail($id);
        $request->validate([
            "product_name" => "required|min:3|unique:products,product_name,{$id}",
            "product_desc" => "required",
            "price" => "required|numeric|min:0",
            "qty" => "required|numeric|min:1",
            "category_id" => "required",
            "brand_id" => "required",
        ]);

        try {
            $product_image = $product->get("product_image");
            if($request->hasFile("product_image")){
                $file = $request->file("product_image");
                $allow = ["png","jpg","jpeg","gif","jfif"];
                $extName = $file->getClientOriginalExtension();
                if(in_array($extName,$allow)){
                    $fileName = time().$file->getClientOriginalName(); //  lấy tên gốc original của file gửi lên từ client
                    $file->move(public_path("media"),$fileName); // đẩy file vào thư mục media với tên là fileName
                    //convert string to ProductImage
                    $product_image = "media/".$fileName; // lấy nguồn file
                }
            }
            $product->update([
                "product_name"=>$request->get("product_name"),
                "product_image"=>$product_image,
                "product_desc"=>$request->get("product_desc"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "brand_id"=>$request->get("brand_id"),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("admin/list-product");
    }

    public function deleteProduct($id){
        $product = Product::findOrfail($id);
        try {
            $product->delete();
        }catch (\Exception $exception){

        }
        return redirect()->to("admin/list-product");
    }

    public function dashboard(){
        return view("dashboard");
    }
}

