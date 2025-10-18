<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UMT</title>

    {{-- FAVICON --}}
    <link rel="icon" href={{ asset('img1/logo.png') }} type="image/x-icon">

    {{-- BOOTSTRAP CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- TAILWINDCSS --}}
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{ asset('css1/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css1/lightbox.css') }}">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    {{-- SWIPPER CSS TESTIMONI --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />

    {{-- OWL CAROUSEL --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- NAVBAR ICON --}}
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">








    <style>
        .hero-section {
            background-image: url('{{ asset('img1/Rectangle 8.png') }}');
            background-size: 100% 100%;
            animation: bgChange 30s infinite steps(1);
            /* background-position: fixed; */
            width: 100%;
            height: 100vh;
            background-attachment: fixed;
            background-size: cover;
            /* optional: to cover the entire viewport */
            background-position: center;

        }

        @keyframes bgBlink {

            0%,
            33%,
            66%,
            100% {
                opacity: 1;
            }

            34%,
            67%,
            1% {
                opacity: 0;
            }
        }

        @keyframes bgChange {
            25% {
                background-image: url('{{ asset('img1/bgtailor.png') }}');
                background-size: cover;
                background-repeat: no-repeat;
            }

            50% {
                background-image: url('{{ asset('img1/ready.png') }}');
                background-size: cover;
                background-repeat: no-repeat;
            }

            75% {
                background-image: url('{{ asset('img1/Rectangle 8.png') }}');
                background-size: cover;
                background-repeat: no-repeat;
            }


        }

        .tooltip-text {
            display: none;
            position: absolute;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 5px;
            z-index: 1;
            bottom: 125%;
            /* Posisi tooltip di atas tombol */
            left: 50%;
            margin-left: -60px;
            /* Menggeser tooltip ke kiri agar berpusat */
            opacity: 0;
            transition: opacity 0.3s;
        }

        .group:hover .tooltip-text {
            display: block;
            opacity: 1;
        }
    </style>


</head>

