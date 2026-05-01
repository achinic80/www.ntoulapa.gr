<x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-activation{{ $id }}')"
    >Activate</x-primary-button>

    <x-modal name="confirm-user-activation{{ $id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="delete" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to toggle status?') }}
            </h2>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ms-3">
                    {{ __('Toggle status') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>