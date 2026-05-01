<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Κωδικοί κινήσεων
           @include('common/addButton')
        </h2><br>
        <!-- Filter Form -->
        <form method="GET" action="{{ route('kk.show') }}" class="mb-4">
           
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ID">ID</label>
                        <input type="text" class="form-control" id="ID" name="ID" value="{{ request('ID') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="txt">Περιγραφή</label>
                        <input type="text" class="form-control" id="txt" name="txt" value="{{ request('txt') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="year">Έτος</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ request('year') }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">ΑΝΑΖΗΤΗΣΗ</button>
        </form>

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th style='text-align:center;'>ID</th>
                    <th>Κίνηση</th>
                    <th>Περιγραφή</th>
                    <th style='text-align:center;'>Έτος</th>
                    <th style='text-align:center;'>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                    <tr>
                        <td style='text-align:center;'>{{ $record->ID }}</td>
                        <td style='text-align:left;'>{{ $record->txt }}</td>
                        <td style='text-align:left;'>{{ $record->description }}</td>
                        <td style='text-align:center;'>{{ $record->year }}</td>
                        <td style='text-align:center;' nowrap>
                            @include('common/editButton', ['id' =>  $record->ID])
                        </td>
                    </tr>
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

@include('common/modalForEditRecord', [     'what' => 'kk',
                                      'updatePath' => 'kk/update',
                                        'editPath' => 'kk/edit'])




