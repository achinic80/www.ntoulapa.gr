bg-blue-500 text-wh<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Record
</h2>
<br>
<br>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
ID : {{ $data['record']['id'] }}
</h2>
<br>

        <!-- Filter Form -->
        <form method="POST" action="{{ route('products.update') }}" class="mb-4">
        @csrf

<div class="container">
       <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $data['record']['id'] }}">

<table class="table table-fixed" id="myTable">
    <tr>
    <td style='background:#515151; color:white; text-align:center;' colspan=4>Βασικά στοιχεία</td>
    </tr>

    <tr>
    <td nowrap>Όνομα</td>
    <td nowrap><input type="text" class="form-control" id="cat1" name="cat1" value="{{ $data['record']['cat1'] }}"></td>
    <td nowrap>Επώνυμο</td>
    <td nowrap><input type="text" class="form-control" id="cat2" name="cat2" value="{{ $data['record']['cat2'] }}"></td>
    </tr>

</table>

<table class="table" id="myTable">
<tr>
    <td style='background:#515151; color:white; text-align:center;' colspan=4>Λοιπά στοιχεία</td>
</tr>

<tr>
    <td nowrap>Σημειώσεις</td>
    <td nowrap colspan=3><input type="text" class="form-control" id="notes1" name="notes1" value="{{ $data['record']['notes1'] }}"></td>
</tr>
</table>

 @include('common/imgSlot', ['record' =>  $data])

        <div id="edit_form_record" class="mt-6 flex">
        </div>

            <x-primary-button class="ms-3" onclick="return save_base64s();">>
                {{ __('Save') }}
            </x-primary-button>
        </div>
</form>

</div>
</x-slot>
</x-app-layout>