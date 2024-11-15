<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    // メール確認通知
    public function show()
    {
        return view('auth.verify-email');
    }

    // メールを確認して認証を完了
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/login'); 
    }

    // メール確認通知の再送信
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('resent', true);
    }
}