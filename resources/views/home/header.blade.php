<div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
        <div class="menu_main">
            <ul>
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <!-- I have remove the services that was below here -->
                <li><a href="blog.html">Blog</a></li>
                <!-- This is where i will place the text that i have copied from the welcome.blade.php file -->
            @if (Route::has('login'))
            <!-- Auth statement -->
            @auth
            <!-- It will be taking us to home -->
            <li>
            <x-app-layout>
                
            </x-app-layout>
            </li>
            <!-- This is used to call register and login if there is no auth -->
            @else
                <li><a href="{{ route('login') }}">Login</a></li>

                <li><a href="{{ route('register') }}">Register</a></li>
                <!-- Endauth  -->
                @endauth
                <!-- This is where i will place my endif statement -->

                @endif
            </ul>
        </div>
    </div>
</div>
