<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Κατάλογος μελών</h2>
        


        <!-- Filter Form -->
        <form method="GET" action="{{ route('meli.show') }}" class="mb-4">
           
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="name">Όνομα</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ request('name') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="surname">Επώνυμο</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="{{ request('surname') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="occupation">Επάγγελμα</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" value="{{ request('occupation') }}">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="category">Κατηγορία</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ request('category') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="city1">Πόλη</label>
                        <input type="text" class="form-control" id="city1" name="city1" value="{{ request('city1') }}">
                    </div>
                </div>

                </div>
                <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="phone1">Τηλέφωνο</label>
                        <input type="text" class="form-control" id="phone1" name="phone1" value="{{ request('phone1') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="email">e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ request('email') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="simetoxiseGS">Συμμετοχή σε Γ.Σ.</label>
                        <input type="text" class="form-control" id="simetoxiseGS" name="simetoxiseGS" value="{{ request('simetoxiseGS') }}">
                    </div>
                </div>                
            </div>

            <button type="submit" class="btn btn-primary mt-3">ΑΝΑΖΗΤΗΣΗ</button>
        </form>
  
        <div class="row" style="float:right">
        <button class="btn_blue" style=" " 
          onclick=" window.open('./meli/insert1/0', '_blank'); "
           >
           <i class="fa-regular fa-square-plus"></i>&nbsp;&nbsp;&nbsp;ΠΡΟΣΘΗΚΗ ΝΕΟΥ ΜΕΛΟΥΣ
        </button>
        </div>
        <br><br>

        <!-- Results Table -->
        <table class="table" id="tableRecsCatalog">
            <thead>
                <tr>
                    <th nowrap>Κωδ.</th>
                    <th nowrap>Επώνυμο - Όνομα</th>
                    <th>Επάγγελμα</th>
                    <th>Κατηγορία</th>
                    <th>Πόλη</th>
                    <th>Τηλέφωνο</th>
                    <th nowrap>Συμ. σε Γ.Σ.</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                    <tr>
                        <td style='text-align:center;'>{{ $record->ID }}</td>
                        <td nowrap>{{ $record->surname }} {{ $record->name }}</td>
                        <td>{{ $record->occupation }}</td>
                        <td>{{ $record->category }}</td>
                        <td>{{ $record->city1 }}</td>
                        <td>{{ $record->phone1 }} {{ $record->phone2 }}<br>{{ $record->phone3 }} {{ $record->phone4 }}</td>
                        <td>{{ $record->simetoxiseGS }}</td>
                        <td>{{ $record->email }}</td>
                        <td style='text-align:center;' nowrap>
        <a href='./meli/analysi/{{ $record->ID }}' target='_blank'>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white 
        uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
        transition ease-in-out duration-150"  >
        <i class="fa-regular fa-pen-to-square"></i>
        </button>
        </a>
       
        </div>
    </div>
    @endforeach
</table>
        <!-- Pagination -->
        <div class="mt-8"> 
            {{ $records->links() }} <!-- Tailwind-styled pagination links -->
        </div>
</div>
</div>
</x-slot>
</x-app-layout>

@include('common/modalForEditRecord', [     'what' => 'Meli',
                                      'updatePath' => 'meli/update',
                                        'editPath' => 'meli/edit'])





