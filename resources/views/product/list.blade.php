@extends("layout")
@section("contentHeader","Product")
@section("title","Product Listing")
@section("Content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Listing</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <a href="{{url("admin/new-product")}}" class="float-right btn btn-outline-primary">+</a>
        </div>
        <!-- /.card-header -->

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)

                    <tr>
                        <td>{{$product->__get("id")}}</td>
                        <td>{{$product->__get("product_name")}}</td>
                        <td><img src="{{$product->getImage()}}" width="50" height="50"/></td>
                        <td>{{$product->__get("product_desc")}}</td>
                        <td>{{number_format($product->__get("price"))}}$</td>
                        <td>{{$product->__get("qty")}}</td>
                        <td>{{$product->Category->__get("category_name")}}</td>
                        <td>{{$product->Brand->__get("brands_name")}}</td>
                        <td>{{$product->__get("created_at")}}</td>
                        <td>{{$product->__get("updated_at")}}</td>
                        <td>
                            <a href="{{url("admin/edit-product/{$product->__get("id")}")}}" class="btn btn-warning waves-effect">Edit</a>
                        </td>
                        <td>
                            <form action="{{url("admin/delete-product/{$product->__get("id")}")}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button type="submit" onclick="return confirm('are you sure?');" class="btn btn-danger waves-effect">delete</button>
                            </form>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
