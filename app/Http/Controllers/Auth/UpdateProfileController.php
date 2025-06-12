<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfileUpdate;
class UpdateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUser = Auth::user();
        return view('auth.edit-profile',compact('authUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $authUser = Auth::user();
       return view('auth.profile',compact('authUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255|unique:users,email,' . $id,
                ]);

                $authUser = Auth::user();
                $user = User::findOrFail($id);

                $user->name = $validatedData['name'];
                $user->email = $validatedData['email'];
                $user->save();

                $newPassword = $request->input('new_password', null);

               Mail::to($validatedData['email'])
                    ->cc($authUser->email)
                    ->send((new ProfileUpdate($user->name, $user->email))->from('no-reply@yourdomain.com', 'Your App Name'));


                return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
            }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
