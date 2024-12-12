{{-- Layout for Welcome.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pilter</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{asset('owl/dist/assets/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('owl/dist/assets/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('owl/dist/assets/owl.theme.default.min.css')}}">
    </head>
    <body>
        {{-- Navbar --}}
        <header>
            @if (Route::has('login'))
                <nav class="navbar navbar-expand-md shadow-sm">
                    <div class="container-lg">
                        <!-- Brand Name -->
                        <a class="navbar-brand text-light fw-bold fs-3" href="{{ url('/') }}">
                            <span class="text-info">Pil</span><span class="text-light">ter</span>
                        </a>

                        <!-- Toggler for Mobile View -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Collapsible Content -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Right Side Links -->
                            <ul class="navbar-nav ms-auto">
                                @auth
                                    <!-- Dashboard Link for Authenticated Users -->
                                    <li class="nav-item">
                                        <a href="{{ url('/home') }}" class="nav-link text-light fs-5">
                                            {{ __('Dashboard') }}
                                        </a>
                                    </li>
                                @else
                                    <!-- Login Link -->
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link text-light fs-5">
                                            {{ __('Login') }}
                                        </a>
                                    </li>

                                    <!-- Register Link -->
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="nav-link text-light fs-5">
                                                {{ __('Register') }}
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            @endif
        </header>

        
        <main class="py-0">
            @yield('content')
        </main>

        <footer>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script src="{{ asset('owl/dist/owl.carousel.min.js') }}"></script>

            
            <script>
                $(document).ready(function() {
                    var owl = $('.owl-carousel');
                    owl.owlCarousel({
                        items: 1,
                        loop: true,
                        margin: 10,
                        autoplay: true,
                        autoplayTimeout: 1500,
                        autoplayHoverPause: true
                    });
                });
            </script>
        </footer>

</body>
</html>
    