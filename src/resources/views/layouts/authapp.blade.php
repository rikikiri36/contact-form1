<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth/common.css') }}">
  <!--フォント読み込み-->
  <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
  @yield('css')
  {{-- Livewireのスタイルを読み込み --}}
  @livewireStyles
</head>

<body>
  <header class="header">
    <div class="header__inner">
        <div class="header__logo">
          FashionablyLate

        </div>
        <div class="header__btn-wrapper">
        @if (Auth::check())
          <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="header__btn">logout</button>
          </form>
        @else
          @if (Request::is('login'))
            <a href="/register" class="header__btn header__link-register">register</a>
          @elseif (Request::is('register'))
            <a href="/login" class="header__btn header__link-login">login</a>
          @else
            <a href="/login" class="header__btn header__link-login">login</a>
          @endif
        @endif
        </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  {{-- Livewireのスクリプトを読み込み --}}
  @livewireScripts
</body>

</html>