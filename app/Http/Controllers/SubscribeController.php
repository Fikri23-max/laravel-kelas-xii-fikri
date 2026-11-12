<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('subscribe', [
            'email' => ['required', 'email', 'max:100'],
        ]);

        $subscriber = Subscriber::firstOrCreate([
            'email' => $validated['email'],
        ]);

        $message = $subscriber->wasRecentlyCreated
            ? 'Berhasil subscribe! Terima kasih sudah berlangganan.'
            : 'Email ini sudah berlangganan.';

        return back()->with('subscribe_success', $message);
    }
}

