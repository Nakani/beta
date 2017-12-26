<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Http\Request;
use App;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function getResetToken(Request $request)
	{
			$this->validate($request, ['email' => 'required|email']);

            $user = App\User::where('email', $request->input('email'))->first();
            if (!$user) {
                return App\AppResult::error('Email não encontrado');
            }
            $token = $this->broker()->createToken($user);
			
			$mailSent = false;
			$recovery_url = getenv('APP_URL') . '/password-recovery?token=' . $token . '&email=' . $request->input('email');
			$mail = App\GarupaMail::send('password-recovery', ['recovery_url' => $recovery_url], $request['email'], $request['email']);
			$mailSent = $mail['total_accepted_recipients'] > 0;
			
            return App\AppResult::result(['mailSent' => $mailSent]);

    }
}
