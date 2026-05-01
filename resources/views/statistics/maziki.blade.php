<x-app-layout>
    <x-slot name="header">

    <div class="row" style="width:100%; ">

    <div class="row" style="width:600px; margin:auto; ">
    <br><h2 class="font-semibold text-xl text-gray-800 leading-tight" nowrap>
            ΜΑΖΙΚΗ ΧΡΕΩΣΗ ΜΕΛΩΝ
        </h2><br><br>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight" 
        style="border:1px solid red; background:#d10000; color:white; width:auto; padding:8px; v-align:middle;"   nowrap>
        {{ $data['countResult']  }}
        </h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('statistics.maziki2') }}" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                <div class="p-0"> 
                <div class="form-group">
                    <label for="maziki_date" class=" text-sm font-medium text-gray-700">Ημ. Χρεώσης</label>
                    <input type="date" name="maziki_date" id="maziki_date" value="{{ $data['maziki_date'] }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="form-group">
                    <label for="maziki_kk" class=" text-sm font-medium text-gray-700"><br>Kωδ.Kίνησης για την ΜΑΖΙΚΗ ΧΡΕΩΣΗ</label>
                    {!! $data['Combo_KKID'] !!}
                </div>
                <div class="form-group">
                    <label for="maziki_poso"><br>Ποσό χρέωσης</label>
                    <input type="text" class="form-control" id="maziki_poso" name="maziki_poso" value="{{ $data['maziki_poso'] }}">
                    </div>
                <div class="form-group">
                    <label for="maziki_aitiologia"><br>Αιτιολογία</label>
                    <input type="text" class="form-control" id="maziki_aitiologia" name="maziki_aitiologia" value="{{ $data['maziki_aitiologia'] }}">
                 </div>
                 <div class="flex justify-end mt-4">
                <button type="submit" class="btn_filter">ΕΙΚΟΝΙΚΗ ΧΡΕΩΣΗ</button>
            </div>
            </div>
            </div>
        </form>
        </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </x-slot>
</x-app-layout>
