<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-bold text-2xl text-white leading-tight bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 p-4 rounded-lg shadow-md animate-fade-in-down">
            {{ __('Profil') }}
        </h2>
    </x-slot>

    <div
        class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Mise à jour des informations du profil -->
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl border border-blue-200 dark:border-gray-700 scroll-reveal">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-4">
                        {{ __('Informations du Profil') }}</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Mise à jour de la photo de profil -->
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl border border-blue-200 dark:border-gray-700 scroll-reveal">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-4 animate-fade-in-down">
                        {{ __('Photo de Profil') }}</h3>
                    <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data"
                        x-data="{ preview: null }">
                        @csrf
                        @method('PUT')

                        <div class="mt-4 animate-fade-in-up">
                            <x-input-label for="profile_photo"
                                class="text-lg text-blue-900 dark:text-orange-400 font-semibold" :value="__('Photo de Profil')" />
                            <x-text-input id="profile_photo"
                                class="block mt-1 w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm transition duration-200 hover:border-blue-400 dark:hover:border-gray-500 cursor-pointer bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                                type="file" name="profile_photo" accept="image/*"
                                x-on:change="preview = URL.createObjectURL($event.target.files[0])" />
                            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2 text-red-600 dark:text-red-400" />

                            <!-- Prévisualisation de l'image -->
                            <div class="mt-4" x-show="preview">
                                <img :src="preview" class="max-w-xs rounded-lg shadow-md"
                                    alt="Prévisualisation de la photo de profil">
                            </div>
                        </div>

                        <x-primary-button
                            class="mt-6 bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white transition duration-300 ease-in-out shadow-md animate-fade-in-up">
                            {{ __('Mettre à Jour la Photo') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>

            <!-- Mise à jour du mot de passe -->
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl border border-blue-200 dark:border-gray-700 scroll-reveal">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-4">{{ __('Mot de Passe') }}
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Suppression du compte -->
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl border border-blue-200 dark:border-gray-700 scroll-reveal">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-4">
                        {{ __('Supprimer le Compte') }}</h3>
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-xl font-bold text-blue-500 dark:text-blue-400 animate-fade-in-down">
                                {{ __('Supprimer Votre Compte') }}
                            </h2>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
                            </p>
                        </header>

                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            class="bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 text-white transition duration-300 ease-in-out shadow-md animate-fade-in-up">{{ __('Supprimer Le Compte') }}</x-danger-button>
                    </section>
                </div>
            </div>
        </div>

        <!-- Modale globale -->
        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}"
                class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-blue-200 dark:border-gray-700">
                @csrf
                @method('delete')

                <h2 class="text-xl font-bold text-blue-800 dark:text-orange-400">
                    {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
                </h2>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
                </p>

                <div class="mt-6 animate-fade-in-up">
                    <x-input-label for="password" value="{{ __('Mot de Passe') }}" class="sr-only" />
                    <x-text-input id="password" name="password" type="password"
                        class="mt-1 block w-3/4 border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm transition duration-200 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                        placeholder="{{ __('Mot de Passe') }}" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
                </div>

                <div class="mt-6 flex justify-end gap-3 animate-fade-in-up">
                    <x-secondary-button x-on:click="$dispatch('close')"
                        class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 transition duration-300 ease-in-out">
                        {{ __('Annuler') }}
                    </x-secondary-button>

                    <x-danger-button
                        class="bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 text-white transition duration-300 ease-in-out shadow-md">
                        {{ __('Supprimer Le Compte') }} 
                    </x-danger-button>
                </div>
            </form>
        </x-modal>

    </div>

    <style>
        /* Animations personnalisées */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
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
            }, {
                threshold: 0.2
            });

            elements.forEach(element => observer.observe(element));
        });
    </script>
</x-app-layout>
