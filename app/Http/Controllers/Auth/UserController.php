<?php

namespace App\Http\Controllers\Auth;
use App\Services\TranslationService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\AddUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmailChange;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
	protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }
      public function home()
    {

		$locales = $this->translationService->getAvailableLocales();
        $authUser = Auth::user();
		 if ($authUser->user_type === 'subuser') {
				return redirect()->route('subuser.homedashboard');
			}
        return view('UserDashboard.index',compact('authUser','locales'));
    }
	public function getUsers(Request $request)
{
    $query = AddUser::where('user_type', 'user')->where('deleted_at', 0);

    // 🔍 Handle search
    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');
        $query->where(function ($q) use ($search) {
            $q->where('firstname', 'like', "%{$search}%")
              ->orWhere('lastname', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
			   ->orWhere('timezone', 'like', "%{$search}%")
              ->orWhere('city', 'like', "%{$search}%")
              ->orWhere('state', 'like', "%{$search}%")
              ->orWhere('zipcode', 'like', "%{$search}%");
        });
    }

    $total = AddUser::where('user_type', 'user')->where('deleted_at', 0)->count();
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
public function getDeletedUser(Request $request)
{
    $query = AddUser::where('user_type', 'user')->where('deleted_at', 1);

    // 🔍 Handle search
    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');
        $query->where(function ($q) use ($search) {
            $q->where('firstname', 'like', "%{$search}%")
              ->orWhere('lastname', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    $total = AddUser::where('user_type', 'user')->where('deleted_at', 1)->count();
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




    public function index()
    {
		$locales = $this->translationService->getAvailableLocales();
        $users = AddUser::where('user_type','=','user')->where('deleted_at', 0)->get();
        return view('auth.listing-user',compact('users','locales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
	 $timezones = DateTimeZone::listIdentifiers();
		$timezoneList = [];

		foreach ($timezones as $tz) {
			$dt = new DateTime("now", new DateTimeZone($tz));
			$timezoneList[] = [
				'name' => $tz,
				'current_time' => $dt->format('Y-m-d H:i:s'),
			];
		}
		$locales = $this->translationService->getAvailableLocales();
        return view('auth.add-user',compact('locales','timezoneList'));
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
			$request->validate([
				'firstname' => 'required|string|max:255',
				'lastname' => 'required|string|max:255',
				'email' => 'required|email',
				'phone' => 'nullable|string|max:20',
				'address' => 'nullable|string|max:255',
				'ipaddress' => 'nullable|ip',
				'services_used' => 'required|string|max:255',
				'city' => 'nullable|string|max:255',
				'state' => 'nullable|string|max:255',
				'zipcode' => 'nullable|string|max:20',
				'password' => 'nullable|string|max:20',
			]);

		  
			if (AddUser::where('email', $request->email)->exists()) {
				return redirect()->back()->withErrors(['email' => 'Email already exists.'])->withInput();
			}

			$data = $request->all();

			if (!empty($data['password'])) {
				$data['password'] = Hash::make($data['password']);
			} else {
				unset($data['password']);
			}

			AddUser::create($data);

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
$timezones = DateTimeZone::listIdentifiers();
		$timezoneList = [];

		foreach ($timezones as $tz) {
			$dt = new DateTime("now", new DateTimeZone($tz));
			$timezoneList[] = [
				'name' => $tz,
				'current_time' => $dt->format('Y-m-d H:i:s'),
			];
		}
		$user = AddUser::findOrFail($id);
		$locales = $this->translationService->getAvailableLocales();
        return view('auth.user.edit-user',compact('locales','user','timezoneList'));
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
        'ipaddress' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'zipcode' => 'required|string|max:20',
        'services_used' => 'nullable|string|max:255',
		'timezone' => 'nullable|string|max:255',
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
		'timezone' => $request->timezone,
    ]);

    return redirect()->route('user.listing')->with('success', 'User updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
	
	
    $delete_user = DB::table('add_users')->where('id', $id)->update(['deleted_at' => 1]);
	 $delete_subuser = DB::table('add_users')
        ->where('user_type', 'subuser')
        ->where('user_id', $id)
        ->update(['deleted_at' => 1]);
    return redirect()->back()->with('success', 'User deleted successfully.');
}

  public function destroyDeleted($id)
{
	
	
    $delete_user = DB::table('add_users')->where('id', $id)->delete();
	 $delete_subuser = DB::table('add_users')
        ->where('user_type', 'subuser')
        ->where('user_id', $id)
        ->delete();
    return redirect()->back()->with('success', 'User permanent deleted successfully.');
}

  public function destroyIp($id)
{
    DB::table('add_users')->where('id', $id)->update(['deleted_at' => 1]);

    return redirect()->back()->with('success', 'Ip with User deleted successfully.');
}

    public function profile(){
		$locales = $this->translationService->getAvailableLocales();
        $authUser = Auth::user();
        return view('UserDashboard.profile',compact('authUser','locales'));
    }
	public function toggleStatus($id)
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
	
	public function bulkAction(Request $request)
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

	public function userProfileEdit(string $id){
		$authUser = Auth::user();
		$locales = $this->translationService->getAvailableLocales();
        return view('auth.user.edit-profile',compact('authUser','locales'));
	}
	public function update_user(Request $request, string $id)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
		]);

		$user = AddUser::findOrFail($id);
		$user->firstname = $request->name;
		if ($request->email !== $user->email) {
			if (AddUser::where('email', $request->email)->where('id', '!=', $user->id)->exists()) {
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
		$user = AddUser::where('email_change_token', $token)->firstOrFail();

		if ($user->pending_email) {
			$user->email = $user->pending_email;
			$user->pending_email = null;
			$user->email_change_token = null;
			$user->save();

			return redirect()->route('user.profile')->with('success', 'Email address updated successfully!');
		}

		return redirect()->route('user.profile')->with('error', 'Invalid or expired token.');
	}
public function autoLogin(string $id)
{
    session([
        'impersonator_id' => auth()->id(),
        'impersonator_guard' => 'web',
        'impersonator_redirect' => route('home') // or use url()->previous()
    ]);

    Auth::guard('web')->logout(); // logout admin
    $user = AddUser::findOrFail($id);
    Auth::guard('add_user')->login($user); // login as user

    return redirect()->route('user.dashboard');
}
public function stopImpersonation()
{
    $adminId = session('impersonator_id');
    $guard = session('impersonator_guard', 'web');
    $redirect = session('impersonator_redirect', route('home'));

    if (!$adminId) {
        abort(403, 'No impersonation in session');
    }

    // Logout user session
    Auth::guard('add_user')->logout();

    // Restore admin session
    $admin = \App\Models\User::findOrFail($adminId);
    Auth::guard($guard)->login($admin);

    // Clear impersonation data
    session()->forget(['impersonator_id', 'impersonator_guard', 'impersonator_redirect']);

    return redirect($redirect); // go back to admin dashboard
}

public function ips_listing(){
	$users = AddUser::where('user_type','=','user')->where('deleted_at', 0)->get();
	$locales = $this->translationService->getAvailableLocales();	
	return view('auth.ips-listing',compact('users','locales'));
}

public function deletedUser(){
	$users = AddUser::where('user_type','=','user')->where('deleted_at', 1)->get();
	$locales = $this->translationService->getAvailableLocales();
	return view('auth.deleted-user',compact('users','locales'));
}
public function bulkActionDeletedUser(Request $request)
{
    $userIds = $request->input('users', []);
    $action = $request->input('action');

    if (empty($userIds)) {
        return redirect()->back()->with('error', 'No users selected.');
    }

    switch ($action) {
        case 'restore':
            DB::table('add_users')->whereIn('id', $userIds)->update(['deleted_at' => 0]);
            return redirect()->back()->with('success', 'Selected users restored.');
		
        case 'delete':
            DB::table('add_users')
                ->where('user_type', 'subuser')
                ->whereIn('user_id', $userIds)
                ->delete();

            DB::table('add_users')->whereIn('id', $userIds)->delete();
            return redirect()->back()->with('success', 'Selected users permanent deleted.');
        default:
            return redirect()->back()->with('error', 'Invalid action.');
    }
}

public function restore($id)
{
    DB::table('add_users')->where('id', $id)->update(['deleted_at' => 0]);

    return redirect()->back()->with('success', 'User Restored successfully.');
}
}
