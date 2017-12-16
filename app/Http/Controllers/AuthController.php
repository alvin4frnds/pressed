<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Facebook\Facebook;
use Illuminate\Http\Request;
use App\Communicate\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
	/**
	 * @param Request $request
	 *
	 * @return $this|string
	 */
	public function signup( Request $request ) {
		
		$method = $request->has( 'method' ) ? $request->all()['method'] : 'email';
		
		if (in_array($method, ['google', 'facebook']) && $request->has('token_id')) {
			// try to log-in instead.
			
			$user = (new User())->where('token_id', $request->token_id)->first();
			if ($user) {
				Auth::login($user);
				
				return apiReturn("Logged in this user.", 1, $user->toArray());
			}
		}
		
		$userInfo = [
			"name"     => $request->name ?: "",
			"email"    => $request->email ?: "",
			"phone"    => $request->phone ?: "",
			"password" => bcrypt($request->password ?: "test1234"),
			"method"   => $method,
			"image"    => $request->image ?: "",
			"token_id" => $request->token_id ?: null,
		];
		
		if ($userInfo['email'] && (new User())->where('email', $userInfo['email'])->first()) {
			return apiReturn("Email already exists, try loggin in instead.", 0, ['login' => true]);
		}
		
		$user = (new User())->create( $userInfo );
		
		Auth::login($user);
		
		return apiReturn("Successfully Created.", 1, $user->toArray());
	}
	
	public function login( Request $request ) {
		if (! $request->has('email', 'password')) return apiReturn("field 'email' & 'password' is mandatory.");
		
		$user = User::where('email', $request->email)->first();
		if (! $user) return apiReturn("User record not found. Create New Account.", 0, ['register' => true]);
		
		if (! Hash::check($request->password, $user->getAuthPassword()))
			return apiReturn("Incorrect Password.");
			
	    return apiReturn("Here you go!", 1, $user->toArray());
	}
}
