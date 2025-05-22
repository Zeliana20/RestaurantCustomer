<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ReservationController extends Controller
{
     public function showForm()
    {
        return view('reservation');
    }

    public function submit(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'date' => 'required|date',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'guests' => 'required|string|max:255',
            'time' => 'required',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string|max:1000',
        ]);

        // Simpan ke database atau kirim email atau lainnya
        // Contoh: simpan ke log dulu
        \Illuminate\Support\Facades\Log::info('Reservation submitted:', $validated);

        return redirect()->back()->with('success', 'Reservation submitted successfully!');
    }
}

