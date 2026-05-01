<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Media Source catalog
        </h2><br>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('mediasourcetest.show') }}" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                <!-- SourceName Filter -->
                <div class="p-0" >
                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">SourceName</label>
                    <input type="text" name="SourceName" id="SourceName" value="{{ request('SourceName') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <!-- SourceDescription Filter -->
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">SourceDescription</label>
                    <input type="text" name="SourceDescription" id="SourceDescription" value="{{ request('SourceDescription') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
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
            <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >SourceName</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >SourceDescription</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >CompanyID</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >ListSourceURL</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >ListSourceFeed</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >Lang</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >SourceType</p>
            <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >PromptID</p>
        </div>
        
        @foreach($records as $record)
            <div class="p-0" >
                <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >{{ $record->ID }}                 </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >{{ $record->SourceName }}         </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >{{ $record->SourceDescription }}  </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >{{ $record->CompanyID }}          </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >{{ $record->ListSourceURL }}      </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-100" >{{ $record->ListSourceFeed }}     </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >{{ $record->Language }}           </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-50"  >{{ $record->SourceType }}         </p>
                <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >{{ $record->PromptID }}           </p>
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
