<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::latest()->paginate(10);
        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        // No $destination passed here
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Destination::create($request->only(['name','location','description']));

        return redirect()->route('destinations.index')->with('success','Destination created.');
    }

    public function edit(Destination $destination)
    {
        // Pass the $destination instance for edit
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $destination->update($request->only(['name','location','description']));

        return redirect()->route('destinations.index')->with('success','Destination updated.');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destinations.index')->with('success','Destination deleted.');
    }
}
