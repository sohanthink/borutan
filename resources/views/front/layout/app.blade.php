<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@stack('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ setting('site_favicon') != null ? Storage::url(setting('site_favicon')) : '' }}"
        type="image/png" />

    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/src/slick.css">
    <link rel="stylesheet" href="{{ asset('front') }}/src/custom.css">
    <link rel="stylesheet" href="{{ asset('front') }}/src/style.css">

</head>
<style>
    .menu.show {
        display: block;
    }
</style>

<body>

    <!-- navar csss sytarts from here -->
    <div class="nav font-primary flex justify-between items-center w-11/12 md:w-4/5 mx-auto py-5">
        <div class="md:w-[20%] w-1/2">
            <a href="{{ url('/') }}">
                <img class="md:h-12 h-7"
                    src="{{ setting('site_logo') != null ? Storage::url(setting('site_logo')) : '' }}"
                    alt="logo"></a>
        </div>
        <div class="w-1/4 hidden md:block">
            <ul class="flex gap-8 justify-center font-medium">
                <li class="{{ request()->is('/') ? 'active' : '' }} whitespace-nowrap"><a
                        href="{{ route('index') }}">{{ __('front/common.home') }}</a></li>
                <li class="whitespace-nowrap"><a href="{{ url('/') }}#about">{{ __('front/common.about') }}</a>
                </li>
                <li class="whitespace-nowrap"><a href="{{ url('/') }}#faq">{{ __('front/common.qandans') }}</a>
                </li>
                <li class="{{ request()->is('pricing') ? 'active' : '' }} whitespace-nowrap"><a
                        href="{{ route('pricing') }}">{{ __('front/common.pricing') }}</a></li>
                <li class="{{ request()->is('contact') ? 'active' : '' }} whitespace-nowrap"><a
                        href="{{ route('contact') }}">{{ __('front/common.contact') }}</a></li>
                <li>
                    <select class="form-control lang-change">
                        <option value="en" {{ session()->get('lang_code') == 'en' ? 'selected' : '' }}>
                            &#x1F1EC;&#x1F1E7;
                        </option>
                        <option value="swe" {{ session()->get('lang_code') == 'swe' ? 'selected' : '' }}>
                            &#x1F1F8;&#x1F1EA;
                        </option>
                    </select>
                </li>
            </ul>
        </div>
        <div class="w-1/2 md:w-[20%] flex justify-end gap-1 sm:gap-3">
            <a href="{{ route('login') }}"
                class="px-2 py-1 sm:px-4 sm:py-2 bg-[#9628fd] text-white rounded text-nowrap text-sm hidden md:block">{{ __('front/common.login') }}
            </a>
            <a href="{{ route('register') }}"
                class="px-2 py-1 sm:px-4 sm:py-2 bg-[#9628fd] text-white rounded text-nowrap text-sm hidden md:block">{{ __('front/common.register') }}</a>

            <!-- <button class="px-2 py-1 sm:px-4 sm:py-2 bg-blue-950 text-white rounded text-nowrap text-sm">Find An
                Apartment</button> -->
        </div>
        <div class="block md:hidden">
            <svg id="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="6" width="18" height="2" />
                <rect x="3" y="11" width="18" height="2" />
                <rect x="3" y="16" width="18" height="2" />
            </svg>

            <div id="menu" class="hidden menu">
                <ul class="bg-[#1f2937] z-50 text-white absolute top-14 left-0 w-full p-6 space-y-10 text-center">
                    <li class="{{ request()->is('/') ? 'active' : '' }} whitespace-nowrap"><a
                            href="{{ route('index') }}">{{ __('front/common.home') }}</a></li>
                    <li class="whitespace-nowrap"><a
                            href="{{ url('/') }}#about">{{ __('front/common.about') }}</a></li>
                    <li class="whitespace-nowrap"><a
                            href="{{ url('/') }}#faq">{{ __('front/common.qandans') }}</a></li>
                    <li class="{{ request()->is('pricing') ? 'active' : '' }} whitespace-nowrap"><a
                            href="{{ route('pricing') }}">{{ __('front/common.pricing') }}</a></li>
                    <li class="{{ request()->is('contact') ? 'active' : '' }} whitespace-nowrap"><a
                            href="{{ route('contact') }}">{{ __('front/common.contact') }}</a></li>

                    <li><a href="{{ route('login') }}"
                            class="px-2 py-1 sm:px-4 sm:py-2 bg-[#9628fd] text-white rounded text-nowrap text-sm">{{ __('front/common.login') }}
                        </a>
                    </li>
                    <li><a href="{{ route('register') }}"
                            class="px-2 py-1 sm:px-4 sm:py-2 bg-[#9628fd] text-white rounded text-nowrap text-sm">{{ __('front/common.register') }}
                        </a></li>
                </ul>
            </div>
        </div>

    </div>

    @yield('body')

    <!-- footer section started from here -->
    <section class="mt-14 bg-[#1f2937] text-white">
        <div
            class="flex justify-between w-10/12 mx-auto mt-20 py-20 font-primary text-white border-b-2 border-grey-500 ">
            <div class="hidden md:block">
                <ul>
                    <li class="font-bold pb-2 text-xl">{{ __('front/common.member') }}</li>

                    {{-- <li class="py-1 font-thin">Bli Medlem</li> --}}

                    <a href="{{ route('register') }}">
                        <li class="py-1 font-thin">{{ __('front/common.register') }}</li>
                    </a>

                    <a href="{{ route('terms') }}">
                        <li class="py-1 font-thin">{{ __('front/common.terms') }}</li>
                    </a>
                    <a href="{{ route('privacy') }}">
                        <li class="py-1 font-thin">{{ __('front/common.policy') }}</li>
                    </a>
                </ul>
            </div>
            <div>
                <ul>
                    <li class="font-bold pb-2 text-xl">{{ __('front/common.contact') }}</li>
                    <li class="py-1 font-thin">Info@BoRutan.se</li>
                    <li class="py-1 font-thin">Klarabergsviadukten 70,</li>
                    <li class="py-1 font-thin border-spacing-1 border-white border-b-2">111 64 Stockholm, Sverige</li>
                    <li class="py-1 font-thin">Rolf Wickstrøms vei 15b,<br>
                        0484 Oslo, Norge</li>
                    {{-- <li class="py-1 font-thin">08 - 506 362 00</li> --}}
                </ul>
            </div>
            <div class="hidden md:block">
                <ul>
                    <li class="font-bold pb-2 text-xl">Information</li>
                    <li class="whitespace-nowrap py-1 font-thin"><a
                            href="{{ url('/') }}#about">{{ __('front/common.about') }}</a></li>
                    <li class="py-1 font-thin">Info@borutan.se</li>
                </ul>
            </div>
            <div>
                <ul class="text-center">
                    <li class="font-bold pb-2 text-xl">Social</li>
                    <div class="flex flex-col md:flex-row gap-4 text-center items-center justify-center">
                        <li class="py-1 font-thin inline-block"><a
                                href="https://www.facebook.com/profile.php?id=61557348132335">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="currentColor" class="feather feather-facebook">
                                    <path
                                        d="M18.896 2H5.102C3.407 2 2 3.406 2 5.102v13.793C2 20.593 3.406 22 5.102 22h7.425V14.271H9.847v-2.985h2.681V9.047c0-2.646 1.616-4.091 3.975-4.091 1.13 0 2.101.084 2.382.122v2.762l-1.636.001c-1.281 0-1.528.609-1.528 1.501v1.967h3.056l-.399 2.985h-2.657V22h5.198C20.593 22 22 20.593 22 18.896V5.102C22 3.406 20.593 2 18.896 2z" />
                                </svg>

                            </a></li>
                        <li class="py-1 font-thin inline-block"><a href="https://twitter.com/BoRutanSE">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="currentColor" class="feather feather-twitter">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c13 8 20-5 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                                </svg>

                            </a></li>
                        <li class="py-1 font-thin inline-block"><a href="https://www.instagram.com/borutan.se">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" fill="none">
                                    <linearGradient id="IG_Gradient" x1="12" x2="12" y1="2"
                                        y2="22" gradientUnits="userSpaceOnUse">
                                        <stop offset="0%" stop-color="#f58529" />
                                        <stop offset="30%" stop-color="#feda77" />
                                        <stop offset="60%" stop-color="#dd2a7b" />
                                        <stop offset="100%" stop-color="#8134af" />
                                    </linearGradient>
                                    <rect width="20" height="20" x="2" y="2" rx="5"
                                        fill="url(#IG_Gradient)" />
                                    <path fill="white"
                                        d="M12 7.6A4.4 4.4 0 1 0 16.4 12 4.4 4.4 0 0 0 12 7.6zm0 7.2A2.8 2.8 0 1 1 14.8 12 2.8 2.8 0 0 1 12 14.8zm4.55-7.75a1.05 1.05 0 1 1-1.05-1.05 1.05 1.05 0 0 1 1.05 1.05z" />
                                </svg>


                            </a></li>
                    </div>
                </ul>
            </div>
        </div>
        <p class="text-center py-5">© BoRutan 2023.</p>
    </section>

    <script>
        document.getElementById('icon').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('show');
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        var url = "{{ route('lang.update') }}";

        $('.lang-change').change(function() {
            let lang_code = $(this).val();
            window.location.href = url + "?lang=" + lang_code;
        });
    </script>

    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>

    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    {!! Toastr::message() !!}

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "{{ session('title') ?? 'SUCCESS' }} ",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        </script>
        {{ Session::forget('success') }}
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: "{{ session('title') ?? 'ERROR' }}",
                text: "{{ Session::get('error') }}",
                icon: "error"
            });
        </script>
        {{ Session::forget('error') }}
    @endif
    @if (Session::has('warning'))
        <script>
            Swal.fire({
                title: "{{ session('title') ?? 'WARNING' }}",
                text: "{{ session('warning') }}",
                icon: false
            });
        </script>
        {{ Session::forget('warning') }}
    @endif
</body>

</html>
