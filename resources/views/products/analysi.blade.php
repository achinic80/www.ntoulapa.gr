<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
           Στοιχεία μέλους : <span id='ck_cussupcode'>[{{ $data['record']['ID'] }}]</span>
           <span id='ck_cussupcode'><b>{{ $data['record']['surname'] }} {{ $data['record']['name'] }}</b></span>

        </h2><br>
    

        <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'kiniseis-insert')" 
        onclick="insertRecord('{{ $data['record']['ID'] }}')"
        style="float:right;" ><i class="fa-regular fa-square-plus"></i>&nbsp;&nbsp;&nbsp;ΠΡΟΣΘΗΚΗ ΚΙΝΗΣΗΣ
    </x-primary-button>

<table class="table" id="myTable">
 
    <tr>
        <td nowrap style="text-align: left;">Επώνυμο</td><td nowrap  style="text-align: left;"><b>{{ $data['record']['surname'] }} {{ $data['record']['name'] }}</td>
        <td nowrap style="text-align: left;">Email</td><td nowrap  style="text-align: left;"><a href='mailto:{{ $data['record']['email'] }}' style='color:navy;'>{{ $data['record']['email'] }}</a></td>
        <td nowrap style="text-align: right;">Όνομα πατρός</td><td nowrap  style="text-align: left;"><b>{{ $data['record']['fathername'] }}</b></td>
    </tr>

    <tr><td nowrap style="text-align: left;">Επάγγελμα</td><td nowrap style="text-align: left;"><b>{{ $data['record']['occupation'] }}</b></td>
        <td nowrap style="text-align: left;">Κατηγορία</td><td nowrap style="text-align: left;">{{ $data['record']['category'] }} Συμμετοχή σε Γ.Σ. : {{ $data['record']['simetoxiseGS'] }}</td>
        <td nowrap style="text-align: left;">Αρ. BEA : {{ $data['record']['bea'] }} </td><td nowrap style="text-align: left;"> Αρ. EBEA : {{ $data['record']['ebea'] }}</td>
    </tr>
</table>


           
<table class="table">
    <tr>
   
<td style='background:#515151; color:white; text-align:center; width:50%;'>Στοιχεία κατοικίας</td>
<td style='background:#515151; color:white; text-align:center; width:50%;'>Στοιχεία εργασίας</td>
</tr>
<tr>
        <td>
        <table class="table" id="myTable">
            <tr><td style="text-align: left;">Διεύθυνση 1</td><td style="text-align: left;">{{ $data['record']['address1'] }} - {{ $data['record']['city1'] }} - ΤΚ : {{ $data['record']['zip1'] }}</td></tr>
            <tr><td style="text-align: left;">Τηλέφωνο 1</td><td style="text-align: left;">{{ $data['record']['phone1'] }}</td></tr>
            <tr><td style="text-align: left;">Τηλέφωνο 2</td><td style="text-align: left;">{{ $data['record']['phone2'] }}</td></tr>
        </table>
        </td>
        <td>
        <table class="table" id="myTable">
                <tr><td style="text-align: left;">Διεύθυνση 2</td><td style="text-align: left;">{{ $data['record']['address2'] }} - {{ $data['record']['city2'] }} - ΤΚ : {{ $data['record']['zip2'] }}</td></tr>
                <tr><td style="text-align: left;">Τηλέφωνο 3</td><td style="text-align: left;">{{ $data['record']['phone3'] }}</td></tr>
                <tr><td style="text-align: left;">Τηλέφωνο 4</td><td style="text-align: left;">{{ $data['record']['phone4'] }}</td></tr>
                <tr><td style="text-align: left;">Fax</td><td style="text-align: left;">{{ $data['record']['fax'] }}</td></tr>
        </table>
        </td>
    </tr>
</table>

<x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'user-edit')" 
        onclick="editMelos('{{ $data['record']['ID'] }}')"
        style="float:right;" >Edit</i>
    </x-primary-button>

