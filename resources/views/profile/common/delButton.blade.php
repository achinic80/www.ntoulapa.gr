<x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion{{ $id }}')"
    ><i class="fa-regular fa-trash-can"></i>
</x-danger-button>

    <x-modal name="confirm-user-deletion{{ $id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="delete" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete ?') }}
            </h2>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>