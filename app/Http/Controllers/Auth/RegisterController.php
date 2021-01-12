<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserRegistered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class RegisterController extends Controller
{

	public function __construct()
	{
		//if user is already registered and access register page it will redirect it to home page
		//we are using guest middleware here.
		$this->middleware(['guest']);
	}

	public function index()
	{
		return view('auth.register');
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'username' => 'required|min:3|max:25|unique:users',
			'email' => 'required|email:rfc,dns|unique:users',
			'password' => 'required|min:8|max:255|confirmed',
		]);
		User::create([
			'username' => $request->username,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);
		auth()->attempt($request->only('username','email','password'));
		$user =new User();
		$admin = User::where('usertype', '=', 'admin')->get();
		/*$admin = User::all()->filter(function ($user) {
                return $user->usertype = 'admin';
            });*/
		//$when = now()->addMinutes(2);
		//$admin->notify((new UserRegistered($user))->delay($when));
		Notification::send($admin, new UserRegistered($user));
		return redirect()->route('dashboard');
	}
}
