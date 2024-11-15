
@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">

@section('content')
    <div class="container">
        <h1>メールアドレスの確認</h1>
        <p>登録いただいたメールアドレス宛に確認リンクを送信しました。</p>
        @if (session('resent'))
            <div class="alert-success" role="alert">
                新しいメールが送信されました！
            </div>
        @endif
        <p>メールが届かない場合、以下をクリックして再送信してください。</p>
        <form class="form__item form__item-button" method="POST" action="{{ route('verification.send') }}">
        @csrf
    <button type="submit" class="form__input form__input-button">
        {{ __('確認メールを再送信する') }}
    </button>
</form>

<a class="back__button" href="/register">戻る</a>
    </div>
@endsection