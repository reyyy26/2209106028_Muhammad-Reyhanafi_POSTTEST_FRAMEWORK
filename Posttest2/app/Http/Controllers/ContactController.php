<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:200',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string',
        ]);

        Contact::create($data);

        return redirect()->route('contact.create')->with('success', 'Pesan Anda telah dikirim. Terima kasih!');
    }
}
