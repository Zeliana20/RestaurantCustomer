<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // FeedbackController.php
    public function index()
    {
        return view('feedback');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan feedback
        $request->validate([
            'rating' => 'required|in:1,2,3,4,5',
            'comment' => 'nullable|string',
            'follow_up' => 'required|boolean'
        ]);

        // Simpan ke database (jika pakai model), contoh:
        // Feedback::create([...]);

        return back()->with('success', 'Thank you for your feedback!');
    }
}
