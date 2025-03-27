<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="bg-white shadow-lg rounded-xl p-6 max-w-md mx-auto mt-12 border border-orange-200 scroll-reveal">
        @csrf

        <!-- Nom Complet -->
        <div>
            <x-input-label for="name" :value="__('Nom Complet')" class="text-blue-900 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                {{ __('Nom Complet') }}
            </x-input-label>
            <x-text-input id="name" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-blue-900 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                {{ __('Email') }}
            </x-input-label>
            <x-text-input id="email" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Mot de passe -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" class="text-blue-900 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.104-.896 2-2 2s-2-.896-2-2 2-4 2-4 2 2.896 2 4zm0 0c0 1.104.896 2 2 2s2-.896 2-2m-6 6h8M5 8h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2z"></path></svg>
                {{ __('Mot de passe') }}
            </x-input-label>
            <x-text-input id="password" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-blue-900 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                {{ __('Confirmer le mot de passe') }}
            </x-input-label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Date de Naissance et Lieu de Naissance -->
        <div class="mt-4">
            <x-input-label for="date_de_naissance" :value="__('Date de Naissance')" class="text-blue-900 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ __('Date de Naissance') }} & {{ __('Lieu de Naissance') }}
            </x-input-label>
            <div class="flex gap-2">
                <x-text-input id="date_de_naissance" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300" type="date" name="date_de_naissance" :value="old('date_de_naissance')" required />
                <x-text-input id="lieu_de_naissance" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300" type="text" name="lieu_de_naissance" :value="old('lieu_de_naissance')" placeholder="ex: Bafoussam" required />
            </div>
            <x-input-error :messages="$errors->get('date_de_naissance')" class="mt-2 text-red-600" />
            <x-input-error :messages="$errors->get('lieu_de_naissance')" class="mt-2 text-red-600" />
        </div>

        <!-- Sexe -->
        <div class="mt-4">
            <x-input-label for="sexe" :value="__('Sexe')" class="text-blue-900 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                {{ __('Sexe') }}
            </x-input-label>
            <select id="sexe" name="sexe" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300 bg-orange-50 text-gray-700" required>
                <option value="homme">{{ __('Homme') }}</option>
                <option value="femme">{{ __('Femme') }}</option>
                <option value="autre">{{ __('Autre') }}</option>
            </select>
            <x-input-error :messages="$errors->get('sexe')" class="mt-2 text-red-600" />
        </div>

        <!-- Champ pour la photo de profil -->
        <div class="mt-4">
            <x-input-label for="profile_photo" :value="__('Photo de Profil')" class="text-blue-900 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ __('Photo de Profil') }}
            </x-input-label>
            <x-text-input id="profile_photo" class="block mt-1 w-full rounded-lg border-blue-200 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-300 bg-orange-50 text-gray-700" type="file" name="profile_photo" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-red-600 transition duration-300" href="{{ route('login') }}">
                {{ __('Vous avez déjà un compte ?') }}
            </a>

            <x-primary-button class="ms-4 bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ __("S'Inscrire") }}
            </x-primary-button>
        </div>
    </form>

    <style>
        /* Animations personnalisées */
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .scroll-reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-reveal.visible {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>

    <script>
        // Animation au scroll
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.scroll-reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    } else {
                        entry.target.classList.remove('visible');
                    }
                });
            }, { threshold: 0.2 });

            elements.forEach(element => observer.observe(element));
        });
    </script>
</x-guest-layout>
