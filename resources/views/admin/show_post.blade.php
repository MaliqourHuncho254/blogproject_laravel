<!DOCTYPE html>
<html>
  <head> 
    <!-- sweetalrt cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <!-- this is for delete message -->
            @if(session()->has('success'))
            <!-- this is for our div -->
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('success') }}
            </div>
            @endif

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
                    <!--delete  -->

                    <th>Delete</th>

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

                    <!-- sixth delete button -->
                    <td>
                        <a href="{{url('delete_post',$post->id )}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- section ends -->
       <!-- footer section stert -->
       @include('admin.footer');
       <!-- footer section ends -->
       <script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');

        swal({
            title: "Are you Sure to delete this",
            text: "You won't be able to revert this delete",
            icon: "warning", // Change "Warning" to "warning"
            button: true,
            dangerMode: true,
        }).then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>
 <!-- this is the new pull request  -->
 <!-- trying to complete the submission -->
  </body>
</html>

