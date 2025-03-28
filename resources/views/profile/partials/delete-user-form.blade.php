<form method="POST" action="{{ route('user.destroy') }}" x-data>
    @csrf
    @method('DELETE')

    <p class="text-gray-700 dark:text-gray-300 mb-4">
        {{ __('Une fois votre compte supprimé, toutes vos données seront définitivement perdues.') }}
    </p>

    <x-primary-button 
        class="bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 text-white transition duration-300 ease-in-out shadow-md"
        @click.prevent="confirmDeleteAccount($event, $el)"
    >
        {{ __('Supprimer mon compte') }}
    </x-primary-button>
</form>