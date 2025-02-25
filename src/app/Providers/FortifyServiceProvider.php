<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::registerView(function () {
                return view('auth.register');
        });
            
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::authenticateUsing(function (Request $request) {
            $validated = $request->validate([
                'email'    => ['email'],
            ], [
                'email.email'       => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            ]);
    
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $request->filled('remember'))) {
                return Auth::user();
            }
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
        
            return Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}