<body>
    {{-- NAVBAR --}}
    <header class="header">
        <nav class="nav container" style="max-width: 1200px;">
            <div class="nav__data" style="justify-content: space-between;">
                <a href="#" class="nav__logo">
                    <img src="{{ asset('img1/logo.png') }}" width="55%" class=" p-3 lg:p-3" alt="">
                    <p>UMT</p>
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__burger" style="margin-left: 13rem;"></i>
                    <i class="ri-close-line nav__close" style="margin-left: 13rem;"></i>
                </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list" style="font-family: Poppins, sans-serif; font-weight: 500;">
                    <li><a href="{{ route('front.index') }}" class="nav__link">
                            <p class="">Home</p>
                        </a></li>

                    <li><a href="{{ route('front.destinasi') }}" class="nav__link">
                            <p class="">Destinasi</p>
                        </a></li>

                    <li class="dropdown__item">
                        <div class="nav__link">
                            Gallery <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">

                            <!--=============== DROPDOWN SUBMENU ===============-->
                            <li class="dropdown__subitem">
                                <div class="dropdown__link">
                                    <i class="ri-list-check-2"></i> Kategori Gallery <i
                                        class="ri-add-line dropdown__add"></i>
                                </div>

                                <ul class="dropdown__submenu">
                                    @foreach ($kategori as $row)
                                        <li>
                                            <a href="{{ route('front.kategori.galeri', $row->slug) }}"
                                                class="dropdown__sublink">
                                                <i class="fa-solid fa-image"></i> {{ $row->kategori }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!--=============== DROPDOWN 1 ===============-->
                    @guest
                        <!--=============== DROPDOWN 2 ===============-->
                        <li class="dropdown__item">
                            <div class="nav__link">
                                Product <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <ul class="dropdown__menu">
                                <li>
                                    <a href="{{ route('login') }}" class="dropdown__link">
                                        <i class="ri-flight-takeoff-line"></i> Tailor
                                        Made
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('login') }}" class="dropdown__link">
                                        <i class="ri-flight-takeoff-line"></i> Ready
                                        Package
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('login') }}" class="dropdown__link">
                                        <i class="ri-flight-takeoff-line"></i> Series
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!--=============== DROPDOWN 2 ===============-->
                        <li class="dropdown__item">
                            <div class="nav__link">
                                Product <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <ul class="dropdown__menu">
                                <li>
                                    <a href="{{ route('front.tailor.made') }}" class="dropdown__link">
                                        <i class="ri-flight-takeoff-line"></i> Tailor
                                        Made
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('front.ready.package') }}" class="dropdown__link">
                                        <i class="ri-flight-takeoff-line"></i> Ready
                                        Package
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('front.open.trip') }}" class="dropdown__link">
                                        <i class="ri-flight-takeoff-line"></i> Series
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endguest


                    {{-- <li><a href="{{ route('front.hubungi.kami') }}" class="nav__link">
                            <p class="">Hubungi Kami</p>
                        </a>
                    </li> --}}

                    <li><a href="{{ route('front.agent.partner') }}" class="nav__link">
                            <p class="">Travel Agent Partner</p>
                        </a>
                    </li>


                    @guest

                    @endguest
                    <li>
                        <a href="https://wa.me/6287786294612" class="nav__link">
                            <p class=" bg-395723 rounded-full px-3 py-2 hover:shadow-xl">
                                <i class="fa-solid fa-phone"></i> Contact
                            </p>
                        </a>
                    </li>


                    @guest
                    @else
                        <button type="button" class="flex text-sm rounded-full md:me-0 dark:focus:ring-gray-600"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img style="width: 40px; height: 40px; background-size: cover; background-color: white; border-radius: 50%;" class="lg:mt-6 ml-6 lg:ml-0 mb-6 object-cover"
                            src="{{ asset('storage/' . Auth::user()->img) }}"   alt="{{ Auth::user()->name }}">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="absolute top-16 z-50 hidden text-base list-none bg-white divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">Hai,
                                    {{ Auth::user()->name }}</span>
                                <span
                                    class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                @if (Auth::user()->role == 1)
                                    <li>
                                        <a href="{{ route('index.home') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                    </li>
                                @else
                                @endif

                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="confirmLogout(event)"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log
                                        out</a>
                                </li>
                            </ul>
                        </div>
                    @endguest




                </ul>
            </div>
        </nav>
    </header>


    {{-- END NAVBAR --}}

    <!-- Hero Section -->
    @yield('content')
    <!-- End Hero Section -->





    {{-- footer logo --}}
    <section class=" bg-white p-2" style="box-shadow: black; z-index: 2;">
        <img class=" mx-auto w-12" src={{ asset('img1/logo2.png') }} alt="Logo UMT" width="5%">
    </section>
    {{-- end footer logo --}}


    {{-- FLOATING BUTTON WA --}}
    <div class="text-end fixed lg:bottom-10 bottom-6 lg:right-10 right-6 z-50">
        <a href="https://wa.me/6287786294612" class="relative rounded-full shadow-md flex hover:opacity-85"
            style="background-color: rgb(35, 243, 16);">
            <i class="fa-brands fa-whatsapp fa-2x"
                style="background-color: rgb(35, 243, 16); padding: 8px 14px; border-radius: 100px;"></i>
            <span
                class="tooltip-text absolute hidden bg-gray-700 text-white text-center rounded-md py-1 px-2 text-sm bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 transition-opacity duration-300">Chat
                via WhatsApp</span>
        </a>
    </div>

    {{-- END FLOATING BUTTON WA --}}







    {{-- BOOSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- JS --}}
    <script>
        // NAVBAR JS
        /*=============== SHOW MENU ===============*/
        const showMenu = (toggleId, navId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId)

            toggle.addEventListener('click', () => {
                // Add show-menu class to nav menu
                nav.classList.toggle('show-menu')

                // Add show-icon to show and hide the menu icon
                toggle.classList.toggle('show-icon')
            })
        }

        showMenu('nav-toggle', 'nav-menu')
        // END NAVBAR JS
    </script>

    {{-- DESTINASI JS --}}
    <script>
        const wrapper = document.querySelector(".wrapper");
        const carousel = document.querySelector(".carousel");
        const firstCardWidth = carousel.querySelector(".card").offsetWidth;
        const arrowBtns = document.querySelectorAll(".wrapper i");
        const carouselChildrens = [...carousel.children];

        let isDragging = false,
            isAutoPlay = true,
            startX, startScrollLeft, timeoutId;

        // Get the number of cards that can fit in the carousel at once
        let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

        // Insert copies of the last few cards to beginning of carousel for infinite scrolling
        carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
            carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
        });

        // Insert copies of the first few cards to end of carousel for infinite scrolling
        carouselChildrens.slice(0, cardPerView).forEach(card => {
            carousel.insertAdjacentHTML("beforeend", card.outerHTML);
        });

        // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");

        // Add event listeners for the arrow buttons to scroll the carousel left and right
        arrowBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
            });
        });

        const dragStart = (e) => {
            isDragging = true;
            carousel.classList.add("dragging");
            // Records the initial cursor and scroll position of the carousel
            startX = e.pageX;
            startScrollLeft = carousel.scrollLeft;
        }

        const dragging = (e) => {
            if (!isDragging) return; // if isDragging is false return from here
            // Updates the scroll position of the carousel based on the cursor movement
            carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
        }

        const dragStop = () => {
            isDragging = false;
            carousel.classList.remove("dragging");
        }

        const infiniteScroll = () => {
            // If the carousel is at the beginning, scroll to the end
            if (carousel.scrollLeft === 0) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
                carousel.classList.remove("no-transition");
            }
            // If the carousel is at the end, scroll to the beginning
            else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.offsetWidth;
                carousel.classList.remove("no-transition");
            }

            // Clear existing timeout & start autoplay if mouse is not hovering over carousel
            clearTimeout(timeoutId);
            if (!wrapper.matches(":hover")) autoPlay();
        }

        const autoPlay = () => {
            if (window.innerWidth < 800 || !isAutoPlay)
                return; // Return if window is smaller than 800 or isAutoPlay is false
            // Autoplay the carousel after every 2500 ms
            timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
        }
        autoPlay();

        carousel.addEventListener("mousedown", dragStart);
        carousel.addEventListener("mousemove", dragging);
        document.addEventListener("mouseup", dragStop);
        carousel.addEventListener("scroll", infiniteScroll);
        wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
        wrapper.addEventListener("mouseleave", autoPlay);
    </script>
    {{-- END DESTINASI JS --}}

    {{-- TESTIMONI SWIPPER --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script>
        function initParadoxWay() {
            "use strict";

            if ($(".testimonials-carousel").length > 0) {
                var j2 = new Swiper(".testimonials-carousel .swiper-container", {
                    preloadImages: false,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    grabCursor: true,
                    mousewheel: false,
                    centeredSlides: true,
                    pagination: {
                        el: '.tc-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.listing-carousel-button-next',
                        prevEl: '.listing-carousel-button-prev',
                    },
                    breakpoints: {
                        1024: {
                            slidesPerView: 3,
                        },

                    }
                });
            }

            // bubbles -----------------


            setInterval(function() {
                var size = randomValue(sArray);
                $('.bubbles').append('<div class="individual-bubble" style="left: ' + randomValue(bArray) +
                    'px; width: ' + size + 'px; height:' + size + 'px;"></div>');
                $('.individual-bubble').animate({
                    'bottom': '100%',
                    'opacity': '-=0.7'
                }, 4000, function() {
                    $(this).remove()
                });
            }, 350);

        }

        //   Init All ------------------
        $(document).ready(function() {
            initParadoxWay();
        });
    </script>
    {{-- END TESTIMONI --}}

    {{--  TESTIMONI VIDEO --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    {{-- END JS TESTIMONI VIDEO --}}

    {{-- FLOWBITE JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- START LOGOUT --}}
    <script>
        function confirmLogout(event) {
            event.preventDefault(); // Menghentikan aksi default dari tautan
            if (confirm("Apakah Anda yakin ingin logout?")) {
                document.getElementById('logout-form').submit(); // Mengirim formulir logout
            }
        }
    </script>
    {{-- END LOGOUT --}}

    {{-- SEARCH DESTINASI JS --}}
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready(function() {

            readData()

            $("#input").keyup(function() {
                var strcari = $("#input").val();
                if (strcari != null) {
                    $("#read").html(
                        '<p class="lg:pl-11 pl-12 font-Poppins font-semibold m-1 duration-300 rounded-lg p-1" style="letter-spacing: 1px;">Sedang Mencari Data...</p>'
                    );
                    $.ajax({
                        type: "GET",
                        url: "{{ url('ajax') }}",
                        data: {
                            negara: strcari
                        },
                        success: function(data) {
                            $("#read").html(data);
                        }
                    });
                } else {
                    readData()
                }
            });
        });

        function readData() {
            $.get("{{ url('read') }}", {},

                function(data, status) {
                    $("#read").html(data);
                })
        }
    </script>
    {{-- END SEARCH DESTINASI JS --}}

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    {{-- END AOS JS --}}

    {{-- SCROLL TOP JS --}}
    <script>
        function scrollToTop() {
            // Animasi scroll ke atas dengan durasi 500ms
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    </script>
    {{-- END SCROLL TOP JS --}}

    {{-- LIGHTBOX JS --}}
    <script src="{{ asset('js1/lightbox-plus-jquery.js') }}"></script>
    {{-- END LIGHTBOX JS --}}



</body>

</html>
