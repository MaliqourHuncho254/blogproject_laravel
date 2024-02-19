<!DOCTYPE html>
<html>
  <head> 
    <!-- meta tags section -->
   @include('admin.css');
   <style  type="text/css">
    body{
        background-color: black;
    }
    .post_title{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
    }
   </style>
  </head>
  <body>
    <!-- header section -->
    @include('admin.header');
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar');
      <!-- Sidebar Navigation end-->
        <!-- section start -->
        <div class="page-content">
        <h1 class="post_title">Add Post</h1>
        </div>
        <!-- section ends -->
       <!-- footer section stert -->
       @include('admin.footer');
       <!-- footer section ends -->
  </body>
</html>
