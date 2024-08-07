<x-guest-layout>
    <!-- Mensaje de Error -->
    @if (session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        @if (Route::has('password.request'))
            <div class="mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
<<<<<<< HEAD
            @endif
        <div class="flex items-center justify-end mt-4">

            <div class="col-md-8 offset-md-4">
                <a href="{{ route('google.login') }}" class="btn btn-danger">
                    {{ __('Iniciar sesión con Google') }}
                </a>
            </div>
            <!-- Enlace al Registro -->
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Register') }}
=======
            </div>
        @endif
        

        <div class="flex flex-col items-center justify-center mt-4 space-y-4">

                        <!-- Login Button -->
                        <x-primary-button>
                            {{ __('Log in') }}
                        </x-primary-button>
            <!-- Google Login Button -->
            <a href="{{ route('google.login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                {{ __('Iniciar sesión con Google') }}
>>>>>>> 323cbf9c785c53e8584466eaf7f260b9278b9073
            </a>

            <!-- Enlace al Registro -->
            <a class="underline text-sm text-gray-600 hover:text-gray-900 mt-4" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>
    </form>
</x-guest-layout>
