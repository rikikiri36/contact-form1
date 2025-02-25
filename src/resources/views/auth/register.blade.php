@extends('layouts.authapp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<!-- @if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif -->

<div class="contact-from">
    <div class="contact-form__title">Register</div>
    <form class="contact-form__inner" action="/register" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <label id="name-label" class="form-group__label">お名前</label>
            <input type="text" id="name" name="name" class="form-group__input" placeholder="例:山田 太郎" value="{{ old('name') }}">
            <span class="error-message">
                @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @else
                    &nbsp;
                @endif
            </span>
        </div>

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
            <button type="submit" class="contact-form__submit">登録</button>
        </div>
    </form>
</div>

@endsection