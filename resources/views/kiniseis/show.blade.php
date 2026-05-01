<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Κινήσεις μελών
           @include('common/addButton')
        </h2><br>
        <!-- Filter Form -->
        <form method="GET" action="{{ route('kiniseis.show') }}" class="mb-4">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="ck_kk">Κωδ.Κίνησης</label>
                        <input type="text" class="form-control" id="ck_kk" name="ck_kk" value="{{ request('ck_kk') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="ck_cussupcode">Κωδ. Μέλους</label>
                        <input type="text" class="form-control" id="ck_cussupcode" name="ck_cussupcode" value="{{ request('ck_cussupcode') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="ck_parastatiko">Παραστατικό</label>
                        <input type="text" class="form-control" id="ck_parastatiko" name="ck_parastatiko" value="{{ request('ck_parastatiko') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="ck_parastatiko">Έτος</label>
                        <input type="text" class="form-control" id="ck_year" name="ck_year" value="{{ request('ck_year') }}">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="ck_aitiologia">Αιτιολογία</label>
                        <input type="text" class="form-control" id="ck_aitiologia" name="ck_aitiologia" value="{{ request('ck_aitiologia') }}">
                    </div>
                </div>
             </div> 

            <button type="submit" class="btn btn-primary mt-3">ΑΝΑΖΗΤΗΣΗ</button>
        </form>
        <!-- Pagination -->
        <div class="mt-8"> 
            {{ $records->links() }} <!-- Tailwind-styled pagination links -->
        </div>
        <br>

        <table class="table" id="tableRecsCatalog">
            <thead>
                <tr>
                    <th>Ημερομηνία</th>
                    <th>Κωδ. Μέλους</th>
                    <th>Μέλος</th>
                    <th>Παραστατικό</th>
                    <th>Έτος</th>
                    <th>Αιτιολογία</th>
                    <th style='text-align:right;'>Ποσό</th>
                    <th style='text-align:center;'>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                    <tr>
                        <td>{{ $record->ck_date }}</td>
                        <td><a href='./meli/analysi/{{ $record->ck_cussupcode }}' target='_blank'>{{ $record->ck_cussupcode }}</a></td>
                        <td><a href='./meli/analysi/{{ $record->ck_cussupcode }}' target='_blank'>{{ $record->surname }} {{ $record->name }}</a></td>
                        <td>{{ $record->ck_parastatiko }}</td>
                        <td>{{ $record->ck_year }}</td>
                        <td>{{ $record->ck_aitiologia }}</td>
                        <td style='text-align:right;'>{{ $record->ck_poso }}</td>
                        <td style='text-align:center;' nowrap>
        @include('common/editButton', ['id' =>  $record->ID])
        @include('common/delButton', ['route' => 'kiniseis/destroy', 'id' => $record['ID']])

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

@include('common/modalForEditRecord', [     'what' => 'kiniseis',
                                      'updatePath' => 'kiniseis/update',
                                        'editPath' => 'kiniseis/edit'])




