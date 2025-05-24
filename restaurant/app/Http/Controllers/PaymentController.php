<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    // Menampilkan form pembayaran
    public function showPaymentForm()
    {
        $timestamp = Carbon::now()->toDateTimeString();
        return view('payment', compact('timestamp'));
    }

    // Menangani tombol "Sudah Bayar"
    public function confirmPayment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');

        // // Di sini bisa simpan data ke DB jika diperlukan

        // return redirect()->route('payment.form')->with('success', 'Pembayaran berhasil dikonfirmasi menggunakan ' . strtoupper($paymentMethod));
    }
}
