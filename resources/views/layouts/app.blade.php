<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Custom Favicon -->
  <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <title>PULSE SURVEY</title>
  @stack('styles')
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root {
      --ig-gradient: linear-gradient(90deg, #a635d6, #ff4f9d, #ff7b47) !important;
    }

    body {
      background-color: #fff !important;
    }

    /* Header gradient line */
    .header-line {
      height: 30px;
      background:  --ig-gradient: linear-gradient(90deg, #a635d6, #ff4f9d, #ff7b47) !important;
      width: 100%;
      position: fixed; /* stick full width */
      top: 0;
      left: 0;
      z-index: 5;
    }

    /* Header bar */
    header.main-header {
      position: fixed; /* full width on top */
      top: 0;
      left: 0;
      width: 100%;
      height: 48px;
      background: linear-gradient(135deg, 
      #9e49ffff,   /* neon purple */
      #c43bffff,   /* neon pink */
      #ff55a1ff,   /* neon orange */
      #ff7b47   /* neon yellow */
);
      color: white;
      font-size: 0.9rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 1rem;
      z-index: 20; /* above header-line */
    }

    /* Push page content below fixed header */
    main {
      margin-top: 78px; /* header height (48px) + line (30px) */
    }

    aside {
      transition: width 0.3s ease;
      position: relative;
      background: white;
      margin-top: 50px; /* align below header+line */
      z-index: 15;
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .profile-btn {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.3rem 0.3rem;
      border-radius: 5px;
      font-size: 0.8rem;
      font-weight: 600;
      background: transparent;
      border: none;
      cursor: pointer;
      color: white;
    }

    .profile-img {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background-color: #d1d5db; /* solid light grey */
  border: 2px solid rgba(255, 255, 255, 0.3);
}


    .logout-icon-btn {
      background: transparent;
      border: none;
      cursor: pointer;
      padding: 8px;
      color: white;
      transition: all 0.3s ease;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logout-icon-btn:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    /* Sidebar collapsed */
    .sidebar-collapsed {
      width: 4rem !important;
    }
    .sidebar-collapsed nav a span.text {
      display: none;
    }
    .sidebar-collapsed nav a {
      justify-content: center !important;
    }

  /* Sidebar logo styling */
  .sidebar-logo {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 0.6rem;
    padding: 1rem;
    font-size: 1.1rem;
    font-weight: 600;
    color: black;
    background: #f9fafb; /* light background */
    border-bottom: 1px solid #e5e7eb; /* subtle divider */
  }

  .logo-icon {
    font-size: 1.5rem; /* bigger emoji */
    line-height: 1;
  }

  /* Sidebar nav links */
  nav a {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.6rem 1rem;
    border-radius: 0.375rem;
    color: #4b5563;
    position: relative;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  /* Hover indicator */
  nav a:hover {
    background-color: #f3f4f6;
    color: #111827;
  }
  nav a:hover::before {
    content: "";
    position: absolute;
    left: 0;
    top: 10%;
    bottom: 10%;
    width: 3px;
    border-radius: 2px;
    background: var(--ig-gradient);
  }

  /* Active link */
  nav a.active {
    background-color: #f9fafb;
    color: #111827;
    font-weight: 600;
  }
  nav a.active::before {
    content: "";
    position: absolute;
    left: 0;
    top: 10%;
    bottom: 10%;
    width: 3px;
    border-radius: 2px;
    background: var(--ig-gradient);
  }
    nav a svg {
      width: 1.4rem;
      height: 1.4rem;
      flex-shrink: 0;
      stroke-width: 2;
      stroke: currentColor;
    }

    .sidebar-collapsed nav a:hover::after {
      content: attr(data-text);
      position: absolute;
      left: 100%;
      top: 0;
      white-space: nowrap;
      background-color: #f9fafb;
      padding: 0.5rem 1rem;
      border-radius: 0 0.375rem 0.375rem 0;
      margin-left: 0.5rem;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
      z-index: 10;
    }
  </style>
</head>
<body class="font-sans antialiased">

  <div class="header-line"></div>

  <!-- Header fixed full width -->
  <header class="main-header">
    <div class="font-semibold truncate">Pulse Survey</div>

    <div class="header-right">
<!-- Profile Dropdown -->
<div x-data="{ open: false }" class="relative">
  <button 
    @click="open = !open" 
    class="profile-btn hover:bg-white/10 rounded px-2 py-1 transition-colors"
  >
   <img 
  src="https://ui-avatars.com/api/?name={{ urlencode(ucfirst(Auth::user()->name)) }}" 
  alt="Profile" 
  class="profile-img"
>
    <span>{{ ucfirst(Auth::user()->name) }} !</span>
    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M19 9l-7 7-7-7" />
    </svg>
  </button>

  <!-- Dropdown menu -->
  <div 
    x-show="open" 
    @click.outside="open = false" 
    class="absolute right-0 mt-2 w-35 bg-white rounded-md shadow-lg z-50"
  >
    <a href="" 
       class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
      View Profile
    </a>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" 
              class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
        Logout
      </button>
    </form>
  </div>
</div>
        
  </header>

  <div class="flex h-screen" x-data="{ sidebarOpen: false, navigating: false }">
    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'w-64' : 'sidebar-collapsed'" class="flex flex-col">
     

      <nav class="flex-1 p-2 space-y-1">
        <a href="{{ route('surveys.dashboard') }}" 
           @click.prevent="
             if (!sidebarOpen) {
               sidebarOpen = true;
               navigating = true;
               setTimeout(() => {
                 sidebarOpen = false;
                 window.location.href = '{{ route('surveys.dashboard') }}';
               }, 1000);
             } else {
               window.location.href = '{{ route('surveys.dashboard') }}';
             }
           "
           data-text="Survey Dashboard" class="flex items-center gap-3 p-2 hover:bg-gray-100 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
          </svg>
          <span class="text select-none">Survey Dashboard</span>
        </a>

        <a href="{{ route('surveys.index') }}" 
           @click.prevent="
             if (!sidebarOpen) {
               sidebarOpen = true;
               navigating = true;
               setTimeout(() => {
                 sidebarOpen = false;
                 window.location.href = '{{ route('surveys.index') }}';
               }, 1000);
             } else {
               window.location.href = '{{ route('surveys.index') }}';
             }
           "
           data-text="Setups" class="flex items-center gap-3 p-2 hover:bg-gray-100 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
          </svg>
          <span class="text select-none">Setups</span>
        </a>

        <a href="{{ route('ai-prompt-system.index') }}" 
           @click.prevent="
             if (!sidebarOpen) {
               sidebarOpen = true;
               navigating = true;
               setTimeout(() => {
                 sidebarOpen = false;
                 window.location.href = '{{ route('ai-prompt-system.index') }}';
               }, 1000);
             } else {
               window.location.href = '{{ route('ai-prompt-system.index') }}';
             }
           "
           data-text="AI Prompt System" class="flex items-center gap-3 p-2 hover:bg-gray-100 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
          </svg>
          <span class="text select-none">AI Prompt System</span>
        </a>
      </nav>
    </aside>


    <!-- Main content -->
    <div class="flex-1 flex flex-col">
      <main class="p-4 overflow-y-auto">
        @yield('content')
      </main>
    </div>
  </div>

  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
