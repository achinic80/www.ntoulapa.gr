<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Διαγραφή μέλους
</h2>
<br>

        <!-- Filter Form -->
        <form method="POST" action="{{ route('meli.delete2') }}" class="mb-4">
        @csrf

<div class="container">


{!! $data['errorMsg'] !!}
       

<table class="table table-fixed" id="myTable">
    <tr>
    <td style='background:#515151; color:white; text-align:center;' colspan=4>Βασικά στοιχεία</td>
    </tr>
  
    <tr>
    <td nowrap>Αριθμός μητρώου νέου μέλους</td>
    <td nowrap>
        <input type="text" class="form-control" id="newID" name="newID" value="{{ $data['newID'] }}"></td>
    </tr>
</table>
            <div class="mt-6 flex justify-end">
                <x-primary-button class="ms-3" onclick='checkfornewmemeberid();'>
                    {{ __('ΕΛΕΓΧΟΣ ΓΙΑ ΤΟΝ ΑΡΙΘΜΟ ΜΗΤΡΩΟΥ') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-slot>
</x-app-layout>