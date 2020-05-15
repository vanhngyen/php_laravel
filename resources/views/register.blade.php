@extends("layout")
@section("Content")
    <div class="col-xs-6">
        <h1 class="text-center">Register</h1>
        <form action="?route=post_register" method="post">
{{--            <div class="form-group">--}}
{{--                <input class="form-control" name="name" type="text" placeholder="Name"/>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <input class="form-control" name="email" type="email" placeholder="Email"/>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <input class="form-control" name="password" type="password" placeholder="Password"/>--}}
{{--            </div>--}}
            <x-input.textField name="name" holder="Name ..."/>
            <x-input.email name="email" holder="Email ..."/>
            <x-input.password name="password" holder="Password .."/>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Register</button>
            </div>
        </form>
    </div>
@endsection
