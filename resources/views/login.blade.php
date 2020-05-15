@extends("layout")
@section("Content")
    <div class="col-xs-6">
        <h1 class="text-center">Login</h1>
        <form action="#" method="post">
            <div class="form-group">
                <input class="form-control" name="email" type="email" placeholder="Email"/>
            </div>
            <div class="form-group">
                <input class="form-control" name="password" type="password" placeholder="Password"/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Login</button>
            </div>
        </form>
    </div>
@endsection
