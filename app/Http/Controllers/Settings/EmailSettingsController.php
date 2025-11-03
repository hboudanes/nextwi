<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailSettingsController extends Controller
{
    /**
     * Display the Email (AWS SES) settings view.
     */
    public function index()
    {
        // Prefill values from config/env for display only
        $data = [
            'mail_from_address' => config('mail.from.address'),
            'mail_from_name' => config('mail.from.name'),
            'aws_access_key_id' => config('services.ses.key'),
            'aws_secret_access_key' => config('services.ses.secret'),
            'aws_default_region' => config('services.ses.region'),
        ];

        return view('settings.email', $data);
    }
}