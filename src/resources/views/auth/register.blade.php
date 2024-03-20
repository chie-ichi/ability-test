@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('title')
<title>Register | FashionalblyLate</title>
@endsection

@section('header_button')
<a href="/login" class="header__button">login</a>
@endsection

@section('content')
<div class="register">
    <h1 class="page-ttl">Register</h1>
    <div class="register__content">
        <div class="register__content-inner">
            <form action="/register" method="post" class="register-form">
                @csrf
                <div class="register-form__block">
                    <div class="register-form__button">
                        <dl class="register-form__list">
                            <dt class="register-form__item-name">お名前</dt>
                            <dd class="register-form__item">
                                <input type="text" name="name" value="{{ old('name') }}" class="register-form__item-input" placeholder="例: 山田　太郎" />
                                <div class="register-form__error">
                                @error('name')
                                {{ $message }}
                                @enderror
                                </div>
                            </dd>
                        </dl>
                        <dl class="register-form__list">
                            <dt class="register-form__item-name">メールアドレス</dt>
                            <dd class="register-form__item">
                                <input type="text" name="email" value="{{ old('email') }}" class="register-form__item-input" placeholder="例: test@example.com" />
                                <div class="register-form__error">
                                @error('email')
                                {{ $message }}
                                @enderror
                                </div>
                            </dd>
                        </dl>
                        <dl class="register-form__list">
                            <dt class="register-form__item-name">パスワード</dt>
                            <dd class="register-form__item">
                                <input type="text" name="password" value="{{ old('password') }}" class="register-form__item-input" placeholder="例: coachtech1106" />
                                <div class="register-form__error">
                                @error('password')
                                {{ $message }}
                                @enderror
                                </div>
                            </dd>
                        </dl>
                        <button class="register-form__button-submit" type="submit">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection