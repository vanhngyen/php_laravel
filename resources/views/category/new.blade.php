@extends("layout")
@section("contentHeader","Category")
@section("title","Create a new category")
@section("Content")
    <!-- form start -->
    <form role="form" action="{{url("save-category")}}" method="post">
        @method("POST")
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input class="form-control @error("category_name") is-invalid @enderror" name="category_name" type="text" id="exampleInputEmail1" placeholder="Category name">
            </div>
            @error("categori_name")
                <span class="error invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
    <!-- /.card -->

    <!-- Form Element sizes -->

@endsection
