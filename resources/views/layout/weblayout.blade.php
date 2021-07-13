<!DOCTYPE html>
<html lang="en">

<head>

  @include('layout.webpartials.head')

</head>

<body class="fixed-sn white-skin">

  @include('layout.webpartials.header')

  @yield('content')

  @include('layout.webpartials.footer')

  @include('layout.webpartials.footer-scripts')

</body>

</html>