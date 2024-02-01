<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css')
</head>

<body class='flex flex-col min-h-screen'>
    <!-- navbar section starts  -->
    <nav class="bg-sky-700">
        <div class=" relative container max-w-screen-xl mx-auto px-4 md:py-2 py-4">
            <div class="row items-center justify-between text-white">
                <div class="w-full md:w-3/4 px-4 md:py-2 py-4 ">
                    <ul class=" nav-bar hidden md:flex flex-wrap items-center justify-start space-x-4 ">
                        <li class=" py-3"><a href="{{ route('home') }}" class=" relative ">Home</a></li>

                        @guest
                            <li class=" py-3"><a href="{{ route('login') }}" class=" relative ">Login</a></li>
                            <li class=" py-3"><a href="{{ route('signup') }}" class=" relative ">Register</a></li>
                        @endguest

                    </ul>
                </div>
                <div class="w-1/4 px-4">
                    <ul class=" hidden lg:flex flex-wrap items-center justify-end gap-4">
                        @auth
                            <li class=" py-3 balance">00 BDT</li>
                            <li class=" py-3"><a href="{{ route('profile') }}" class=" relative">Profile</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="w-full relative px-5 my-1">
                    <ul class="md:hidden sm:flex justify-start items-center ">
                      <li class=""><a href="{{route("profile")}}" class="absolute -top-8 text-lg">Profile</a></li>
                    </ul>
                  </div>
                <!-- =================Mobile Menu Button=================== -->
                <span class="mobile-menu-btn cursor-pointer absolute block lg:hidden top-1/3 right-4">
                    <i class="fas fa-bars fa-2xl "></i>
                </span>
                <!-- =================Mobile Menu Button End=================== -->
            </div>
            <!-- ========================Mobile Menu=============================== -->
            <div class="mobile-menu hidden lg:hidden relative">
                <ul class="z-30  absolute top-0 w-full divide-y rounded-sm bg-sky-400 shadow-xl">
                    <li class="px-2 py-3"><a href="{{ route('home') }}" class=" relative ">Home</a></li>
                    @guest
                        <li class=" py-3"><a href="{{ route('login') }}" class=" relative ">Login</a></li>
                        <li class=" py-3"><a href="{{ route('signup') }}" class=" relative ">Register</a></li>
                    @endguest
                </ul>
            </div>
            <!-- ========================Mobile Menu END=============================== -->
        </div>
    </nav>
    <!-- navbar section ends  -->


    @yield('body')


    <!-- footer section starts -->
    <div class="bg-sky-700 mt-auto">
        <div class="container max-w-screen-xl mx-auto px-4 py-4 ">
            <div class="row">
                <div class="w-full text-center px-4 text-white">
                    <p class="font-semibold"> <span class="pr-2"><i class="fa-regular fa-copyright "> </i> 2024</span>
                        All rights
                        reserved by <a href="index.html" class="text-lg hover:text-black ">COMPANY NAME</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section ends -->


    <script>
        function getClickBalance() {
            console.log("getClickBalance");
            @auth
            axios.post('/balance/click')
                .then(function(response) {
                    // Handle the successful response here
                    console.log(response.data);
                    if (response.data.clickBalance) {
                        document.querySelector('.balance').innerHTML = response.data.clickBalance + " BDT"
                    }
                })
                .catch(function(error) {
                    // Handle any errors that occurred during the request
                    console.error(error);
                });
        @endauth
        }

        document.addEventListener("DOMContentLoaded", function() {
            getClickBalance();
        });
    </script>

    @yield('script')

</body>

</html>
