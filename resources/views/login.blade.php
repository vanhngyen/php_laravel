@extends("layout")
@section("Content")
    <div class=" col-xs-12">
        <h1 class="text-center"><i class="far fa-user-circle"></i></h1>
        <form action="#" method="post">
            <x-input.email name="email" holder="Email ..."/>
            <x-input.password name="password" holder="Password ..."/>
            <a href="#" style="font-size: 10px; color: crimson ; text-decoration: none">forgot password ?
                <a style="font-size: 10px; color: crimson">Click Here</a>
            </a>
            <div class="text-center">
                <button type="submit" class="btn btn-danger btn-sm">Login</button>
            </div>
        </form>
    </div>
@endsection
