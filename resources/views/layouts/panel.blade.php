<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="description" content="Lapor Mas Wapres adalah kanal pengaduan masyarakat untuk menyampaikan aspirasi, keluhan, dan saran. Anda bisa menghubungi kami melalui tatap muka, SP4N Lapor, surat korespondensi, dan WhatsApp.">
    <meta name="keywords" content="Lapor Mas Wapres, pengaduan masyarakat, kanal pengaduan, SP4N Lapor, tatap muka, korespondensi, WhatsApp, lapor wapres">
    <meta name="author" content="IT SETWAPRES">
    <link rel="icon" href="{{asset('assets/images/LaporMasWapres.webp')}}" type="image/webp">
    <link rel="icon" href="{{ asset('assets/images/LaporMasWapres.png')}}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}" type="image/favicon">

    @yield('head')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Open Graph Meta Tags -->
    <meta property="og:description" content="Lapor Mas Wapres! adalah kanal pengaduan masyarakat untuk menyampaikan aspirasi, keluhan, dan saran melalui tatap muka, SP4N Lapor, surat korespondensi, dan WhatsApp.">
    <meta property="og:image" content="https://lapormaswapres.id/assets/LaporMasWapres.webp">
    <meta property="og:url" content="https://lapormaswapres.id/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Lapor Mas Wapres!">

    <style>
        :root {
            font-family: 'Poppins', sans-serif;
            background-color: #F9FAFB;
        }

        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
            /* Untuk iOS */
            width: 100%;
            margin: 0;
            padding: 0;
            background: url('/assets/images/Background_Cover.png') top center;
            background-size: 100% auto;
            background-repeat: repeat-x repeat-y;
            background-attachment: fixed; /* Add this to fix the background to viewport */
            display: flex;
            flex-direction: column;
        }

        #content {
            flex: 1;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Change to center for vertical centering */
            padding: 1rem;
            box-sizing: border-box;
            min-height: 100vh; /* Ensure it takes full viewport height */
            height: auto; /* Add this to allow the content to expand */
        }

        /* Wrapper for the content */
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center; /* Change to center for vertical alignment */
            width: 100%;
            flex: 1; /* Take up available space */
        }
    </style>

</head>

<body class="bg-gray-50 text-gray-900 flex flex-col">
    <!-- Preloader -->
    <div id="preloader" role="status"
        class="flex z-30 h-screen w-full bg-white-25 items-center justify-center animate-pulse">
        <img class="h-[36px] sm:h-[64px]" src="{{asset('assets/images/LaporMasWapres.webp')}}" alt="Logo Lapor Mas Wapres!" srcset="Logo Lapor Mas Wapres!">
        <span class="sr-only">Memuat Halaman</span>
    </div>

    <!-- Wrapper -->
    <div id="content" class="w-full p-2 sm:p-4">
        <!-- Content -->
        <div class="content-wrapper w-full">
            <!-- Card Utama -->
            <div class="border border-yellow-900/40 rounded-xl p-2 sm:p-4 md:p-6 shadow-2xl bg-white w-full h-auto sm:w-[90vw] md:w-[90vw] lg:w-[85%] max-w-[1200px] flex flex-col mx-auto">
                <!-- Logo Section -->
                <div class="flex-none justify-center items-center mt-4 sm:mt-6 md:mt-8 w-full">
                    <a href="{{ url('/') }}"><img class="w-32 sm:w-40 md:w-52 mx-auto" src="{{asset('assets/images/LaporMasWapres.webp')}}" alt="Logo Lapor Mas Wapres!" srcset="Logo Lapor Mas Wapres!"></a>
                </div>

                <!-- Content Section -->
                <div class="flex-1">
                    @yield('pages')
                </div>

                <!-- Footer Section -->
                <div class="flex-none mt-8 mb-5 md:mt-12 pt-4 text-center">
                    <!-- Social Media Icons -->
                    <div class="flex justify-center space-x-4 mb-3">
                        <a href="https://www.wapresri.go.id/" target="_blank" alt="Website Setwapres" class="transition-colors duration-300 hover:text-amber-800">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/wapresri.go.id" target="_blank" alt="Facebook Setwapres" class="transition-colors duration-300 hover:text-amber-800">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/setwapres.ri/" target="_blank" alt="Instagram Setwapres" class="transition-colors duration-300 hover:text-amber-800">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M 8 3 C 5.243 3 3 5.243 3 8 L 3 16 C 3 18.757 5.243 21 8 21 L 16 21 C 18.757 21 21 18.757 21 16 L 21 8 C 21 5.243 18.757 3 16 3 L 8 3 z M 8 5 L 16 5 C 17.654 5 19 6.346 19 8 L 19 16 C 19 17.654 17.654 19 16 19 L 8 19 C 6.346 19 5 17.654 5 16 L 5 8 C 5 6.346 6.346 5 8 5 z M 17 6 A 1 1 0 0 0 16 7 A 1 1 0 0 0 17 8 A 1 1 0 0 0 18 7 A 1 1 0 0 0 17 6 z M 12 7 C 9.243 7 7 9.243 7 12 C 7 14.757 9.243 17 12 17 C 14.757 17 17 14.757 17 12 C 17 9.243 14.757 7 12 7 z M 12 9 C 13.654 9 15 10.346 15 12 C 15 13.654 13.654 15 12 15 C 10.346 15 9 13.654 9 12 C 9 10.346 10.346 9 12 9 z"></path>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/@Setwapres" target="_blank" alt="YouTube Setwapres" class="transition-colors duration-300 hover:text-amber-800">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5-6-3.5v7z" />
                            </svg>
                        </a>
                    </div>
                    <!-- Copyright -->
                    <div class="text-sm text-gray-600">
                        <p>Copyright © <span id="currentYear"></span> IT Setwapres | All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/fslightbox.js')}}"></script>
    <script>
        window.addEventListener('load', function() {
            var preloader = document.getElementById('preloader');
            var content = document.getElementById('content');
            content.style.display = 'none';

            // Sembunyikan preloader dan tampilkan konten halaman
            // Menambahkan delay 1000 milidetik (1 detik) sebelum menyembunyikan preloader
            setTimeout(function() {
                // Sembunyikan preloader dan tampilkan konten halaman
                preloader.style.display = 'none';
                content.style.display = 'flex';
            }, 1000);
        });
    </script>
    <script>
        document.getElementById("currentYear").textContent = new Date().getFullYear();
    </script>

    <!-- Add this line to include script sections from child views -->
    @yield('script')
</body>

</html>