@extends("layout")
@section("contentHeader","Brand")
@section("title","Create a new brand")
@section("Content")
    <!-- form start -->
    <form role="form" action="{{url("admin/save-brand")}}" method="post">
        @method("POST")
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Brand Name</label>
                <input class="form-control @error("brands_name") is-invalid @enderror" name="brands_name" type="text" id="exampleInputEmail1" placeholder="Brand name">
            </div>
            @error("brands_name")
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
