@extends("layout")
@section("Content")
    <div class=" col-xs-12">
        <h1 class="text-center"><i class="far fa-user-circle"></i></h1>
        <form action="#" method="post">
            <p style="color: white">Please enter your email :</p>
            <x-input.email name="email" holder="Email ..."/>
            <div class="text-center">
                <button type="submit" class="btn btn-danger btn-sm">Send</button>
            </div>
        </form>
    </div>
@endsection

