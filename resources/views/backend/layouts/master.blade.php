<!DOCTYPE html>
<html lang="en">
<head>
@include('backend.layouts.header')
</head>

<body>
@include('backend.layouts.sidebar')
@include('backend.layouts.nav')

<div id="wrapper">

@yield('content')

</div>

@include('backend.layouts.footer')

</body>
</html>
