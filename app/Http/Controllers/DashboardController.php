<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Client;
use App\Models\ClientInquiry;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user from session
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect()->route('login.user');
        }
        
        $totalServices = ServiceCategory::where('is_active', true)->count();
        $totalClients = Client::count();
        $pendingInquiries = ClientInquiry::where('status', 'new')->count();
        
        $recentInquiries = ClientInquiry::with(['client', 'serviceCategory'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalServices',
            'totalClients',
            'pendingInquiries',
            'recentInquiries',
            'user'
        ));
    }
}