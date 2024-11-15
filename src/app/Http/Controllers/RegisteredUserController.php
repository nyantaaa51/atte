<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function store(RegisterRequest $request)
    {
    //新しいユーザーの作成
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    //ログイン処理
    Auth::login($user);

    //確認メールを送信
    event(new Registered($user));

    //メール確認ページへリダイレクト
    return redirect()->route('verification.notice')
        ->with('message', '会員登録が完了しました。確認メールをご確認ください。');
    }

    public function show()
    {
        return view('auth.register'); 
    }
}