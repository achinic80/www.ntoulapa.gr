

<x-modal name="user-edit" :show="$errors->userDeletion->isNotEmpty()" focusable class="w-full">
        <form method="POST" action="{{ $updatePath }}" class="p-6" >
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                Edit {{ $what }}
            </h2>
            <div id="edit_form_record" class="mt-6 flex">
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
</x-modal>


<script>
        function editRecord(id) {
            // Get the CSRF token
            document.getElementById('edit_form_record').innerHTML = '';
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // Create a new AJAX request
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '{{ $editPath }}/' + id , true);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the innerHTML of the result div
                    document.getElementById('edit_form_record').innerHTML = xhr.responseText;
                }
                };
                // Send the AJAX request
                xhr.send(JSON.stringify({ key: 'value' })); // Example data payload
        }
</script>