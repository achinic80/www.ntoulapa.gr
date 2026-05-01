
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'user-edit')" 
        onclick="editRecord('{{ $id }}')"
        >
        <i class="fa-regular fa-pen-to-square"></i>
    </x-primary-button>