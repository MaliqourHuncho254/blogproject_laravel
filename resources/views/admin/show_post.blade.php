<!DOCTYPE html>
<html>
  <head> 
    <!-- meta tags section -->
   @include('admin.css');
<!-- this is for my styling just because once you remove this the background color will be white -->

   <style type="text/css">
        body {
            background-color: black;
        }
        .title_deg{
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .table_deg{
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 70px;

        }

        .th_deg{
            background-color: skyblue;
            color: white;
        }
        .img_deg{
            height: 100px;
            width: 150px;
            padding: 10px;
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

        <!-- this is for   the show page-->
        <div class="page-content">
            <h1 class="title_deg">All Post</h1>

            <table class="table_deg">
                <tr class="th_deg">
                    <!-- first -->
                    <th>Post title</th>
                    <!-- second -->
                    <th>Description</th>
                    <!-- third -->
                    <th>Post by</th>
                    <!-- fourth -->
                    <th>Post status</th>
                    <!-- fifth -->
                    <th>UserType</th>
                    <!-- sixth -->
                    <th>Image</th>
                </tr>
                @foreach ($post as $post)
                <!-- the second tr-->
                <tr>
                    <!-- first -->
                    <td>{{$post->title}}</td>
                    <!-- second -->
                    <td>{{$post->description}}</td>
                    <!-- thlird -->
                    <td>{{$post->name}}</td>
                    <!-- third -->
                    <td>{{$post->post_status}}</td>
                    <!-- fourth -->
                    <td>{{$post->usertype}}</td>
                    <!-- fifth -->
                    <td>
                        <img class="img_deg" src="postimage/{{$post->image}}" >
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- section ends -->
       <!-- footer section stert -->
       @include('admin.footer');
       <!-- footer section ends -->
  </body>
</html>

