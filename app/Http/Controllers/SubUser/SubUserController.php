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
use Illuminate\Support\Facades\DB;
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
	
	public function home(){
		$authUser = Auth::user();
		 if ($authUser->user_type === 'user') {
				return redirect()->route('user.dashboard');
			}
		$locales = $this->translationService->getAvailableLocales();
		return view('UserDashboard.subusers.index',compact('locales'));
	}

    public function index()
    {
		$locales = $this->translationService->getAvailableLocales();
		$users = AddUser::where('user_type','=','subuser')->get();
        return view('UserDashboard.subusers.view',compact('users','locales'));
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
			'firstname' => 'required|string|max:255',
				'lastname' => 'required|string|max:255',
				'email' => 'required|email',
				'phone' => 'nullable|string|max:20',
				'address' => 'nullable|string|max:255',
				'services_used' => 'required|string|max:255',
				'city' => 'nullable|string|max:255',
				'state' => 'nullable|string|max:255',
				'zipcode' => 'nullable|string|max:20',
				'user_type' => 'required',
				'permissions' => 'nullable|array',
		]);
	$authId = Auth::id();
	if (AddUser::where('email', $request->email)->exists()) {
					return redirect()->back()->withErrors(['email' => 'Email already exists.'])->withInput();
				}
    // Generate a random password
    $randomPassword = str()->random(10); // 10-character random password

    // Save to the database
    $subUser = new AddUser();
	$subUser->firstname = $request->firstname;
	$subUser->lastname = $request->lastname;
    $subUser->email = $request->email;
	$subUser->phone = $request->phone;
	$subUser->address = $request->address;
	$subUser->services_used = $request->services_used;
	$subUser->city = $request->city;
	$subUser->state = $request->state;
	$subUser->zipcode = $request->zipcode;
	$subUser->user_type = $request->user_type;
    $subUser->password = Hash::make($randomPassword);
	$subUser->permissions = json_encode($request->permissions);
	$subUser->user_id = $authId;
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

		$user = AddUser::findOrFail($id);

		$locales = $this->translationService->getAvailableLocales();
        return view('UserDashboard.subusers.subuser-edit',compact('locales','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:add_users,email,' . $id,
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'zipcode' => 'required|string|max:20',
        'services_used' => 'nullable|string|max:255',
		'user_type' => 'required|string|max:255',
		'permissions' => 'nullable|array',
    ]);

    $user = AddUser::findOrFail($id);

    $user->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'ipaddress' => $request->ipaddress,
        'city' => $request->city,
        'state' => $request->state,
        'zipcode' => $request->zipcode,
        'services_used' => $request->services_used,
		'user_type' => $request->user_type,
		'permissions' => json_encode($request->permissions),
    ]);

    return redirect()->route('subuser.listing')->with('success', 'Sub User updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
      public function destroy($id)
{
    DB::table('add_users')->where('id', $id)->update(['deleted_at' => 1]);

    return redirect()->back()->with('success', 'User deleted successfully.');
}

public function profileSubUser(){
	$locales = $this->translationService->getAvailableLocales();
		$authUser = Auth::user();
		return view('UserDashboard.subusers.profile',compact('authUser','locales'));
}

	public function indexSubuserProfile($id){
		$locales = $this->translationService->getAvailableLocales();
		$subuser = AddUser::findOrFail($id);
		return view('UserDashboard.subusers.editprofile',compact('subuser','locales'));
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
     return redirect()->route('subuser.profile')->with('success', 'Subuser profile updated successfully.');
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
	
		public function bulkActionSubUser(Request $request)
{
    $userIds = $request->input('users', []);
    $action = $request->input('action');

    if (empty($userIds)) {
        return redirect()->back()->with('error', 'No users selected.');
    }

    switch ($action) {
        case 'suspend':
            DB::table('add_users')->whereIn('id', $userIds)->update(['status' => 1]);
            return redirect()->back()->with('success', 'Selected users suspended.');
		 case 'active':
            DB::table('add_users')->whereIn('id', $userIds)->update(['status' => 0]);
            return redirect()->back()->with('success', 'Selected users active.');	
        case 'delete':
            DB::table('add_users')->whereIn('id', $userIds)->update(['deleted_at' => 1]);
            return redirect()->back()->with('success', 'Selected users deleted.');
        default:
            return redirect()->back()->with('error', 'Invalid action.');
    }
}

public function getSubUsers(Request $request)
{
    $query = AddUser::where('user_type', 'subuser')->where('deleted_at', 0);

    // 🔍 Handle search
    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');
        $query->where(function ($q) use ($search) {
            $q->where('firstname', 'like', "%{$search}%")
              ->orWhere('lastname', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
              ->orWhere('city', 'like', "%{$search}%")
              ->orWhere('state', 'like', "%{$search}%")
              ->orWhere('zipcode', 'like', "%{$search}%");
        });
    }

    $total = AddUser::where('user_type', 'subuser')->where('deleted_at', 0)->count();
    $filtered = $query->count();

    // Pagination
    $start = $request->input('start', 0);
    $length = $request->input('length', 10);
    $users = $query->skip($start)->take($length)->get();

    return response()->json([
        'draw' => intval($request->input('draw')),
        'recordsTotal' => $total,
        'recordsFiltered' => $filtered,
        'data' => $users,
    ]);
}
}
