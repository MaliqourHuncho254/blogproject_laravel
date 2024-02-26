<!DOCTYPE html>
<html>
  <head> 
  <style type="text/css">
        body {
            background-color: black;
        }

        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .div_center {
            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .alert {
            color: white;
            background-color: green;
            border-color: green;
        }

        .close {
            color: white;
            opacity: 1;
        }
    </style>
    <!-- meta tags section -->
    <base href="/public">
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
        
         <div class="page-content">
                <!-- this is for delete message -->
                @if(session()->has('success'))
            <!-- this is for our div -->
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('success') }}
            </div>
            @endif



         <h1 class="post_title">Update Post</h1>
            <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="div_center">
                        <label for="">Post Title :</label><br>
                        <input type="text" name="title" id="" placeholder="Enter post title" value="{{$post->title}}"><br>
                    </div>
                    <!-- second div -->
                    <div class="div_center">
                        <label for="">Post Description :</label><br>
                        <textarea name="description">{{$post->description}}</textarea>
                    </div>
                    <!-- Updating on something new -->
                    <div class="div_center">
                        <label for="">Old Image</label>
                        <br>
                        <img style="margin: auto;" height="100px" width="150px" src="/postimage/{{$post->image}}"><br>
                    </div>
                    <!-- third div -->
                    <div class="div_center">
                        <label for="">Update Old Image :</label><br>
                        <input type="file" name="image">
                    </div>
                    <!-- Fourth div -->
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary" value="Update"> 
                    </div>
            </form>
         </div>
        <!-- section ends -->
       <!-- footer section stert -->
       @include('admin.footer');
       <!-- footer section ends -->
  </body>
</html>

