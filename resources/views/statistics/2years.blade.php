<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ΥΠΟΛΟΙΠΑ Τελευταία δύο έτη {{ $data['year2'] }} - {{ $data['year1'] }}
        </h2><br>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('statistics.2years') }}" class="mb-8">
            <div class="flex justify-end mt-4">
                <button type="submit" class="btn_filter">ΥΠΟΛΟΙΠΑ 2 ΤΕΛΕΥΤΑΙΩΝ ΕΤΩΝ</button>
            </div>
        </form>

        <div class="container mx-auto py-4">



<table class="table" id="myTable">
                <!-- Records Grid -->
                <thead class="bg-gray-100">
                     <tr>
                        <th colspan=4></th>
                        <th colspan=3 class="border border-gray-300 px-2 py-1 text-center">{{ $data['year2'] }}</th>
                        <th colspan=3 class="border border-gray-300 px-2 py-1 text-center">{{ $data['year1'] }}</th>

                    </tr>

                    <tr>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">A/A</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">ID</td>
                        <td class="border border-gray-300 px-2 py-1" style="background:#818181; color:white; text-align:left;">Ονοματεπώνυμο</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">Έτη</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">ΧΡΕΩΣΕΙΣ</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">ΠΛΗΡΩΜΕΣ</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">Υπολ {{ $data['year2'] }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">ΧΡΕΩΣΕΙΣ</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">ΠΛΗΡΩΜΕΣ</td>
                        <td class="border border-gray-300 px-2 py-1 text-center" style="background:#818181; color:white; ">Υπολ  {{ $data['year1'] }}</td>
                    </tr>
                </thead>
                @foreach($data['records'] as $record)
                <tr>
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['aa']}} </td>          
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['ID']}} </td>          

                    <td class="border border-gray-300 px-2 py-1" style="text-align:left;">{{ $record['name']}} {{ $record['surname']}} του {{ $record['fathername']}}</td>
                    <td class="border border-gray-300 px-2 py-1" style="text-align:left;">{{ $record['etos']}} </td>

                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['xr2']}} </td>
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['pis2']}} </td>
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['ypol2']}} </td>

                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['xr1']}} </td>
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['pis1']}} </td>
                    <td class="border border-gray-300 px-2 py-1 text-center">{{ $record['ypol1']}} </td>
                </tr>
                @endforeach
            </table>
            <br>
            <br>
            <br>

        </div>

        </div>
        </div>
    </x-slot>
</x-app-layout>
