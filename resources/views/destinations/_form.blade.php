@php
    // Make sure $destination exists (null if not passed)
    $destination = $destination ?? null;
@endphp

<div class="mb-4">
    <label for="name" class="block mb-1 font-medium">Name</label>
    <input type="text" id="name" name="name" 
           value="{{ old('name', $destination->name ?? '') }}" 
           class="w-full border px-3 py-2 rounded" required>
</div>

<div class="mb-4">
    <label for="location" class="block mb-1 font-medium">Location</label>
    <input type="text" id="location" name="location" 
           value="{{ old('location', $destination->location ?? '') }}" 
           class="w-full border px-3 py-2 rounded">
</div>

<div class="mb-4">
    <label for="description" class="block mb-1 font-medium">Description</label>
    <textarea id="description" name="description" 
              class="w-full border px-3 py-2 rounded">{{ old('description', $destination->description ?? '') }}</textarea>
</div>
