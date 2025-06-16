<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfileUpdate;
use App\Services\TranslationService;
use App\Mail\ConfirmEmailChange;
use Illuminate\Support\Str;
class UpdateProfileController extends Controller
{
	protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$locales = $this->translationService->getAvailableLocales();
        $authUser = Auth::user();
        return view('auth.edit-profile',compact('authUser','locales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	   $locales = $this->translationService->getAvailableLocales();
       $authUser = Auth::user();
       return view('auth.profile',compact('authUser','locales'));
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
    /* public function update(Request $request, string $id)
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
	} */
	public function update(Request $request, string $id)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
		]);

		$user = User::findOrFail($id);
		$user->name = $request->name;
		if ($request->email !== $user->email) {
			if (User::where('email', $request->email)->where('id', '!=', $user->id)->exists()) {
				return redirect()->back()->withErrors(['email' => 'Email is already taken.']);
			}
			$user->pending_email = $request->email;
			$user->email_change_token = Str::random(64);
			$user->save();
			Mail::to($user->email)->send(new ConfirmEmailChange($user));
			return redirect()->back()->with('info', 'Name updated. Please confirm email change from your old email.');
		}

		// If no email change
		$user->save();

		return redirect()->back()->with('success', 'User updated successfully!');
	}
	public function confirmEmailChange($token)
	{
		$user = User::where('email_change_token', $token)->firstOrFail();

		if ($user->pending_email) {
			$user->email = $user->pending_email;
			$user->pending_email = null;
			$user->email_change_token = null;
			$user->save();

			return redirect()->route('admin.profile')->with('success', 'Email address updated successfully!');
		}

		return redirect()->route('admin.profile')->with('error', 'Invalid or expired token.');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
