<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <img src="/assets/img/logo-labuan.png" style="padding: 30px 90px 30px 90px;" >

            <div style="padding-bottom: 30px;">
              <h1 style="font-size: 35px;" class="mt-2 mb-2 text-xl text-center text-black-600"><b>Perbadanan Labuan</b></h1>
              <h1 class="mt-2 mb-2 text-xl text-center text-black-600"><b>Sistem Pengurusan Aset dan Stor</b></h1>
            </div>


            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Emel')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Kata Laluan')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingati saya') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Terlupa kata laluan?') }}
                    </a>
                @endif

                <x-button class="ml-4" style="background-color: #17a2b8;">
                    {{ __('Log Masuk') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
