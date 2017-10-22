<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function storeFeedback(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Feedback::create($validatedData);

        return redirect(route('contacts'))->with('status', 'Message sent successfully');
    }
}
