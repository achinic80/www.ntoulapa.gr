<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subject catalog
        </h2>

<div class="container mx-fixed py-18" style='' >

 <!-- Filter Form -->
 <form method="post" action="{{ route('subject.update') }}" class="mb-8"  autocomplete="off">
 @csrf
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                
                <div class="p-0" >
                <div class="mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">ID</label>
                    <input type="text" readonly  name="ID" id="ID" value="{{ $rec['ID'] }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
               
                <div class="mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="Name" id="Name" value="{{ $rec['Name'] }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="Description" id="Description" value="{{ $rec['Description'] }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="">Save</button>
            </div>
        </form>

     
</div>





    </x-slot>
</x-app-layout>
