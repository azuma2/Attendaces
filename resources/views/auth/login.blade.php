@extends('layouts.common')
@section('content')
<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h1 class="title">ログイン</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email"  />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="メールアドレス"  required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password"  />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="パスワード"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('リメンバーミー') }}</span>
                </label>
            </div>
            <div class="tng">
                <x-button class="ml-3">
                    {{ __('ログイン') }}
                </x-button>
            </div>
            </div>
        </form>
        <div class="center">
            アカウントをお持ちでない方はこちらから<br>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 center" href="register">会員登録</a>
            
        </div>
    </x-auth-card>
</x-guest-layout>

@endsection