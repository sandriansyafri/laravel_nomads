
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') | NOMADS </title>
    @include('includes.admin.style')
</head>

<body id="page-top">

    <div id="wrapper">
        @include('includes.admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('includes.admin.navbar')
                @yield('content')
            </div>
            {{-- @include('includes.admin.footer') --}}
        </div>
    </div>

    @include('includes.admin.scroll-to-top')
    @include('includes.admin.modal-logout')
    @include('includes.admin.script')
</body>

</html>