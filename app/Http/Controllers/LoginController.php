<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller {

	public function getLogin() {
		return view('login');
	}

	public function login(Request $request) {
		$response['isError'] = false;
		$validator = Validator::make($request->all(), [
					'email' => 'required',
					'password' => 'required'
		]);
		if ($validator->fails()) {
			$response['isError'] = true;
			$response['error'] = $validator->errors();
		} else {
			if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $request['remember'])) {
				$response['isError'] = true;
				$response['error']['fail'][] = "username or password is invalide";
			}
		}
		return response()->json($response);
	}

	public function getRegister() {
		return view('register');
	}

	public function register(Request $request) {
		die;
		$response['isError'] = false;
		$validator = Validator::make($request->all(), [
					'name' => 'required',
					'email' => 'required',
					'password' => 'required',
					'password_confirmation' => 'required|same:password_confirmation',
		]);
		if ($validator->fails()) {
			$response['isError'] = true;
			$response['error'] = $validator->errors();
		} else {
			$user = User::create([
						'name' => $request['name'],
						'email' => $request['email'],
						'password' => bcrypt($request['password']),
			]);
			Auth::login($user);
		}
		return response()->json($response);
	}
	function logout(){
		Auth::logout();
	}
}
