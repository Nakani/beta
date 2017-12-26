<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	public function form(Request $request)
	{
		return view('password-recovery', ['email' => $request['email'], 'token' => $request['token']]);
	}

	public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

		if ($response == Password::PASSWORD_RESET) {
			return App\AppResult::result('Sua senha foi alterada com sucesso!');
		} else {
			return App\AppResult::error('Código Inválido');
		}
    }
	
	protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' 			=>  Hash::make($password),
            'api_token' 		=> 	str_random(60),
        ])->save();
    }
}
