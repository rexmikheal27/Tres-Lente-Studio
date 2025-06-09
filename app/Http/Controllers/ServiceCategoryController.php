<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        $services = ServiceCategory::orderBy('name', 'asc')
                                            ->get();
        
        return view('admin.service-management', compact('services', 'user'));
    }
    
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        return view('admin.service-create', compact('user'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:photo,video',
            'is_active' => 'required|boolean',
        ]);
        
        ServiceCategory::create($request->all());
        
        return redirect()->route('service-management')
                        ->with('success', 'Service category created successfully.');
    }
    
    public function edit(Request $request, $id)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        $service = ServiceCategory::findOrFail($id);
        
        return view('admin.service-edit', compact('service', 'user'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:photo,video',
            'is_active' => 'required|boolean',
        ]);
        
        $service = ServiceCategory::findOrFail($id);
        $service->update($request->all());
        
        return redirect()->route('service-management')
                        ->with('success', 'Service category updated successfully.');
    }
    
    public function destroy($id)
    {
        $service = ServiceCategory::findOrFail($id);
        $service->delete();
        
        return redirect()->route('service-management')
                        ->with('success', 'Service category deleted successfully.');
    }
}