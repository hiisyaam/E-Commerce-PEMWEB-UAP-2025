<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-bold"/>
            <x-text-input id="email" class="block mt-1 w-full focus:ring-[#8bae8e] focus:border-[#8bae8e]" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-center mt-6">
            <x-primary-button 
                class="w-full justify-center hover:opacity-90 focus:ring-[#8bae8e] focus:border-[#8bae8e]" 
                style="background-color: #8bae8e; color: white;">
                Email Password Reset Link
            </x-primary-button>
        </div> 
    </form>
</x-guest-layout>
