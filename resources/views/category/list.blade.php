@extends("layout")
@section("contentHeader","Category")
@section("title","Category Listing")
@section("Content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category Listing</h3>

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
            <a href="{{url("admin/new-category")}}" class="float-right btn btn-outline-primary">+</a>
        </div>
        <!-- /.card-header -->

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Product Count</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->__get("id")}}</td>
                    <td>{{$category->__get("category_name")}}</td>
                    <td>{{$category->__get("products_count")}}</td>
                    <td>{{$category->__get("created_at")}}</td>
                    <td>{{$category->__get("updated_at")}}</td>
                    <td>
                        <a href="{{url("admin/edit-category/{$category->__get("id")}")}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{url("admin/delete-category/{$category->__get("id")}")}}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-outline-primary">DELETE</button>
                        </form>
                    </td>

                @endforeach
                </tr>
                </tbody>
            </table>
            {!! $categories->links() !!}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
