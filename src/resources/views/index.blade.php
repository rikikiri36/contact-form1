@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="">
    <div class="content__title">Contact</div>
    <form class="contact-form__inner" action="/confirm" method="POST">
        @csrf
        <div class="form-group">
            <label id="name-label" class="form-group__label">お名前<span class="form-group__label-required">※</span></label>
            <div class="form-group__input-wrapper--name">
                <div class="input-with-error">
                    <input type="text" id="last_name" name="last_name" class="form-group__input form-group__input--name" placeholder="例:山田" value="{{ old('last_name') }}">
                    @if($errors->has('last_name'))
                        <span class="error-message">{{$errors->first('last_name')}}</span>
                    @else
                        <span class="error-message">&nbsp;</span>
                    @endif
                    </div>
                <div class="input-with-error">
                    <input type="text" id="first_name" name="first_name" class="form-group__input form-group__input--name" placeholder="例:太郎" value="{{ old('first_name') }}">
                    @if($errors->has('first_name'))
                        <span class="error-message">{{$errors->first('first_name')}}</span>
                    @else
                        <span class="error-message">&nbsp;</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group form-group-noerror">
            <label id="gender-label" class="form-group__label">性別<span class="form-group__label-required">※</span></label>
            <div class="form-group__radio-wrapper">
                <div class="radio-item">
                    <input type="radio" id="gender-male" name="gender" value="1" class="form-group__radio" {{ old('gender', '1') == '1' ? 'checked' : '' }}>
                    <label for="gender-male" class="form-group__radio-label">男性</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="gender-female" name="gender" value="2" class="form-group__radio" {{ old('gender', '1') == '2' ? 'checked' : '' }}>
                    <label for="gender-female" class="form-group__radio-label">女性</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="gender-other" name="gender" value="3" class="form-group__radio" {{ old('gender', '1') == '3' ? 'checked' : '' }}>
                    <label for="gender-other" class="form-group__radio-label">その他</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label id="email-label" class="form-group__label">メールアドレス<span class="form-group__label-required">※</span></label>
            <div class="input-with-error">
                <input type="text" id="email" name="email" class="form-group__input" placeholder="例:test@example.com" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="error-message">{{$errors->first('email')}}</span>
                @else
                    <span class="error-message">&nbsp;</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label id="tel-label" class="form-group__label">電話番号<span class="form-group__label-required">※</span></label>
            <div class="form-group__input-wrapper--tel">

                <div class="input-with-error--tel">
                    <input type="text" id="tel1" name="tel1" value="{{ old('tel1') }}" class="form-group__input form-group__input--tel" placeholder="080">
                    @if($errors->has('tel1'))
                        <span class="error-message">{{ $errors->first('tel1') }}</span>
                    @else
                        <span class="error-message">&nbsp;</span>
                    @endif
                </div>
                <span class="span-hyphen">-</span>
                <div class="input-with-error-tel">
                    <input type="text" id="tel2" name="tel2" value="{{ old('tel2') }}" class="form-group__input form-group__input--tel" placeholder="1234">
                    @if($errors->has('tel2'))
                        <span class="error-message">{{ $errors->first('tel2') }}</span>
                    @else
                        <span class="error-message">&nbsp;</span>
                    @endif
                </div>
                <span class="span-hyphen">-</span>
                <div class="input-with-error-tel">
                    <input type="text" id="tel3" name="tel3" value="{{ old('tel3') }}" class="form-group__input form-group__input--tel" placeholder="5678">
                    @if($errors->has('tel3'))
                        <span class="error-message">{{ $errors->first('tel3') }}</span>
                    @else
                        <span class="error-message">&nbsp;</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label id="address-label" class="form-group__label">住所<span class="form-group__label-required">※</span></label>
            <div class="input-with-error">
                <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-group__input" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                @if($errors->has('address'))
                    <span class="error-message">{{$errors->first('address')}}</span>
                @else
                    <span class="error-message">&nbsp;</span>
                @endif
            </div>
        </div>
        <div class="form-group form-group-noerror">
            <label id="building-label" class="form-group__label">建物名</label>
            <input type="text" id="building" name="building" value="{{ old('building') }}" class="form-group__input" placeholder="例:千駄ヶ谷マンション101">
        </div>

        <div class="form-group">
            <label id="category-label" class="form-group__label">お問い合わせの種類<span class="form-group__label-required">※</span></label>
            <div class="select-wrapper">
                <div class="input-with-error">
                    <select id="category_id" name="category_id" value="{{ old('category_id') }}" class="form-group__select">
                        <option value="" disabled selected>選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                        <span class="error-message">{{$errors->first('category_id')}}</span>
                    @else
                        <span class="error-message">&nbsp;</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label id="detail-label" class="form-group__label">お問い合わせの内容<span class="form-group__label-required">※</span></label>
            <div class="input-with-error">
                <textarea id="detail" name="detail" class="form-group__textarea" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
                @if($errors->has('detail'))
                    <span class="error-message">{{$errors->first('detail')}}</span>
                @else
                    <span class="error-message">&nbsp;</span>
                @endif
            </div>
        </div>
        <div class="from-group__submit">
            <button type="submit" class="contact-form__submit">確認画面</button>
        </div>
    </form>
</div>

@endsection