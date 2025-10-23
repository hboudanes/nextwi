<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the locations.
     */
    public function index()
    {
        return view('locations.index');
    }

    /**
     * Show the form for creating a new location.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created location in storage.
     */
    public function store(Request $request)
    {
        // Store logic would go here
        // For now, just redirect to index
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified location.
     */
    public function show($id = null)
    {
        return view('locations.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified location.
     */
    public function edit($id)
    {
        return view('locations.edit', ['id' => $id]);
    }

    /**
     * Update the specified location in storage.
     */
    public function update(Request $request, $id)
    {
        // Update logic would go here
        // For now, just redirect to index
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified location from storage.
     */
    public function destroy($id)
    {
        // Delete logic would go here
        // For now, just redirect to index
        return redirect()->route('locations.index');
    }
}