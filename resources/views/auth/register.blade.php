<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Nom Complet -->
        <div>
            <x-input-label for="name" :value="__('Nom Complet')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

    <!-- Date de Naissance et Lieu de Naissance -->
    <div class="mt-4">
        <x-input-label for="date_de_naissance" :value="__('Date de Naissance')" />
        <div class="flex">
            <x-text-input id="date_de_naissance" class="block mt-1 w-full" type="date" name="date_de_naissance" :value="old('date_de_naissance')" required />
            <x-text-input id="lieu_de_naissance" class="block mt-1 w-full ml-2" type="text" name="lieu_de_naissance" :value="old('lieu_de_naissance')" placeholder="ex: Bafoussam" required />
        </div>
        <x-input-error :messages="$errors->get('date_de_naissance')" class="mt-2" />
        <x-input-error :messages="$errors->get('lieu_de_naissance')" class="mt-2" />
    </div>

        <!-- Sexe -->
        <div class="mt-4">
            <x-input-label for="sexe" :value="__('Sexe')" />
            <select id="sexe" name="sexe" class="block mt-1 w-full" required>
                <option value="homme">{{ __('Homme') }}</option>
                <option value="femme">{{ __('Femme') }}</option>
                <option value="autre">{{ __('Autre') }}</option>
            </select>
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <!-- Champ pour la photo de profil -->
        <div class="mt-4">
            <x-input-label for="profile_photo" :value="__('Photo de Profil')" />
            <x-text-input id="profile_photo" class="block mt-1 w-full " type="file" name="profile_photo" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Vous avez déjà un compte ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __("S'Inscrire") }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
