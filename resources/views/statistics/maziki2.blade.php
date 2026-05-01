<x-app-layout>
    <x-slot name="header">

    <div class="row" style="width:100%; ">

    <div class="row" style="width:600px; margin:auto; ">
    <br><h2 class="font-semibold text-xl text-gray-800 leading-tight" nowrap>
            ΜΑΖΙΚΗ ΧΡΕΩΣΗ ΜΕΛΩΝ - Τελευταίο βήμα
        </h2>
        <br>
        <br>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight" 
        style="border:1px solid red; background:#d10000; color:white; width:auto; padding:8px; v-align:middle;"   nowrap>
        {{ $data['tot_meli_records'] }} μέλη x {{ $data['maziki_poso'] }} &euro; = {{ $data['tot_poso'] }} &euro;
        </h2>




        <!-- Filter Form -->
        <form method="GET" action="{{ route('statistics.maziki3') }}" class="mb-8">
        <br>
        <input type="hidden" class="form-control" id="maziki_date" name="maziki_date" value="{{ $data['maziki_date'] }}">
        <input type="hidden" class="form-control" id="ck_kk" name="ck_kk" value="{{ $data['kk']['ID'] }}">
        <input type="hidden" class="form-control" id="maziki_aitiologia" name="maziki_aitiologia" value="{{ $data['maziki_aitiologia'] }}">
        <input type="hidden" class="form-control" id="maziki_poso" name="maziki_poso" value="{{ $data['maziki_poso'] }}">

            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                <div class="p-0"> 
                <div class="form-group">
                    <label for="mazi_date">Ημ. Χρεώσης</label>
                    <br>
                    <b>{{ $data['maziki_date'] }}
                    
                </div>
                <div class="form-group">
                    <label for="ck_kk"><br>Kωδ.Kίνησης για την ΜΑΖΙΚΗ ΧΡΕΩΣΗ</label>
                    <br>
                    <b>{{ $data['kk']['ID'] }} - {{ $data['kk']['txt'] }}
                </div>
                <div class="form-group">
                    <label for="poso"><br>Ποσό χρέωσης</label>
                    <br>
                    <b>{{ $data['maziki_poso'] }}
                </div>
                <div class="form-group">
                    <label for="aitiologia"><br>Αιτιολογία</label>
                    <br>
                    <b>{{ $data['maziki_aitiologia'] }}
                 </div>
                 <div class="flex justify-end mt-4">
                 <button type="button" class="btn_filter" onclick='location.href="{{ route('statistics.maziki') }}"'>< ΕΠΙΣΤΡΟΦΗ</button>
                 &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn_filter">ΟΛΟΚΛΗΡΩΣΗ ΧΡΕΩΣΗΣ</button>
            </div>
            </div>
            </div>
        </form>
        </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </x-slot>
</x-app-layout>
