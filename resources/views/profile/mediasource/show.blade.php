<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Media Source catalog 
        </h2><br>

<!-- Filter Form -->
<form method="GET" action="{{ route('mediasource.show') }}" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                <!-- Filters -->
                <div class="p-0" > 
                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">SourceName</label>
                    <input type="text" name="SourceName" id="SourceName" value="{{ request('SourceName') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">Subject</label>
                    
                </div>
  
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">ListSourceURL</label>
                    <input type="text" name="ListSourceURL" id="ListSourceURL" value="{{ request('ListSourceURL') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
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
        <!-- Records Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
        @foreach($records as $record)
                    <div class="p-0" >
                        <div class="text-sm text-gray-900 fl-left wd-50" >{{ $record->ID }}</div>
                        <div class="text-sm text-gray-900 fl-left wd-200" >{{ $record->SourceName }}</div>
                        <div class="text-sm text-gray-900 fl-left wd-50" >{{ $record->SubjectID }}</div>
                        <div class="text-sm text-gray-900 fl-left wd-400 maxwd-400" >{{ $record->ListSourceURL }}</div>
                        
                        <div class="text-sm text-gray-900 fl-left wd-50" >{{ $record->Language }}</div>
                        <div class="text-sm text-gray-900 fl-left wd-50" >{{ $record->SourceType }}</div>
                        <div class="text-sm text-gray-900 fl-left wd-100" >{{ $record->PromptID }}</div>

                        <div class="text-sm text-gray-900 fl-left wd-100" >


                        @include('common/editButton', ['id' => $record->ID])
                        @include('common/delButton', ['id' => $record->ID])
                        </div>

                    </div>
            @endforeach
            </div>
</div>
        <!-- Pagination -->
        <div class="mt-8">
            {{ $records->links() }} <!-- Tailwind-styled pagination links -->
        </div>



</div>
</div>
</x-slot>
</x-app-layout>

@include('common/modalForEditRecord', [     'what' => 'Media Source',
                                      'updatePath' => 'mediasource/update',
                                        'editPath' => 'mediasource/edit'])
