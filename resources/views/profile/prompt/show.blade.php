<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Prompts catalog
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2>Select category :</h2><br>
                    @foreach($data['PromptCategories'] as $PromptCategory) 
                        <x-primary-button onclick="loadCategories('{{ $PromptCategory['Name'] }}');" 
                        x-data="">{{ $PromptCategory['Name'] }}
                    </x-primary-button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w" id="prRecords">
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


<script>
    function loadCategories(category) {
            // Get the CSRF token
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Create a new AJAX request
            let xhr = new XMLHttpRequest();
            xhr.open('GET', '{{ route('prompt.getByCategory') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the innerHTML of the result div
                    document.getElementById('prRecords').innerHTML = xhr.responseText;
                }
            };
            // Send the AJAX request
            xhr.send(JSON.stringify({ key: 'value' })); // Example data payload
    }
</script>



@include('common/modalForEditRecord', [     'what' => 'Prompt',
                                      'updatePath' => 'prompt/update',
                                      'editPath'   => 'prompt/edit'])
