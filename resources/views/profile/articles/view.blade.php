<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Article <label for="ID" class=" text-sm font-medium text-gray-700">ID : {{ $rec['ID'] }}</label>
        </h2>

<div class="container mx-fixed py-18" style='' >

 <!-- Filter Form -->

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-1 gap-3">


            <div class="mt-1  ">
                    <label for="updated_at" class=" text-sm font-medium text-gray-700">Updated At</label>
                    <input type="text" name="Originaupdated_atlTitle" id="updated_at" value="{{ $rec['updated_at'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mt-1  ">
                    <label for="OriginalTitle" class=" text-sm font-medium text-gray-700">OriginalTitle</label>
                    <input type="text" name="OriginalTitle" id="OriginalTitle" value="{{ $rec['OriginalTitle'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mt-1  ">
                    <label for="OriginalSourceURL" class=" text-sm font-medium text-gray-700">OriginalSourceURL</label>
                    <input type="text" name="OriginalSourceURL" id="OriginalSourceURL" value="{{ $rec['OriginalSourceURL'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mt-2  ">
                    <label for="SuggestedTitle" class=" text-sm font-medium text-gray-700">SuggestedTitle</label>
                    <input type="text" name="SuggestedTitle" id="SuggestedTitle" value="{{ $rec['SuggestedTitle'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mt-2  ">
                    <label for="Summary" class=" text-sm font-medium text-gray-700">Summary</label>
                    <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="height:400px;">{{ $rec['Summary'] }}</textarea>
                </div>

                <div class="mt-2  ">
                    <label for="PhotoURL" class=" text-sm font-medium text-gray-700">PhotoURL</label>
                    <input type="text" name="PhotoURL" id="PhotoURL" value="{{ $rec['PhotoURL'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

        </form>
</div>

    </x-slot>
</x-app-layout>
