@extends('layouts.app')
@section('content')

<style>
    :root {
      /* Gradient colors */
      --primary-dark: #6d28d9;   /* Dark Blue */
      --primary-color: #6d28d9;  /* Medium Blue */
      --primary-light: #6d28d9;  /* Light Blue */
      --primary-white: #ffffffff;  /* White */

      /* Brand palette */
      --positive-color: var(--primary-color);
      --negative-color: var(--primary-dark);
      --warning-color: var(--primary-light);
      --purple-light: var(--primary-light);
      --purple-dark: var(--primary-dark);

      /* Text colors */
      --text-dark: var(--primary-dark);
      --text-medium: #4b6b9c;
      --text-light: #9dbdfd;

      /* Background */
      --bg-light: #f3f4f6;
    }


    body {
        background-color: #fff !important;
    }

    /* Typography */
    h1 { font-size: 1.25rem !important; }
    h2 { font-size: 1.1rem !important; }
    h3 { font-size: 1rem !important; }
    p, div, span { font-size: 0.8125rem !important; }

    /* Metric numbers */
    dd {
        font-size: 1.25rem !important;
        font-weight: bold;
        color: var(--primary-color) !important;
    }

    /* Cards */
    .bg-white {
        background-color: white !important;
        border: none !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        border-radius: 0.375rem;
    }

    /* Progress bars */
    .progress-container {
        height: 6px;
        background-color: #e5e7eb;
        border-radius: 3px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        border-radius: 3px;
    }

    /* Status indicators */
    .status-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 6px;
    }

    /* Chart container */
    .chart-container {
        position: relative;
        height: 200px;
        width: 100%;
    }

    /* Custom select */
    .custom-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%234b5563'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1em;
        padding-right: 2rem;
    }
</style>

