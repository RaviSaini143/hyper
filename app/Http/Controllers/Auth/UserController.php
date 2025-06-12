<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\AddUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

      public function home()
    {
        
        return view('UserDashboard.index');
    }


    public function index()
    {
      
        $users = AddUser::get();
        return view('auth.listing-user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Use Laravel's built-in IP detection
        $clientIP = $request->ip();
        $ipData = [
            'ip' => $clientIP,
            'latitude' => '',
            'longitude' => '',
            'city' => '',
            'region' => '',
            'country' => ''
        ];

        // Fetch data from ipinfo.io
        $token = config('services.ipinfo.token'); // Optional: Add token if required
        $response = Http::get("https://ipinfo.io/{$clientIP}/json" . ($token ? "?token={$token}" : ''));

        if ($response->successful()) {
            $ipInfo = $response->json();
            $ipData['ip'] = $ipInfo['ip'] ?? $clientIP;
            // Extract latitude and longitude from 'loc' (e.g., "40.7128,-74.0060")
            if (isset($ipInfo['loc'])) {
                [$ipData['latitude'], $ipData['longitude']] = explode(',', $ipInfo['loc']);
            }
            $ipData['city'] = $ipInfo['city'] ?? '';
            $ipData['region'] = $ipInfo['region'] ?? '';
            $ipData['country'] = $ipInfo['country'] ?? '';
        }

        return view('auth.add-user', compact('ipData'));
    } 

    private function getClientIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'ipaddress' => 'nullable|ip',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:20',
             'password' => 'nullable|string|max:20',
        ]);
         if (!empty($validatedData['password'])) {
        $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']); // Remove the field if empty to avoid inserting null
        }
        // Store the user
        AddUser::create($validatedData);

        // Redirect back to 'add.user' view (assuming you have that route)
        return redirect()->route('user.add')->with('success', 'User added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function profile(){
        $authUser = Auth::user();
        return view('Userdashboard.profile',compact('authUser'));
    }
}
