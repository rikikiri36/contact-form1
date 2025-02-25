@extends('layouts.authapp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="contact-from">
    <div class="contact-form__title">Admin</div>
</div>

<div class="main-wrapper">
    <form action="/admin/search" class="search-form" method="get">
        <input type="text" name="keyword" value="{{request('keyword')}}" class="form-group__input" placeholder="名前やメールアドレスを入力してください">
        <div class="select-wrapper select-wrapper--short">
            <select name="gender" class="form-group__select form-group__select--shot">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>
        </div>
        <div class="select-wrapper select-wrapper--long">
            <select id="category_id" name="category_id" value="{{ old('category_id') }}" class="form-group__select">
                <option value="" disabled selected>お問い合わせの種類</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
        </div>
            <input type="date" id="created_at" name="created_at" class="form-group__input--date" value="{{request('created_at')}}" />
        <div class="search-form__button-group">
            <button type="submit" class="search-form__submit">検索</button>
            <button type="button" class="search-form__reset" onclick="window.location.href='/admin'">リセット</button>
        </div>
    </form>

    <div class="pagination-wrapper">
        {{ $contacts->links('vendor.pagination.custom') }}
    </div>
    @if($contacts->isEmpty())
        <p class="nodata">お問い合わせ情報は存在しません</p>
    @else
        <table class="contact-list">
            <thead>
                <tr>
                    <th class="col-name">お名前</th>
                    <th class="col-gender">性別</th>
                    <th class="col-email">メールアドレス</th>
                    <th class="col-category">お問い合わせの種類</th>
                    <th class="col-detail"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }}&nbsp;&nbsp;{{ $contact->first_name }}</td>
                    <td>{{ $contact->getGenderName() }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>
                        <button type="button" class="contact-detail" onclick="window.livewire.emit('loadContact', {{ $contact->id }})">詳細</button>
                    </td>
                    <input type="hidden" name="id" value="{{ $contact->id }}">
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<livewire:contact-detail-modal />
@endsection