<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/hh.css') }}">
</head>
<body>
	@yield('noi_dung')
	@section('sidebar')
        This is the master sidebar.
    @show
</body>
</html>