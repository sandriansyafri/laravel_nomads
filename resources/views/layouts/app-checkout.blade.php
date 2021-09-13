
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title') | NOMADS</title>
    @include('includes.user.style')
    @stack('css')
  </head>
  <body>

    @include('includes.user.navbar-checkout')
      @yield('content');
    @include('includes.user.footer')
    @include('includes.user.script')
    @stack('js')
  </body>
</html>
