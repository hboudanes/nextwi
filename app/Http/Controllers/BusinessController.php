<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the businesses.
     */
    public function index()
    {
        return view('businesses.index');
    }

    /**
     * Show the form for creating a new business.
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created business in storage.
     */
    public function store(Request $request)
    {
        // Store logic would go here
        // For now, just redirect to index
        return redirect()->route('businesses.index');
    }

    /**
     * Display the specified business.
     */
    public function show($id)
    {
        return view('businesses.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified business.
     */
    public function edit($id)
    {
        return view('businesses.edit', ['id' => $id]);
    }

    /**
     * Update the specified business in storage.
     */
    public function update(Request $request, $id)
    {
        // Update logic would go here
        // For now, just redirect to index
        return redirect()->route('businesses.index');
    }

    /**
     * Remove the specified business from storage.
     */
    public function destroy($id)
    {
        // Delete logic would go here
        // For now, just redirect to index
        return redirect()->route('businesses.index');
    }
}