
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  @include('manager.includes.css')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    @include('manager.includes.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
    
    @include('manager.includes.header')
      <div class="container-fluid">
        <!--  Row 1 -->
        
        @yield('content')

        
    @include('manager.includes.footer')
</body>

</html>