<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        $clients = Client::withCount('inquiries')
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view('admin.client-management', compact('clients', 'user'));
    }
    
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        return view('admin.client-create', compact('user'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:clients,email',
            'phone' => 'nullable|string|max:20'
        ]);
        
        Client::create($request->all());
        
        return redirect()->route('client-management')
                        ->with('success', 'Client created successfully.');
    }
    
    public function edit(Request $request, $id)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        $client = Client::findOrFail($id);
        
        return view('admin.client-edit', compact('client', 'user'));
    }
    
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('clients')->ignore($client->id)
            ],
            'phone' => 'nullable|string|max:20'
        ]);
        
        $client->update($request->all());
        
        return redirect()->route('client-management')
                        ->with('success', 'Client updated successfully.');
    }
    
    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();
            
            return redirect()->route('client-management')
                            ->with('success', 'Client deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('client-management')
                            ->with('error', 'Error deleting client: ' . $e->getMessage());
        }
    }
}