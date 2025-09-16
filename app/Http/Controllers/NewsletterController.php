<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email already exists in the database
        $exists = DB::table('newsletter_subscriptions')
            ->where('email', $request->email)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'This email is already subscribed to our newsletter.');
        }

        // Save the email to the database (assuming a `newsletter_subscriptions` table exists)
        DB::table('newsletter_subscriptions')->insert([
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}