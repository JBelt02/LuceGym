<?php

namespace App\Http\Controllers;

use App\Mail\PostCreateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        $data = $request->only('nombre', 'email', 'mensaje');

        // Envía el correo
        Mail::to('LuceGym@gym.com')->send(new PostCreateMail($data));

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
