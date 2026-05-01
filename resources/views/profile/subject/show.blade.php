<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subject catalog
        </h2>







         <!-- Filter Form -->
         <form method="GET" action="{{ route('subject.show') }}" class="mb-8">
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




<div class="container mx-fixed py-18" style='' >
        <!-- Records Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
            @foreach($data['Subjects'] as $record)
                    <div class="p-0" >
                        <p class="text-sm text-gray-900 mt-2 fl-left wd-50" >{{ $record['ID'] }}</p>
                        <p class="text-sm text-gray-900 mt-2 fl-left wd-200" >{{ $record['Name'] }}</p>
                        <p class="text-sm text-gray-900 mt-2 fl-left wd-300" >{{ $record['Description'] }}</p>

                        @include('common/editButton', ['id' => $record['ID']])
                        @include('common/delButton', ['id' => $record['ID']])

                    </div>
            @endforeach
        </div>
</div>





    </x-slot>
</x-app-layout>
