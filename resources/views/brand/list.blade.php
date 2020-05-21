@extends("layout")
@section("contentHeader","Brand")
@section("title","Brand List")
@section("Content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Brand Listing</h3>
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
            <a href="{{"new-brand"}}" class="float-right btn btn-outline-primary">+</a>
        </div>
        <!-- /.card-header -->

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{$brand->__get("id")}}</td>
                        <td>{{$brand->__get("brands_name")}}</td>
                        <td>{{$brand->__get("created_at")}}</td>
                        <td>{{$brand->__get("updated_at")}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
