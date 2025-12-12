<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" 
                class="block mt-1 w-full focus:ring-[#A4133C] focus:border-[#A4133C] border-gray-300 rounded-lg" 
                type="email" name="email" 
                :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" 
                class="block mt-1 w-full focus:ring-[#A4133C] focus:border-[#A4133C] border-gray-300 rounded-lg"
                type="password"
                name="password"
                required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" 
                       type="checkbox" 
                       class="rounded border-gray-300 text-[#A4133C] focus:ring-[#A4133C]" 
                       name="remember">
                <span class="ms-2 text-sm text-gray-700">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-[#A4133C] transition duration-200" 
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button 
                class="ml-4 px-6 py-2 bg-[#A4133C] text-white rounded-lg shadow hover:bg-[#82102F] transition duration-200">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
