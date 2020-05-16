@extends("layout")
@section("Content")
    <div class="col-xs-12">
        <h1 class="text-center"><i class="far fa-user-circle"></i></h1>
        <form action="?route=post_register" method="post">
            <x-input.textField name="name" holder="Name ..."/>
            <x-input.email name="email" holder="Email ..."/>
            <x-input.password name="password" holder="Password .."/>
            <div class="text-center">
                <button type="submit" class="btn btn-danger btn-sm">Register</button>
            </div>
        </form>
    </div>
@endsection
