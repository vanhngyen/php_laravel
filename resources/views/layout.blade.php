<!doctype html>
<html lang="en">
<head>
   @include("components.head")
</head>
<body>
<header>
    @include("components.header")
</header>
<div class="container">
   @yield("Content")
</div>
<footer>
    @include("components.footer")
</footer>
</body>
</html>

