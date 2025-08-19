@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📊 Pulse Survey</h1>
            <p class="text-gray-500">Set a new password</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                @foreach ($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
