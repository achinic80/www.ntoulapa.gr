<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Market Place
        </h2><br>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('marketplace') }}" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                <!-- OriginalTitle Filter -->
                <div class="p-0" >
                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">OriginalTitle</label>
                    <input type="text" name="OriginalTitle" id="OriginalTitle" value="{{ request('OriginalTitle') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <!-- OriginalSourceURL Filter -->
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">OriginalSourceURL</label>
                    <input type="text" name="OriginalSourceURL" id="OriginalSourceURL" value="{{ request('OriginalSourceURL') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- SuggestedTitle Filter -->
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">SuggestedTitle</label>
                    <input type="text" name="SuggestedTitle" id="SuggestedTitle" value="{{ request('SuggestedTitle') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Summary Filter -->
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">Summary</label>
                    <input type="text" name="Summary" id="Summary" value="{{ request('Summary') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- updated_at Filter -->
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">Update At</label>
                    <input type="text" name="updated_at" id="updated_at" value="{{ request('updated_at') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="btn_filter">Filter</button>
            </div>
        </form>
        
        <div class="container mx-auto px-4 py-8">
<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
        <!-- Records Grid -->
        <div class="p-0" >
            <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >ID</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >updated_at</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >OriginalTitle</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >OriginalSourceURL</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >SuggestedTitle</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >Summary</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >PhotoURL</p>

        </div>
        
        @foreach($records as $record)
            <div class="p-0" >
                <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >{{ $record->ID }}                 </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >{{ $record->updated_at }}         </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >{{ $record->OriginalTitle }}         </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >{{ $record->OriginalSourceURL }}  </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >{{ $record->SuggestedTitle }}          </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >{{ $record->Summary }}      </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >{{ $record->PhotoURL }}     </p>
            </div>
        @endforeach
        </div>
</div>




        <!-- Pagination -->
        <div class="mt-8">
            {{ $records->links() }} <!-- Tailwind-styled pagination links -->
        </div>
    </div>




    </x-slot>
</x-app-layout>
