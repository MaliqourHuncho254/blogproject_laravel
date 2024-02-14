<!DOCTYPE html>
<html>
  <head> 
    <!-- meta tags section -->
   @include('admin.css');
  </head>
  <body>
    <!-- header section -->
    @include('admin.header');
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar');
      <!-- Sidebar Navigation end-->
        <!-- section start -->
        @include('admin.body');
        <!-- section ends -->
       <!-- footer section stert -->
       @include('admin.footer');
       <!-- footer section ends -->
  </body>
</html>
