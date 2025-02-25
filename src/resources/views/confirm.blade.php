@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="contact-from">
    <div class="contact-form__title">Confirm</div>
    <div class="contact-form__inner">
      <table>
        <tr>
          <td>お名前</td>
          <td>{{ $form['last_name'] }}&nbsp;&nbsp;{{ $form['first_name'] }}</td>
        </tr>
        <tr>
          <td>性別</td>
          @switch($form['gender'])
            @case(1)
              @php $gender_name = "男性"; @endphp
              @break
            @case(2)
              @php $gender_name = "女性"; @endphp
              @break
            @case(3)
              @php $gender_name = "その他"; @endphp
              @break
          @endswitch
          <td>{{ $gender_name }}</td>
        </tr>
        <tr>
          <td>メールアドレス</td>
          <td>{{ $form['email'] }}</td>
        </tr>
        <tr>
          <td>電話番号</td>
          <td>{{ $form['tel1'] }}{{ $form['tel2'] }}{{ $form['tel3'] }}</td>
        </tr>
        <tr>
          <td>住所</td>
          <td>{{ $form['address'] }}</td>
        </tr>
        <tr>
          <td>建物名</td>
          <td>{{ $form['building'] }}</td>  
        </tr>
        <tr>
          <td>お問い合わせの種類</td>
          <td>{{ $form['category_content'] }}</td>
        </tr>
        <tr>
          <td>お問い合わせ内容</td>
          <td>{{ $form['detail'] }}</td>
        </tr>
      </table>
      @php
        // 電話番号は結合しておく
        $form['tel'] = $form['tel1'] . $form['tel2'] . $form['tel3'];
      @endphp
      <div class="form-group">
        <form action="/create" method="POST">
          @csrf
          @foreach($form as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
          @endforeach
          <button type="submit" class="contact-form__submit">送信</button>
        </form>
        <form action="/" method="POST">
          @csrf
          @foreach($form as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
          @endforeach
          <button type="submit" class="contact-form__edit">修正</button>
        </form>
      </div>
    </div>
  </div>
@endsection