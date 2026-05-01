<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Κινήσεις / ημέρα
        </h2><br>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('statistics.statistics') }}" class="mb-8">
            <div class="flex justify-end mt-4">
                <button type="submit" class="btn_filter">ΑΝΑΖΗΤΗΣΗ</button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
      
                <div class="p-0"> 
                    
                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Start Date From</label>
                    <input type="date" name="start_date_from" id="start_date_from" value="{{ request('start_date_from') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Start Date To</label>
                    <input type="date" name="start_date_to" id="start_date_to" value="{{ request('start_date_to') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                </div>
            </div>

        </form>

        <div class="container mx-auto py-4">

@foreach($data['dates'] as $key => $value) 
 
<br>
<h1>
    <span style='color:red;'><b>{{ $value['ck_date'] }}</b></span>
<br><br>

</h1>

<table class="table" id="myTable">
                <!-- Records Grid -->
                <thead class="bg-gray-100">
                    <tr>
                        
                        <th class="border border-gray-300 px-2 py-1 text-center">ID</th>
                        <th class="border border-gray-300 px-2 py-1 text-center">Ημερομηνία</th>
                        <th class="border border-gray-300 px-2 py-1">Κωδ. Κιν.</th>
                        <th class="border border-gray-300 px-2 py-1">Περιγραφή κίνησης</th>
                        <th class="border border-gray-300 px-2 py-1">Κωδ. Μέλους</th>
                        <th class="border border-gray-300 px-2 py-1">Ονοματεπώνυμο μέλους</th>
                        <th class="border border-gray-300 px-2 py-1 ">Παραστατικό</th>
                        <th class="border border-gray-300 px-2 py-1 text-center">Αιτιολογία</th>
                        <th class="border border-gray-300 px-2 py-1 text-center">Ποσό</th>
                    </tr>
                </thead>
                @foreach($data['records'][$value['ck_date']] as $record)
                <tr>
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['ID'] }}</td>
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['ck_date'] }}</td>
                    <td class="border border-gray-300 px-2 py-1 text-center" >{{ $record['ck_kk'] }}</td>
                    <td class="border border-gray-300 px-2 py-1 "  style="text-align: left;">{{ $record['txt'] }}</td>
                    <td class="border border-gray-300 px-2 py-1 text-center">
                        <a href='./meli/analysi/{{ $record['ck_cussupcode'] }}' target='_blank'>{{ $record['ck_cussupcode'] }}</a></td>
                    <td class="border border-gray-300 px-2 py-1" style="text-align: left;">
                        <a href='./meli/analysi/{{ $record['ck_cussupcode'] }}' target='_blank'>{{ $record['surname'] }} {{ $record['name'] }}</a></td>
                    <td class="border border-gray-300 px-2 py-1" style="text-align: left;">{{ $record['ck_parastatiko'] }}</td>
                    <td class="border border-gray-300 px-2 py-1" style="text-align: left;">{{ $record['ck_aitiologia'] }}</td>
                    <td class="border border-gray-300 px-2 py-1 text-right">{{ $record['ck_poso'] }}</td>
                </tr>
                @endforeach
            </table>
            <br>
            <br>
            <br>
@endforeach
        </div>

        </div>
        </div>
    </x-slot>
</x-app-layout>
