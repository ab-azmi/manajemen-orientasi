<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-rich-text-trix-styles />


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Page Content -->
        <main class="bg-gray-100 dark:bg-gray-800 rounded-2xl h-screen overflow-hidden relative">
            <div class="flex items-start justify-between">
                <div
                    class="h-screen hidden sm:block lg:block my-4 sm:m-0 ml-4 shadow-lg relative w-80 sm:w-auto md:w-70">
                    <div class="bg-white h-full rounded-2xl dark:bg-gray-700">
                        <div class="flex items-center justify-center pt-6">
                            <svg width="35" height="30" viewBox="0 0 256 366" version="1.1"
                                preserveAspectRatio="xMidYMid">
                                <defs>
                                    <linearGradient x1="12.5189534%" y1="85.2128611%" x2="88.2282959%" y2="10.0225497%"
                                        id="linearGradient-1">
                                        <stop stop-color="#FF0057" stop-opacity="0.16" offset="0%">
                                        </stop>
                                        <stop stop-color="#FF0057" offset="86.1354%">
                                        </stop>
                                    </linearGradient>
                                </defs>
                                <g>
                                    <path
                                        d="M0,60.8538006 C0,27.245261 27.245304,0 60.8542121,0 L117.027019,0 L255.996549,0 L255.996549,86.5999776 C255.996549,103.404155 242.374096,117.027222 225.569919,117.027222 L145.80812,117.027222 C130.003299,117.277829 117.242615,130.060011 117.027019,145.872817 L117.027019,335.28252 C117.027019,352.087312 103.404567,365.709764 86.5997749,365.709764 L0,365.709764 L0,117.027222 L0,60.8538006 Z"
                                        fill="#001B38">
                                    </path>
                                    <circle fill="url(#linearGradient-1)"
                                        transform="translate(147.013244, 147.014675) rotate(90.000000) translate(-147.013244, -147.014675) "
                                        cx="147.013244" cy="147.014675" r="78.9933938">
                                    </circle>
                                    <circle fill="url(#linearGradient-1)" opacity="0.5"
                                        transform="translate(147.013244, 147.014675) rotate(90.000000) translate(-147.013244, -147.014675) "
                                        cx="147.013244" cy="147.014675" r="78.9933938">
                                    </circle>
                                </g>
                            </svg>
                        </div>
                        @include('layouts.navigation')
                    </div>
                </div>
                <div class="flex flex-col w-full pl-0 md:p-4 md:space-y-4">
                    @include('layouts.header')
                    <x-flash-messages />
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</body>
<script>
    const box = document.getElementById('flashMessage');
    if(document.body.contains(box)){
        setTimeout(() => {
        
        // 👇️ removes element from DOM
        box.style.display = 'none';
        
        // 👇️ hides element (still takes up space on page)
        // box.style.visibility = 'hidden';
        }, 8000); // 👈️ time in milliseconds
    }
</script>
</html>