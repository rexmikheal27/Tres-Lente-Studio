<?php

namespace App\Http\Controllers;

use App\Models\ClientInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientInquiryController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        $query = ClientInquiry::with(['client', 'serviceCategory']);
        
        // Filter by status if provided
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        $inquiries = $query->orderBy('created_at', 'desc')->get();
        
        return view('admin.inquiry-management', compact('inquiries', 'user'));
    }
    
    public function update(Request $request, $id)
    {
        $inquiry = ClientInquiry::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:new,contacted,quoted,booked,closed',
            'admin_notes' => 'nullable|string'
        ]);
        
        $inquiry->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);
        
        return redirect()->route('inquiry-management')
                        ->with('success', 'Inquiry status updated successfully.');
    }
    
    public function destroy($id)
    {
        $inquiry = ClientInquiry::findOrFail($id);
        $inquiry->delete();
        
        return redirect()->route('inquiry-management')
                        ->with('success', 'Inquiry deleted successfully.');
    }
}