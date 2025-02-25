@extends('layouts.authapp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<div class="contact-from">
    <div class="contact-form__title">Login</div>
    <form class="contact-form__inner" action="/login" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <label id="email-label" class="form-group__label">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-group__input" placeholder="例:test@example.com" value="{{ old('email') }}">
            <span class="error-message">
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @else
                    &nbsp;
                @endif
            </span>
        </div>

        <div class="form-group">
            <label id="pass-label" class="form-group__label">パスワード</label>
            <input type="password" id="password" name="password" class="form-group__input" placeholder="例:coachtech1106">
            <span class="error-message">
                @if($errors->has('password'))
                    {{ $errors->first('password') }}
                @else
                    &nbsp;
                @endif
            </span>
        </div>

        <div class="">
            <button type="submit" class="contact-form__submit">ログイン</button>
        </div>
    </form>
</div>

@endsection