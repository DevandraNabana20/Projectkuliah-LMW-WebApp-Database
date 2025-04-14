<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Lapor Mas Wapres!</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/favicon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9FAFB;
        }

        .sidebar-link {
            transition: all 0.2s;
        }

        .sidebar-link:hover {
            background-color: rgba(154, 123, 123, 0.2);
        }

        .sidebar-link.active {
            background-color: rgba(44, 28, 17, 0.1);
            border-left: 4px solid #2C1C11;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Sidebar functionality for all screen sizes */
        .sidebar {
            transform: translateX(0);
            transition: transform 0.3s ease-in-out;
            width: 16rem;
            /* 64px equivalent */
        }

        .sidebar.closed {
            transform: translateX(-100%);
        }

        /* Content wrapper transitions */
        .content-wrapper {
            transition: margin-left 0.3s ease-in-out;
        }

        .content-wrapper.expanded {
            margin-left: 0 !important;
        }

        /* Fix for scrollable sidebar on small devices */
        .sidebar-scroll-container {
            display: flex;
            flex-direction: column;
            height: calc(100% - 174px);
            /* Adjust based on your header heights */
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 20px;
            /* Add bottom padding for better visibility */
        }

        /* Updated scrollable sidebar styles for very small screens */
        .sidebar {
            display: flex;
            flex-direction: column;
            max-height: 100vh;
            overflow: hidden;
        }

        .sidebar-header-container {
            flex-shrink: 0;
            /* Prevent header from shrinking */
        }

        .sidebar-scroll-container {
            flex: 1;
            overflow-y: auto;
            /* Enable scrolling */
            min-height: 0;
            /* Critical for flexbox scrolling to work */
        }

        .sidebar-nav {
            padding-bottom: 100px;
            /* Extra padding to ensure everything is accessible */
        }

        /* Overlay for mobile/tablet */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 25;
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Close button (visible only on mobile) */
        .sidebar-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: none;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            cursor: pointer;
            color: #2C1C11;
            z-index: 31;
        }

        @media (max-width: 1023px) {
            .sidebar-close {
                display: block;
            }
        }
    </style>
    @yield('head')
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Overlay (visible when sidebar is open on mobile) -->
        <div id="sidebarOverlay" class="sidebar-overlay"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar bg-white shadow-lg w-64 fixed inset-y-0 left-0 z-30">
            <!-- Close button (mobile only) -->
            <div id="sidebarClose" class="sidebar-close">
                <i class="fas fa-times"></i>
            </div>

            <!-- Sidebar Header - Non-scrollable fixed part -->
            <div class="sidebar-header-container">
                <!-- Sidebar Header with Logo -->
                <div class="flex flex-col items-center justify-center p-4 border-b">
                    <img src="{{ asset('assets/images/LaporMasWapres.webp') }}" alt="Logo" class="h-12 mb-2">
                </div>

                <!-- Admin Profile -->
                <div class="flex flex-col items-center p-4 border-b">
                    <div class="relative w-20 h-20 rounded-full overflow-hidden bg-[#9A7B7B] mb-3">
                        <div class="flex items-center justify-center h-full text-white text-3xl font-bold">
                            {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                        </div>
                    </div>
                    <h2 class="text-md font-semibold text-[#2C1C11]">{{ Auth::guard('admin')->user()->name }}</h2>
                    <p class="text-sm text-gray-600 truncate max-w-full">{{ Auth::guard('admin')->user()->email }}</p>
                </div>
            </div>

            <!-- Sidebar scrollable container -->
            <div class="sidebar-scroll-container">
                <nav class="sidebar-nav mt-4">
                    <ul class="space-y-1 px-3">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="fas fa-home w-5 text-[#2C1C11]"></i>
                                <span class="ml-3 text-[#2C1C11]">Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profile') ?? '#' }}"
                                class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                                <i class="fas fa-user w-5 text-[#2C1C11]"></i>
                                <span class="ml-3 text-[#2C1C11]">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.complaints') ?? '#' }}"
                                class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.complaints') ? 'active' : '' }}">
                                <i class="fas fa-clipboard-list w-5 text-[#2C1C11]"></i>
                                <span class="ml-3 text-[#2C1C11]">Kelola Pengaduan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.add-complaint') ?? '#' }}"
                                class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.add-complaint') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle w-5 text-[#2C1C11]"></i>
                                <span class="ml-3 text-[#2C1C11]">Tambah Pengaduan</span>
                            </a>
                        </li>
                        <!-- Removed the Pencarian menu item since search functionality is already in Kelola Pengaduan -->
                    </ul>

                    <!-- Logout Button -->
                    <div class="px-3 mt-6">
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                <i class="fas fa-sign-out-alt w-5"></i>
                                <span class="ml-3">Keluar</span>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div id="contentWrapper" class="flex-1 flex flex-col content-wrapper lg:ml-64">
            <!-- Top Header -->
            <header class="bg-white shadow-sm z-10 py-4 px-6 flex items-center justify-between">
                <!-- Menu toggle button - visible on all screens -->
                <button id="menuToggle" class="text-gray-600 focus:outline-none">
                    <i id="toggleIcon" class="fas fa-bars text-xl"></i>
                </button>

                <div class="flex items-center space-x-4">
                    <span id="currentDate" class="text-sm text-gray-600"></span>
                </div>
            </header>

            <!-- Content Wrapper -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t py-4 px-6">
                <div class="text-center text-sm text-gray-600">
                    <p>© <span id="currentYear"></span> IT Setwapres | All Rights Reserved</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // Get DOM elements
        const sidebar = document.getElementById('sidebar');
        const contentWrapper = document.getElementById('contentWrapper');
        const toggleIcon = document.getElementById('toggleIcon');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const sidebarClose = document.getElementById('sidebarClose');

        // Initialize toggle state from local storage if available
        const sidebarState = localStorage.getItem('sidebarState');

        // Function to update the toggle icon based on sidebar state
        function updateToggleIcon(isSidebarClosed) {
            if (isSidebarClosed) {
                toggleIcon.classList.add('fa-bars');
                toggleIcon.classList.remove('fa-expand');
            } else {
                toggleIcon.classList.remove('fa-bars');
                toggleIcon.classList.add('fa-expand');
            }
        }

        // Function to toggle sidebar
        function toggleSidebar() {
            const isClosed = sidebar.classList.toggle('closed');
            contentWrapper.classList.toggle('expanded');

            // Only show overlay on mobile devices (width < 1024px)
            if (window.innerWidth < 1024) {
                if (isClosed) {
                    sidebarOverlay.classList.remove('active');
                } else {
                    sidebarOverlay.classList.add('active');
                }
            }

            // Update icon
            updateToggleIcon(isClosed);

            // Save state to local storage
            localStorage.setItem('sidebarState', isClosed ? 'closed' : 'open');
        }

        // Function to close sidebar
        function closeSidebar() {
            sidebar.classList.add('closed');
            contentWrapper.classList.add('expanded');
            sidebarOverlay.classList.remove('active');
            updateToggleIcon(true);
            localStorage.setItem('sidebarState', 'closed');
        }

        // Apply initial state
        if (sidebarState === 'closed') {
            sidebar.classList.add('closed');
            contentWrapper.classList.add('expanded');
            updateToggleIcon(true);
        } else {
            updateToggleIcon(false);
            // On mobile, default to closed regardless of localStorage
            if (window.innerWidth < 1024) {
                sidebar.classList.add('closed');
                contentWrapper.classList.add('expanded');
                updateToggleIcon(true);
            }
        }

        // Toggle sidebar on button click
        document.getElementById('menuToggle').addEventListener('click', function(e) {
            e.stopPropagation();
            toggleSidebar();
        });

        // Close sidebar when clicking overlay
        sidebarOverlay.addEventListener('click', function() {
            closeSidebar();
        });

        // Close sidebar with X button (mobile only)
        sidebarClose.addEventListener('click', function() {
            closeSidebar();
        });

        // Close sidebar when clicking sidebar links on mobile
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 1024) {
                    closeSidebar();
                }
            });
        });

        // Update current year
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // Update current date
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID', options);
    </script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
</body>

</html>