<div class="mx-auto px-0 py-4">
 <!-- Reduced padding on sides -->

    <!-- Dashboard Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 -mt-8">
        <div>
            <h1 class="font-bold text-gray-900">Good Morning, {{ Auth::user()->name }}</h1>
            <p class="mt-1 text-gray-600">Real-time sentiment insights and analytics</p>
        </div>
        <div class="mt-2 md:mt-0 flex items-center gap-2">
            <!-- Date selector can go here -->
        </div>
    </div>

    <!-- Key Metrics Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
        <!-- Overall Sentiment -->
        <div class="bg-white overflow-hidden shadow">
            <div class="px-4 py-4 sm:p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 truncate">Overall Sentiment</dt>
                        <dd class="mt-1">76/100</dd>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        ↑ 4%
                    </span>
                </div>
                <div class="mt-3">
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 76%; background: linear-gradient(90deg, var(--purple-light), var(--purple-dark));"></div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-xs text-gray-500">0</span>
                        <span class="text-xs text-gray-500">100</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Response Rate -->
        <div class="bg-white overflow-hidden shadow">
            <div class="px-4 py-4 sm:p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 truncate">Response Rate</dt>
                        <dd class="mt-1">94%</dd>
                    </div>
                    <span class="status-indicator" style="background-color: var(--positive-color);"></span>
                </div>
                <div class="mt-3">
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 94%; background-color: var(--positive-color);"></div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-xs text-gray-500">0%</span>
                        <span class="text-xs text-gray-500">100%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Risk Alerts -->
        <div class="bg-white overflow-hidden shadow">
            <div class="px-4 py-4 sm:p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 truncate">Risk Alerts</dt>
                        <dd class="mt-1">3</dd>
                    </div>
                    <span class="status-indicator" style="background-color: var(--negative-color);"></span>
                </div>
                <div class="mt-3">
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 80%; background-color: var(--negative-color);"></div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-xs text-gray-500">Operations</span> <!-- Added label -->
                        <span class="text-xs text-gray-500">High</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Departments -->
        <div class="bg-white overflow-hidden shadow">
            <div class="px-4 py-4 sm:p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 truncate">Departments</dt>
                        <dd class="mt-1">4</dd>
                    </div>
                    <span class="status-indicator" style="background-color: var(--primary-color);"></span>
                </div>
                <div class="mt-3">
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 100%; background-color: var(--primary-color);"></div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-xs text-gray-500">Active</span> <!-- Added label -->
                        <span class="text-xs text-gray-500">4/4</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
        <!-- Sentiment Trends Chart -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg lg:col-span-2">
            <div class="px-4 py-4 sm:px-6 flex justify-between items-center border-b border-gray-100">
                <h3 class="font-medium text-gray-900">Sentiment Trends</h3>
                <div class="relative">
                    <select class="custom-select text-xs rounded-md border border-gray-200 focus:ring-blue-500 focus:border-blue-500 pl-2 pr-6 py-1 bg-white">
                        <option>Last 7 days</option>
                        <option>Last 14 days</option>
                        <option>Last 30 days</option>
                        <option>Last quarter</option>
                    </select>
                </div>
            </div>
            <div class="p-4">
                <div class="chart-container">
                    <canvas id="sentimentChart"></canvas>
                </div>
            </div>
        </div>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
  <div class="px-4 py-3 sm:px-5 border-b border-gray-100">
    <h3 class="font-medium text-gray-900 text-sm">Department Performance</h3>
  </div>
  <div class="p-4">
    <div class="flex flex-col items-center">
      <!-- Compact and attractive circular graph -->
      <div class="relative" style="width: 140px; height: 140px;">
        <svg class="w-full h-full" viewBox="0 0 36 36">
          <!-- Background circle -->
          <circle cx="18" cy="18" r="16" fill="none" stroke="#f3f4f6" stroke-width="4"/>
          
          <!-- Colored segments with subtle animation -->
          <circle cx="18" cy="18" r="16" fill="none"
                  stroke="#b99bffff" stroke-width="4" stroke-linecap="round"
                  stroke-dasharray="90 100" stroke-dashoffset="25"
                  class="animate-[rotate_1.5s_ease-in-out]"/>
          <circle cx="18" cy="18" r="16" fill="none"
                  stroke="#9867eeff" stroke-width="4" stroke-linecap="round"
                  stroke-dasharray="90 100" stroke-dashoffset="115"
                  class="animate-[rotate_1.8s_ease-in-out]"/>
          <circle cx="18" cy="18" r="16" fill="none"
                  stroke="#6d28d9" stroke-width="4" stroke-linecap="round"
                  stroke-dasharray="90 100" stroke-dashoffset="205"
                  class="animate-[rotate_2.1s_ease-in-out]"/>
          <circle cx="18" cy="18" r="16" fill="none"
                  stroke="#5b21b6" stroke-width="4" stroke-linecap="round"
                  stroke-dasharray="90 100" stroke-dashoffset="295"
                  class="animate-[rotate_2.4s_ease-in-out]"/>
          
          <!-- Center text with icon -->
          <text x="18" y="18" text-anchor="middle" dominant-baseline="middle" 
                font-size="3.5" font-weight="600" fill="#6b7280">
            <tspan x="18" dy="-1.5">Overall</tspan>
            <tspan x="18" dy="3">Performance</tspan>
          </text>
        </svg>
      </div>

      <!-- Minimalist legend with percentage badges -->
      <div class="mt-4 grid grid-cols-2 gap-2 text-xs w-full px-4">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <span class="w-2 h-2 rounded-full bg-purple-500 mr-2"></span>
            <span>Marketing</span>
          </div>
          <span class="font-medium">84%</span>
        </div>
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <span class="w-2 h-2 rounded-full bg-purple-600 mr-2"></span>
            <span>HR</span>
          </div>
          <span class="font-medium">82%</span>
        </div>
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <span class="w-2 h-2 rounded-full bg-purple-700 mr-2"></span>
            <span>Sales</span>
          </div>
          <span class="font-medium">72%</span>
        </div>
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <span class="w-2 h-2 rounded-full bg-purple-800 mr-2"></span>
            <span>Ops</span>
          </div>
          <span class="font-medium">65%</span>
        </div>
      </div>
    </div>

    <!-- Action link -->
    <div class="mt-5 text-center">
      <a href="#" class="inline-flex items-center text-xs font-medium text-pink-600 hover:text-pink-800 transition-colors">
        View detailed breakdown
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>
  </div>
</div>

<style>
  @keyframes rotate {
    from { stroke-dashoffset: 100; }
    to { stroke-dashoffset: 0; }
  }
</style>




  <!-- Key Insights -->
