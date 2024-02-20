<!DOCTYPE html>
<html>
<head> 
    <!-- meta tags section -->
    @include('admin.css');
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

            @if(session()->has('success'))
            <div>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('success')}}
            </div>
            @endif

            <h1 class="post_title">Add Post</h1>
            <!-- This is where we are going to start from -->
            <div>
                <!-- creation of form -->
                <form method="POST" action="{{ url('add_post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label for="">Post Title :</label><br>
                        <input type="text" name="title" id="" placeholder="Enter post title"><br><br>
                    </div>
                    <!-- second div -->
                    <div class="div_center">
                        <label for="">Post Description :</label><br>
                        <textarea name="description"></textarea>
                    </div>
                    <!-- third div -->
                    <div class="div_center">
                        <label for="">Add Image :</label><br>
                        <input type="file" name="image">
                    </div>
                    <!-- Fourth div -->
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary"> 
                    </div>
                </form>
            </div>
        </div>
        <!-- section ends -->
        <!-- footer section start -->
        @include('admin.footer')
        <!-- footer section ends -->
    </div>
</body>
</html>
