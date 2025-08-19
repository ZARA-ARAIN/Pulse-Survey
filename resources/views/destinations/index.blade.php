@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Destinations</h1>
        <a href="{{ route('destinations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Destination</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Location</th>
                <th class="px-4 py-2 border">Description</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($destinations as $destination)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $destination->name }}</td>
                <td class="border px-4 py-2">{{ $destination->location }}</td>
                <td class="border px-4 py-2">{{ $destination->description }}</td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('destinations.edit', $destination) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('destinations.destroy', $destination) }}" method="POST" onsubmit="return confirm('Delete this destination?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-4">No destinations found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $destinations->links() }}
    </div>
</div>
@endsection
