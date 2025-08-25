@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-4">
    <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
        <!-- Left Panel (Branding/Info) -->
        <div class="md:w-1/2 bg-gradient-to-br from-purple-500 via-pink-500 to-yellow-500 p-8 text-white">
            <div class="flex items-center mb-6">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-2 text-xl font-bold">PulseSurvey</span>
            </div>
            
            <h2 class="text-2xl font-bold mb-4">Reset your password</h2>
            <p class="opacity-90 mb-6 text-sm">
                Enter your email to receive a password reset link and regain access to your account.
            </p>
            
            <div class="space-y-3 text-sm">
                <div class="flex items-start">
                    <svg class="flex-shrink-0 h-4 w-4 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="ml-2 opacity-90">Secure password reset process</p>
                </div>
                <div class="flex items-start">
                    <svg class="flex-shrink-0 h-4 w-4 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="ml-2 opacity-90">Instant email delivery</p>
                </div>
                <div class="flex items-start">
                    <svg class="flex-shrink-0 h-4 w-4 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="ml-2 opacity-90">Easy-to-follow instructions</p>
                </div>
            </div>
        </div>

        <!-- Right Panel (Password Reset Form) -->
        <div class="md:w-1/2 p-8">
            <div class="text-center mb-6">
                <h1 class="text-xl font-bold text-gray-800">Forgot your password?</h1>
                <p class="text-gray-600 text-sm mt-1">We'll email you a reset link</p>
            </div>

            @if (session('status'))
                <div class="mb-4 px-4 py-3 rounded-md bg-green-50 text-green-700 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 px-4 py-3 rounded-md bg-red-50 text-red-700 text-sm">
                    @foreach ($errors->all() as $error)
                        <div class="flex items-start">
                            <svg class="flex-shrink-0 h-4 w-4 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Work email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:border-purple-500 focus:ring-1 focus:ring-purple-200"
                           placeholder="name@company.com"
                           required autofocus>
                </div>

                <div>
                    <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Send Reset Link
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-4 border-t border-gray-200">
                <p class="text-xs text-gray-600 text-center">
                    Remember your password?
                    <a href="{{ route('login') }}" class="font-medium text-purple-600 hover:text-purple-500 hover:underline">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection