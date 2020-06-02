<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $categories = Category::all();
//        foreach ($categories as $p){
//            $slug = \Illuminate\Support\Str::slug($p->__get("category_name"));
//            $p->slug =$slug.$p->__get("id");
//            $p->save();
//        }
//        die("done");
        $featured =Product::orderBy("updated_at", "DESC")->limit(8)->get();
        $latest_1 =Product::orderBy("updated_at", "DESC")->limit(3)->get();
        $latest_2 =Product::orderBy("updated_at", "DESC")->offset(3)->limit(3)->get();
        //limit :laays 3 thang
        //offset : bo di 3 thang dau tien
        //offset = (page-1)*limit
        return view("frontend.home",[
            "featured" =>$featured,
            "latest_1"=>$latest_1,
            "latest_2"=>$latest_2
        ]);

    }
    public function category(Category $category){
        $products = $category->Products()->paginate(12);
        return view("frontend.category",[
            "category" =>$category,
            "products"=>$products
            //lấy những sản phẩm thuộc category đó
            //dùng thuận lơi cho việc nếu sau này có đổi tên category
        ]);
    }
    public function product(Product $product){
        //    $products = $product->Products()->paginate(12);
        $relativeProduct = Product::with("Category")->paginate(4);
        return view("frontend.product",[
            "product"=>$product,
            "relativeProducts"=>$relativeProduct
            //lấy những sản phẩm thuộc category đó
            //dùng thuận lơi cho việc nếu sau này có đổi tên category
        ]);
    }
}
