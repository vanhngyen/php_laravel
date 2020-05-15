<!doctype html>
<html lang="en">
<head>
{{--   @include("components.head") kiểu cũ--}}
    <x-head/>
</head>
<body>
{{--    @include("components.header") kiểu cũ--}}
    <x-header/>
    <div class="container">
       @yield("Content")
    </div>
    <x-footer/>
{{--        @include("components.footer")--}}
</body>
</html>

