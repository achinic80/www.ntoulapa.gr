
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'user-edit')" 
        onclick="editRecord('0')"
        style="float:right;" ><i class="fa-regular fa-square-plus"></i>
    </x-primary-button>