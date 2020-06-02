@extends("layout")
@section("contentHeader","Product")
@section("title","Create a new product")
@section("Content")
    <!-- form start -->
    <form role="form" action="{{url("admin/save-product")}}" method="post" enctype="multipart/form-data">
        @method("POST")
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input class="form-control @error("product_name") is-invalid @enderror" name="product_name" type="text" id="exampleInputEmail1" placeholder="Product name">
                @error("product_name")
                <span class="error invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product Image</label>
                <input class="form-control" name="product_image" type="file" placeholder="Product image">
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea name="product_desc" placeholder="Description.." class="form-control @error("product_desc") is-invalid @enderror">
                    </textarea>
                @error("product_desc")
                <span class="error invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control @error("price") is-invalid @enderror" type="number" name="price" placeholder="Price.."/>
                @error("price")
                <span class="error invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input class="form-control @error("qty") is-invalid @enderror" type="number" name="qty" placeholder="Qty.."/>
                @error("qty")
                <span class="error invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->__get("id")}}">{{$category->__get("category_name")}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Brand</label>
                <select name="brand_id" class="form-control">
                    @foreach($brands as $brand)
                        <option value="{{$brand->__get("id")}}">{{$brand->__get("brands_name")}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <!-- /.card -->

    <!-- Form Element sizes -->

@endsection
