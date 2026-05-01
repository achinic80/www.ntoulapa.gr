<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Prompts Categories
            @include('common/addButton')
        </h2>
        <br>
        

<div class="container mx-fixed py-18" style='' >
        <!-- Records Grid -->
    <table class="table-auto border-collapse border border-gray-300 w-full text-sm text-left">
    <thead class="bg-gray-100">
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-center">ID</th>
            <th class="border border-gray-300 px-4 py-2 wd-200">Name</th>
            <th class="border border-gray-300 px-4 py-2 wd-300">Description</th>
            <th class="border border-gray-300 px-4 py-2 wd-200 text-center">Action</th>
        </tr>
    </thead>

            @foreach($data['PromptCategories'] as $record)
            <tr>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $record['ID'] }}</td>
            <td class="border border-gray-300 px-4 py-2 wd-200" >{{ $record['Name'] }}</td>
            <td class="border border-gray-300 px-4 py-2 wd-300" >{{ $record['Description'] }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">
                    @include('common/editButton', ['id' => $record['ID']])
                    @include('common/delButton', ['id' => $record['ID']])
            </td>
            </tr>
            @endforeach
    </table>
</div>
</div>
</div>
</x-slot>
</x-app-layout>



@include('common/modalForEditRecord', [     'what' => 'Prompt category',
                                      'updatePath' => 'promptcategory/update',
                                        'editPath' => 'promptcategory/edit'])
