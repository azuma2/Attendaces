@extends('layouts.common')
@section('content')
<x-guest-layout>
    <x-auth-card>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h1 class="title">会員登録</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="名前" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email"  />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="メールアドレス" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password"  />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="パスワード"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation"  />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" 
                                placeholder="確認用パスワード"
                                required />
            </div>



                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <div class="center">
            アカウントをお持ちの方はこちらから<br>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="login">ログイン</a>
            
        </div>
    </x-auth-card>
</x-guest-layout>
@endsection