<table class="table" id="myTable">
    <tr>
        <td style="text-align: left;">Σημείωσεις</td><td style="text-align: left;">{{ $data['record']['notes'] }}</td>
        <td style="text-align: left;">Ημ. Εγγραφής</td><td style="text-align: left;">{{ $data['record']['dateofrecord'] }}</td>
       
    </tr>
    <tr>
        <td style="text-align: left;">Υπόλοιπο</td><td style='background:#515151; color:white; text-align:center;'><b>{{ $data['remain'] }} &euro;</b></td>
        <td style="text-align: left;">Διεγραμμένο ? </td>
        <td style="text-align: left;">{{ $data['record']['diegrameno'] }} Απόφαση διαγραφής : {{ $data['record']['apofasidelete'] }}</td>
        </tr>
        
 </table>


<h3><b>Ανάλυση κινήσεων</b></h3>

<!-- Results Table -->
<table class="table" id="myTable">
    <thead>
        <tr>
            <th style='text-align:center;'>ID</th>
            <th style='text-align:center;'>Ημερομηνία</th>
            <th style='text-align:center;'>Κ.Κιν.</th>
            <th style='text-align:left;'>Περιγραφη</th>
            <th style='text-align:right;'>Ποσό</th>
            <th style='text-align:center;'>Παραστατικό</th>
            <th style='text-align:left;'>Αιτιολογία</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data['kiniseis'] as $kinisi)
            <tr>
                <td style='text-align:center;'>{{ $kinisi['ID'] }}</td>
                <td style='text-align:center;'>{{ $kinisi['ck_date'] }}</td>
                <td style='text-align:center;'>{{ $kinisi['ck_kk'] }}</td>
                <td style='text-align:left;'>{{ $kinisi['txt'] }}</td>
                <td style='text-align:right;'>{{ $kinisi['ck_poso'] }}</td>
                <td style='text-align:center;'>{{ $kinisi['ck_parastatiko'] }}</td>
                <td style='text-align:left;'>{{ $kinisi['ck_aitiologia'] }}</td>
            </tr>
    @endforeach
    <tr>
    <td style='background:#515151; color:white; text-align:right;'></td>
    <td style='background:#515151; color:white; text-align:right;'></td>
    <td style='background:#515151; color:white; text-align:right;'></td>
    <td style='background:#515151; color:white; text-align:center;'>Υπόλοιπο</td>
    <td style='background:#515151; color:white; text-align:right;'><b>{{ $data['remain'] }}</b></td>
    <td></td>
    <td></td>
    </tr>
    </tbody>
</table>

    </x-slot>
</x-app-layout>



<x-modal name="kiniseis-insert" :show="$errors->userDeletion->isNotEmpty()" focusable class="w-full" style="width:80%;">
        <form method="POST" action="{{ route('kiniseis.update') }}" class="p-6" >
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                Νέα κίνηση
            </h2>
            <div id="edit_form_record" class="mt-6 flex">
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
</x-modal>



<x-modal name="user-edit" :show="$errors->userDeletion->isNotEmpty()" focusable class="w-full" style="width:80%;">
        <form method="POST" action="{{ route('meli.update') }}" class="p-6" >
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                Διόρθωση μέλους
            </h2>
            <div id="meli_edit_form_record" class="mt-6 flex">
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
</x-modal>


<script>
        function insertRecord(id) {
            // Get the CSRF token
            if (id==0) { id }
            document.getElementById('edit_form_record').innerHTML = '';
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // Create a new AJAX request
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '/public/kiniseis/insert/' + id , true);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the innerHTML of the result div
                    document.getElementById('edit_form_record').innerHTML = xhr.responseText;
                }
                };
                // Send the AJAX request
                xhr.send(JSON.stringify({ key: 'value' })); // Example data payload
        }


        
        function editMelos(id) {
            // Get the CSRF token
            if (id==0) { id }
            document.getElementById('meli_edit_form_record').innerHTML = '';
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // Create a new AJAX request
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '/public/meli/edit/' + id , true);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the innerHTML of the result div
                    document.getElementById('meli_edit_form_record').innerHTML = xhr.responseText;
                }
                };
                // Send the AJAX request
                xhr.send(JSON.stringify({ key: 'value' })); // Example data payload
        }
</script>