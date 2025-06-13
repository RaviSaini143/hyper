<?php

namespace App\Http\Controllers\SubUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddUser;
use App\Models\AddSubUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubUserPasswordMail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SubUserProfileUpdatedMail;
use App\Services\TranslationService;

class SubUserController extends Controller
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
		$locales = $this->translationService->getAvailableLocales();
		$subusers = AddUser::where('user_type','=','subuser')->get();
        return view('UserDashboard.subusers.view',compact('subusers','locales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$locales = $this->translationService->getAvailableLocales();
		$users = AddUser::get();
        return view('UserDashboard.subusers.add',compact('users','locales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	
         $request->validate([
			'email' => 'required|email',
			'user_type' => 'required',
		]);
	if (AddUser::where('email', $request->email)->exists()) {
					return redirect()->back()->withErrors(['email' => 'Email already exists.'])->withInput();
				}
    // Generate a random password
    $randomPassword = str()->random(10); // 10-character random password

    // Save to the database
    $subUser = new AddUser();
    $subUser->email = $request->email;
	$subUser->user_type = $request->user_type;
    $subUser->password = Hash::make($randomPassword);
	
    $subUser->save();

    // Send the password to the user's email
	Mail::to($subUser->email)->send(new SubUserPasswordMail($subUser, $randomPassword));

    return redirect()->back()->with('success', 'Subuser created successfully. Password has been emailed.');
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
	public function indexSubuserProfile(){
		$subuser = Auth::user();
		return view('UserDashboard.subusers.editprofile',compact('subuser'));
	}
	public function updateSubuserProfile(Request $request, string $id)
{
    $request->validate([
        'email' => 'required|email|unique:add_users,email,' . $id,
    ]);
    $subuser = AddUser::findOrFail($id);
    $subuser->email = $request->input('email');
    $subuser->save();
	Mail::to($subuser->email)->send(new SubUserProfileUpdatedMail($subuser));
     return redirect()->route('user.profile')->with('success', 'Subuser profile updated successfully.');
}

public function subusertoggleStatus($id)
	{
		$user = AddUser::findOrFail($id);

		if ($user->status == 0) {
			$user->status = 1;
			$user->save();
			return redirect()->back()->with('success', 'This account has been suspended.');
		} else {
			$user->status = 0;
			$user->save();
			return redirect()->back()->with('success', 'Account activated successfully.');
		}
	}
}
