<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientInquiry;
use App\Models\ServiceCategory;

class ContactController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::where('is_active', true)
            ->get();

        return view('contact', compact('serviceCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'service_category_id' => 'required|exists:service_categories,id',
            'message' => 'required|string',
        ]);

        $location = $request->get('location', 'unknown');

        $client = Client::updateOrCreate(
            ['email' => $validated['email']],
            [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
            ]
        );

        ClientInquiry::create([
            'client_id' => $client->id,
            'service_category_id' => $validated['service_category_id'],
            'message' => $validated['message'],
        ]);

        $redirectUrl = '';

        if ($location === 'home') {
            // If 'home', redirect to the home route with the #contact fragment
            $redirectUrl = route('home') . '#contact';
        } else {
            // Otherwise, redirect to the contact page route
            $redirectUrl = route('contact');
        }



        return redirect($redirectUrl)->with('success', 'Message sent successfully!');
    }
}
