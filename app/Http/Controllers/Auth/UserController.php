<?php

namespace App\Http\Controllers\Auth;
use App\Services\TranslationService;
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
	protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }
      public function home()
    {
		$locales = $this->translationService->getAvailableLocales();
        $authUser = Auth::user();
        return view('UserDashboard.index',compact('authUser','locales'));
    }


    public function index()
    {
		$locales = $this->translationService->getAvailableLocales();
        $users = AddUser::where('user_type','=','user')->get();
        return view('auth.listing-user',compact('users','locales'));
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
		$locales = $this->translationService->getAvailableLocales();
        return view('auth.add-user',compact('locales'));
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

}
