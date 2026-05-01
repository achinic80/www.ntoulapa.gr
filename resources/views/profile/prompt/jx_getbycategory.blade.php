<h2> Prompts catalog :</h2>
<br>
</div>
<div class="container mx-fixed py-18" style='' >

<div class="container mx-auto px-4 py-8">
    <table class="table-auto border-collapse border border-gray-300 w-full text-sm text-left">
    <thead class="bg-gray-100">
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-center">ID</th>
            <th class="border border-gray-300 px-4 py-2 wd-200">Name</th>
            <th class="border border-gray-300 px-4 py-2 wd-200">Description</th>
            <th class="border border-gray-300 px-4 py-2 text-center">PromptText</th>
            <th class="border border-gray-300 px-4 py-2 text-center wd-200">Action</th>
        </tr>
    </thead>
    <tbody>
            @foreach($data['Prompts'] as $record)
                    <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $record['ID'] }}</td>
                    <td class="border border-gray-300 px-4 py-2 nowrap wd-200">{{ $record['Name'] }}</td>
                    <td class="border border-gray-300 px-4 py-2 wd-200">{{ $record['Description'] }}</td>
                    <td class="border border-gray-300 px-4 py-2 ">{{ $record['PromptText'] }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                    @include('common/editButton', ['id' => $record['ID']])
                    @include('common/delButton', ['id' => $record['ID']])
                    </td>
                    </tr>
            @endforeach
    </tbody>
    </table>

</div>
</div>


