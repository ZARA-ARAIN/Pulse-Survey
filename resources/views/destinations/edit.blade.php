@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Destination</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('destinations.update', $destination) }}" method="POST">
        @csrf
        @method('PUT')

        @include('destinations._form')

        <div class="flex space-x-2">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('destinations.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection
