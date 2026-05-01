<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Articles Catalog
        </h2><br>
        <!-- Filter Form -->
        <form method="GET" action="{{ route('articles.show') }}" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                <!-- Filters -->
                <div class="p-0" >
                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Summary</label>
                    <input type="text" name="Summary" id="Summary" value="{{ request('Summary') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Subject</label>
                    {!! $data['Combo_SubjectID'] !!}
                </div>
              
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="btn_filter">Filter</button>
            </div>
        </form>
        <br>
        <div class="container" style="width:100%;">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">

        <div class="p-0" style="width:100%;" >
        <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >Source</div>
        <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >Subject</div>
        <div class="text-sm text-gray-900 fl-left wd-600 maxwd-600" >Summary</div>
        <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >Update Date</div>
        </div>

@foreach($data['records'] as $record)
    <div class="p-0" style="width:100%;" >
    <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >{{ $data['mediasourcenames'][$record->ID] }} </div>
       <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >{{ $data['subjects'][$record->ID] }} </div>
       <div class="text-sm text-gray-900 fl-left wd-600 maxwd-600" >{{ $data['short_summaries'][$record->ID] }} </div>
       <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200"  >{{ $record->updated_at}}       </div>
       <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >
    </div>
    </div>
    <div class="p-0 wd-600 maxwd-600" style="width:100%;" >
    <a href='.\articles\view\{{ $record->ID }}' target='_blank'><i class="fa-regular fa-eye"></i>&nbsp;View it</a>
        
        &nbsp;<i class="fa-regular fa-heart"></i>&nbsp;Like it
        &nbsp;<i class="fa-solid fa-cloud-arrow-down"></i>&nbsp;Get it
        </div>
    <div id='article_{{ $record->ID }}' class="p-0" style="width:100%; display:none; " >
    <div class="text-sm text-gray-900 fl-left wd-400 maxwd-400" >{{ $record->OriginalTitle }} 
        <br>
        {{ $record->Summary }}
                   </div>
    </div>
@endforeach
</div>
</div>
        <!-- Pagination -->
        <div class="mt-8">
            {{ $data['records']->links() }} <!-- Tailwind-styled pagination links -->
        </div>



        <x-modal name="user-edit" :show="$errors->userDeletion->isNotEmpty()" focusable class="w-full">
        <form method="POST" action="{{ route('company.update') }}" class="p-6" >
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                Edit Company
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

</div>
</div>
</x-slot>
</x-app-layout>




<script>
    function editRecord($id) {
         // Get the CSRF token
         document.getElementById('edit_form_record').innerHTML = '';
         let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Create a new AJAX request
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'company/edit/' + $id , true);
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















