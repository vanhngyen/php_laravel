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
        $most_views = Product::orderBy("view_count","DESC")->limit(8)->get();
        $featured =Product::orderBy("updated_at", "DESC")->limit(8)->get();
        $latest_1 =Product::orderBy("updated_at", "DESC")->limit(3)->get();
        $latest_2 =Product::orderBy("updated_at", "DESC")->offset(3)->limit(3)->get();
        //limit :laays 3 thang
        //offset : bo di 3 thang dau tien
        //offset = (page-1)*limit
        return view("frontend.home",[
            "most_views"=>$most_views,
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
        if(!session()->has("view_count_{$product->__get("id")}")){
            $product->increment("view_count");
            session(["view_count_{$product->__get("id")}"=> true]);
        }
        return view("frontend.product",[
            'product'=> $product
        ]);
    }

    public function addToCart(Product $product,Request $request){
        $qty = $request->has("qty")&& (int)$request->get("qty")>0?(int)$request->get("qty"):1;
        $myCart = session()->has("my_cart")&& is_array(session("my_cart"))?session("my_cart"):[];
        $contain = false;
        foreach ($myCart as $key=>$item){
            if($item["product_id"] == $product->__get("id")){
                $myCart[$key]["qty"] += $qty;
                $contain = true;
                break;
            }
        }
        if(!$contain){
            $myCart[] = [
                "product_id" => $product->__get("id"),
                "qty" => $qty
            ];
        }
        session(["my_cart"=>$myCart]);
        return redirect()->to("/shopping-cart");
    }

    public function shoppingCart(){
        $myCart = session()->has("my_cart") && is_array(session("my_cart"))?session("my_cart"):[];
        $productIds = [];
        foreach ($myCart as $item){
            $productIds[] = $item["product_id"];
        }
        $grandTotal = 0;
        $products = Product::find($productIds);
        foreach ($products as $p){
            foreach ($myCart as $item){
                if($p->__get("id") == $item["product_id"]){
                    $grandTotal += ($p->__get("price")*$item["qty"]);
                    $p->cart_qty = $item["qty"];
                }
            }
        }
        return view("frontend.cart",[
            "products"=>$products,
            "grandTotal" => $grandTotal
        ]);
    }

    public function checkout(){
        return view("frontend.checkout");
    }
}