<div class="w-full col-span-full">
  <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6 w-full">
    <div class="px-4 py-4 sm:px-6 border-b border-gray-100">
      <h3 class="font-semibold text-gray-900 text-base">Key Insights</h3>
    </div>
    <div class="p-4">
      <div class="space-y-3">

        <!-- Positive -->
        <div class="p-3 rounded-lg w-full" style="background: linear-gradient(90deg, #1e3a8a10, #3b82f610); border-left: 4px solid  #dd901cff;">
          <div class="flex items-start">
            <div class="flex-shrink-0 mt-0.5">
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke=" #dd901cff">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 
                  11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div class="ml-2 flex-1">
              <h4 class="text-sm font-medium text-gray-900 mb-1">Top Positive</h4>
              <p class="text-sm text-gray-600">
                Marketing team shows highest satisfaction (84/100) with strong collaboration themes.
              </p>
            </div>
          </div>
        </div>

        <!-- Critical Alert -->
        <div class="p-3 rounded-lg w-full" style="background: linear-gradient(90deg, #1e3a8a10, #3b82f610); border-left: 4px solid  #dd901cff;">
          <div class="flex items-start">
            <div class="flex-shrink-0 mt-0.5">
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke=" #dd901cff">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 
                  2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 
                  0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="ml-2 flex-1">
              <h4 class="text-sm font-medium text-gray-900 mb-1">Critical Alert</h4>
              <p class="text-sm text-gray-600">
                Operations team at risk (65/100) with burnout concerns and workload issues.
              </p>
            </div>
          </div>
        </div>

        <!-- Emerging Trend -->
        <div class="p-3 rounded-lg w-full" style="background: linear-gradient(90deg, #1e3a8a10, #3b82f610); border-left: 4px solid  #dd901cff;">
          <div class="flex items-start">
            <div class="flex-shrink-0 mt-0.5">
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke=" #dd901cff">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 
                  0l1.519 4.674a1 1 0 00.95.69h4.915c.969 
                  0 1.371 1.24.588 1.81l-3.976 2.888a1 1 
                  0 00-.363 1.118l1.518 4.674c.3.922-.755 
                  1.688-1.538 1.118l-3.976-2.888a1 1 
                  0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 
                  1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 
                  1 0 00.951-.69l1.519-4.674z" />
              </svg>
            </div>
            <div class="ml-2 flex-1">
              <h4 class="text-sm font-medium text-gray-900 mb-1">Emerging Trend</h4>
              <p class="text-sm text-gray-600">
                "Remote work satisfaction" mentions increased by 42% this week.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- Recommended Actions -->
<div class="w-full col-span-full">
  <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6 w-full">
    <div class="px-4 py-4 sm:px-6 border-b border-gray-100">
      <h3 class="font-semibold text-gray-900 text-base">Recommended Actions</h3>
    </div>
    <div class="p-4">
      <ul class="space-y-3">

        <!-- Operations -->
        <li class="flex items-start">
          <div class="flex-shrink-0 mt-0.5">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#dd901cff">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M9 12l2 2 4-4m6 2a9 9 0 
                11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-2 flex-1">
            <p class="text-sm font-medium text-gray-900">Operations</p>
            <p class="text-sm text-gray-600">Schedule 1:1 meetings to address workload concerns</p>
          </div>
        </li>

        <!-- Company-wide -->
        <li class="flex items-start">
          <div class="flex-shrink-0 mt-0.5">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#dd901cff">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M9 12l2 2 4-4m6 2a9 9 0 
                11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-2 flex-1">
            <p class="text-sm font-medium text-gray-900">Company-wide</p>
            <p class="text-sm text-gray-600">Review communication protocols for clarity</p>
          </div>
        </li>

        <!-- HR -->
        <li class="flex items-start">
          <div class="flex-shrink-0 mt-0.5">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#dd901cff">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M9 12l2 2 4-4m6 2a9 9 0 
                11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-2 flex-1">
            <p class="text-sm font-medium text-gray-900">HR</p>
            <p class="text-sm text-gray-600">Develop recognition program for Marketing team success</p>
          </div>
        </li>

      </ul>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('sentimentChart').getContext('2d');

    // Define gradients
    const positiveGradient = ctx.createLinearGradient(0, 0, 0, 400);
    positiveGradient.addColorStop(0, ' #c475f8ff');   // Dark blue
    positiveGradient.addColorStop(1, '#c475f8ff');   // Light blue

    const neutralGradient = ctx.createLinearGradient(0, 0, 0, 400);
    neutralGradient.addColorStop(0, '#fc56e0ff');   // Cyan / teal
    neutralGradient.addColorStop(1, '#fc56e0ff');   // Light aqua

    const negativeGradient = ctx.createLinearGradient(0, 0, 0, 400);
    negativeGradient.addColorStop(0, '#ff8330ff');   // Deep purple
    negativeGradient.addColorStop(1, '#ff8330ff');   // Soft lavender

    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [
                {
                    label: 'Positive',
                    data: [65, 75, 45, 80, 65, 50, 70],
                    borderColor: positiveGradient,
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#c475f8ff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                },
                {
                    label: 'Neutral',
                    data: [25, 30, 40, 35, 45, 35, 30],
                    borderColor: neutralGradient,
                    backgroundColor: 'rgba(6, 182, 212, 0.1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#fc56e0ff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                },
                {
                    label: 'Negative',
                    data: [10, 15, 20, 15, 10, 15, 20],
                    borderColor: negativeGradient,
                    backgroundColor: 'rgba(168, 85, 247, 0.1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#ff8330ff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        color: '#4b5563'
                    }
                },
                tooltip: {
                    backgroundColor: '#1f2937',
                    titleColor: '#fff',
                    bodyColor: '#e5e7eb',
                    borderColor: '#374151',
                    borderWidth: 1,
                    cornerRadius: 8,
                    padding: 12,
                    usePointStyle: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        color: '#6b7280',
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        color: '#6b7280'
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
</script>


@endsection