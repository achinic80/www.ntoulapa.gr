<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Catalog</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('products.show') }}" class="mb-4">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cat1">cat1</label>
                        <input type="text" class="form-control" id="cat1" name="cat1" value="{{ request('cat1') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cat2">cat2</label>
                        <input type="text" class="form-control" id="cat2" name="cat2" value="{{ request('cat2') }}">
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
            </div>

            <button type="submit" class="btn btn-primary mt-3">ΑΝΑΖΗΤΗΣΗ</button>
        </form>
  
        <div class="row" style="float:right">
        <button class="btn_blue" style=" " 
          onclick=" window.open('./products/insert', '_blank'); "
           >
           <i class="fa-regular fa-square-plus"></i>&nbsp;&nbsp;&nbsp;ΠΡΟΣΘΗΚΗ
        </button>
        </div>
        <br>
        <br>
        <!-- Results Table -->
        <table class="table" id="tableRecsCatalog">
            <thead>
                <tr>
                    <th style='text-align:center;'>Κωδ.</th>
                    <th style='text-align:center;'>Category 1</th>
                    <th style='text-align:center;'>Category 2</th>
                    <th style='text-align:center;'>enabled_chk</th>
                    <th style='text-align:center;'>new_chk</th>
                    <th style='text-align:center;'>top_chk</th>
                    <th style='text-align:center;'>bitrina_chk</th>
                    <th style='text-align:center;'>Images</th>
                    <th style='text-align:center;'>Action</th>
                </tr>
            </thead>
            <tbody>
    @foreach($records as $record)
        <tr>
        <td style='text-align:center;'>{{ $record->id }}</td>
        <td style='text-align:center;'>{{ $record->cat1 }}</td>
        <td style='text-align:center;'>{{ $record->cat2 }}</td>
        <td style="text-align:center;">
            <input
                type="checkbox" class="toggle-field"
                data-id="{{ $record->id }}"
                data-field="enabled_chk"
                {{ $record->enabled_chk ? 'checked' : '' }}>
        </td>
        <td style="text-align:center;">
            <input
                type="checkbox" class="toggle-field"
                data-id="{{ $record->id }}"
                data-field="new_chk"
                {{ $record->new_chk ? 'checked' : '' }}>
        </td>
        <td style="text-align:center;">
            <input
                type="checkbox" class="toggle-field"
                data-id="{{ $record->id }}"
                data-field="top_chk"
                {{ $record->top_chk ? 'checked' : '' }}>
        </td>
        <td style="text-align:center;">
            <input
                type="checkbox" class="toggle-field"
                data-id="{{ $record->id }}"
                data-field="bitrina_chk"
                {{ $record->bitrina_chk ? 'checked' : '' }}>
        </td>

        <td style="text-align:center;">
                @php
                    $rec = $record->getAttributes();
                    echo "<img src='".$imgs[$rec['id']]."' alt='' border=0 style='height:120px;'>"; 
                @endphp
        </td>

        <td style='text-align:center;' nowrap>
        <a href='./products/edit/{{ $record->id }}' target='_blank'>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white 
        uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
        transition ease-in-out duration-150"  >
        <i class="fa-regular fa-pen-to-square"></i>
        </button>
               @include('common/delButton', ['id' => $record['id']])
        </td>
        </a>
        </tr>
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
    @include('common/modalForEditRecord', [    
        'what' => 'Products',
        'updatePath' => 'products/update',
        'editPath' => 'products/edit'])
<script>
    document.querySelectorAll('.toggle-field').forEach(function(el) {
        el.addEventListener('change', function() {
            fetch('{{ route("products.toggleField") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: this.dataset.id,
                    field: this.dataset.field,
                    value: this.checked ? 1 : 0
                })
            });
        });
    });
</script>


