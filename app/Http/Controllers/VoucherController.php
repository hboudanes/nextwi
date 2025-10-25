<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Show the vouchers list and creation UI for a given location/profile.
     * UI-only: returns a view with static placeholders.
     */
    public function create(int $location, int $profile)
    {
        return view('locations.profile_vouchers_create', [
            'locationId' => $location,
            'profileId' => $profile,
        ]);
    }

    /**
     * Standalone vouchers index. For now, redirects to create form.
     */
    public function index()
    {
        return redirect()->route('vouchers.create');
    }

    /**
     * Standalone create form not tied to location/profile.
     */
    public function createStandalone()
    {
        return view('vouchers.create');
    }
}