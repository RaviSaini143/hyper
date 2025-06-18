<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Services\TranslationService;
class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
	protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$locales = $this->translationService->getAvailableLocales();
        return view('auth.reset-password',compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $email = $request->email;
        $authUser = Auth::user();
         if ($authUser && $authUser->email === $email) {
         $user = User::where('email', '=', $email)->first();

            if ($user) {
                return redirect()->route('password.reset.form');
            } else {
                 return redirect()->back()->with('error', 'User record not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Unauthorized or email mismatch.');

        }
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
    public function update(Request $request)
{
    $validatedData = $request->validate([
        'password' => 'required|string',
        'npassword' => 'required|string|min:6',
        'cnpassword' => 'required|string|same:npassword',
    ], [
        'cnpassword.same' => 'The confirm password does not match the new password.'
    ]);

    $authUser = Auth::user();

    if (!Hash::check($request->password, $authUser->password)) {
        if ($request->ajax()) {
            return response()->json(['errors' => ['password' => ['The current password you entered does not match.']]], 422);
        }
        return redirect()->back()->with('error', 'The current password you entered does not match.');
    }
    $newPassword = $request->npassword;
    $authUser->password = Hash::make($newPassword);
    $authUser->save();
    
    if ($request->ajax()) {
        return response()->json(['message' => 'Password updated successfully.']);
    }

    return redirect()->back()->with('success', 'Password updated successfully.');
}

public function sendResetPasswordEmail(Request $request)
{
    $authUser = Auth::user();
    if ($request->ajax()) {
        Mail::to($authUser->email)->send(new UserResetPassword($request->new_password));
        return response()->json(['message' => 'Email sent successfully.']);
    }

    abort(403);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showResetForm(Request $request)
    {
		$locales = $this->translationService->getAvailableLocales();
        return view('auth.store-reset-password',compact('locales'));
    }
   //public function showResetForm(string $id)
  //  {
    //    $user = User::findOrFail($id);
    //    return view('auth.store-reset-password', ['user' => $user]);
   // }
}
