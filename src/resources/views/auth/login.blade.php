@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('title')
<title>Login | FashionalblyLate</title>
@endsection

@section('header_button')
<a href="/register" class="header__button">register</a>
@endsection

@section('content')
<div class="login">
    <h1 class="page-ttl">Login</h1>
    <div class="login__content">
        <div class="login__content-inner">
            <form action="/login" method="post" class="login-form">
                @csrf
                <div class="login-form__block">
                    <div class="login-form__button">
                        <dl class="login-form__list">
                            <dt class="login-form__item-name">メールアドレス</dt>
                            <dd class="login-form__item">
                                <input type="text" name="email" value="{{ old('email') }}" class="login-form__item-input" placeholder="例: test@example.com" />
                                <div class="login-form__error">
                                @error('email')
                                {{ $message }}
                                @enderror
                                </div>
                            </dd>
                        </dl>
                        <dl class="login-form__list">
                            <dt class="login-form__item-name">パスワード</dt>
                            <dd class="login-form__item">
                                <input type="text" name="password" value="{{ old('password') }}" class="login-form__item-input" placeholder="例: coachtech1106" />
                                <div class="login-form__error">
                                @error('password')
                                {{ $message }}
                                @enderror
                                </div>
                            </dd>
                        </dl>
                        <button class="login-form__button-submit" type="submit">ログイン</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection