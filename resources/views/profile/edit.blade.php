<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight bg-gradient-to-r from-red-600 to-red-800 p-4 rounded-lg shadow-md animate-fade-in-down">
            {{ __('Profil') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Mise à jour des informations du profil -->
            <div class="p-4 sm:p-8 bg-white shadow-lg sm:rounded-xl border border-blue-200 scroll-reveal">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-800 mb-4">{{ __('Informations du Profil') }}</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

<!-- Mise à jour de la photo de profil -->
<div class="p-4 sm:p-8 bg-white shadow-lg sm:rounded-xl border border-blue-200 scroll-reveal">
    <div class="max-w-xl">
        <h3 class="text-xl font-semibold text-blue-800 mb-4 animate-fade-in-down">{{ __('Photo de Profil') }}</h3>
        <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" x-data="{ preview: null }">
            @csrf
            @method('PUT')

            <div class="mt-4 animate-fade-in-up">
                <x-input-label for="profile_photo" class="text-lg text-blue-900 font-semibold" :value="__('Photo de Profil')" />
                <x-text-input
                    id="profile_photo"
                    class="block mt-1 w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm transition duration-200 hover:border-blue-400 cursor-pointer"
                    type="file"
                    name="profile_photo"
                    accept="image/*"
                    x-on:change="preview = URL.createObjectURL($event.target.files[0])"
                />
                <x-input-error :messages="$errors->get('profile_photo')" class="mt-2 text-red-600" />

                <!-- Prévisualisation de l'image -->
                <div class="mt-4" x-show="preview">
                    <img :src="preview" class="max-w-xs rounded-lg shadow-md" alt="Prévisualisation de la photo de profil">
                </div>
            </div>

            <x-primary-button class="mt-6 bg-red-500 hover:bg-red-600 text-white transition duration-300 ease-in-out shadow-md animate-fade-in-up">
                {{ __('Mettre à Jour la Photo') }}
            </x-primary-button>
        </form>
    </div>
    <style>
        /* Animations personnalisées */
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .scroll-reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-reveal.visible {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out;
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

<script>
    // Animation au scroll avec répétition
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
</div>


            <!-- Mise à jour du mot de passe -->
            <div class="p-4 sm:p-8 bg-white shadow-lg sm:rounded-xl border border-blue-200 scroll-reveal">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-800 mb-4">{{ __('Mot de Passe') }}</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Suppression du compte -->
            <div class="p-4 sm:p-8 bg-white shadow-lg sm:rounded-xl border border-blue-200 scroll-reveal">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-800 mb-4">{{ __('Supprimer le Compte') }}</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Animations personnalisées */
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .scroll-reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-reveal.visible {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out;
        }
    </style>

    <script>
        // Animation au scroll avec répétition
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
</x-app-layout>