<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ΔΙΑΓΡΑΦΗ ΜΕΛΟΥΣ ΕΠΙΒΕΒΑΙΩΣΗ
</h2>
<br>
<br>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
Αριθμός μέλους : {{ $data['record']['ID'] }}
</h2>
<br>

        <!-- Filter Form -->
        <form method="POST" action="{{ route('products.delete2') }}" class="mb-4">
        @csrf

<div class="container">
       <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $data['record']['ID'] }}">

<table class="table table-fixed" id="myTable">
    <tr>
    <td style='background:#515151; color:white; text-align:center;' colspan=4>Βασικά στοιχεία</td>
    </tr>

    <tr>
    <td nowrap>Όνομα</td>
    <td nowrap><input type="text" readonly class="form-control" id="name" name="name" value="{{ $data['record']['name'] }}"></td>
    <td nowrap>Επώνυμο</td>
    <td nowrap><input type="text" readonly class="form-control" id="surname" name="surname" value="{{ $data['record']['surname'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Email</td>
    <td nowrap><input type="text" readonly class="form-control" id="email" name="email" value="{{ $data['record']['email'] }}"></td>
    <td nowrap>Όνομα πατρός</td>
    <td nowrap><input type="text" readonly class="form-control" id="fathername" name="fathername" value="{{ $data['record']['fathername'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Eπάγγελμα</td>
    <td nowrap><input type="text" readonly class="form-control" id="occupation" name="occupation" value="{{ $data['record']['occupation'] }}"></td>
     <td nowrap>Κατηγορία</td>
    <td nowrap><input type="text" readonly class="form-control" id="category" name="category" value="{{ $data['record']['category'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Αρ. BEA</td>
    <td nowrap><input type="text" readonly class="form-control" id="bea" name="bea" value="{{ $data['record']['bea'] }}"></td>
    <td nowrap>Αρ. EBEA</td>
    <td nowrap><input type="text" readonly class="form-control" id="ebea" name="ebea" value="{{ $data['record']['ebea'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Συμμετοχή σε Γ.Σ.</td>
    <td nowrap><input type="text" readonly class="form-control" id="simetoxiseGS" name="simetoxiseGS" value="{{ $data['record']['simetoxiseGS'] }}"></td>
    </tr>
</table>


            <div id="edit_form_record" class="mt-6 flex">
            </div>
            <div class="mt-6 flex justify-end">
               
                <x-primary-button class="ms-3">
                    {{ __('ΟΡΙΣΤΙΚΗ ΔΙΑΓΡΑΦΗ ΜΕΛΟΥΣ') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-slot>
</x-app-layout>