
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  @include('user.includes.css')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    @include('user.includes.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
    
    @include('user.includes.header')
      <div class="container-fluid">
        <!--  Row 1 -->
        
        @yield('content')

        
    @include('user.includes.footer')
</body>

</html>