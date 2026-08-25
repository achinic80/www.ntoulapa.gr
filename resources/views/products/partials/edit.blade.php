
<div class="container">
        ID : {{ $data['record']['ID'] }}
        <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $data['record']['ID'] }}">
        <br>
<table class="table table-fixed" id="myTable">
    <tr>
    <td style='background:#515151; color:white; text-align:center;' colspan=4>Βασικά στοιχεία</td>
    </tr>

    <tr>
    <td nowrap>Όνομα</td>
    <td nowrap><input type="text" class="form-control" id="name" name="name" value="{{ $data['record']['name'] }}"></td>
    <td nowrap>Επώνυμο</td>
    <td nowrap><input type="text" class="form-control" id="surname" name="surname" value="{{ $data['record']['surname'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Email</td>
    <td nowrap><input type="text" class="form-control" id="email" name="email" value="{{ $data['record']['email'] }}"></td>
    <td nowrap>Όνομα πατρός</td>
    <td nowrap><input type="text" class="form-control" id="fathername" name="fathername" value="{{ $data['record']['fathername'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Eπάγγελμα</td>
    <td nowrap><input type="text" class="form-control" id="occupation" name="occupation" value="{{ $data['record']['occupation'] }}"></td>
     <td nowrap>Κατηγορία</td>
    <td nowrap><input type="text" class="form-control" id="category" name="category" value="{{ $data['record']['category'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Αρ. BEA</td>
    <td nowrap><input type="text" class="form-control" id="bea" name="bea" value="{{ $data['record']['bea'] }}"></td>
    <td nowrap>Αρ. EBEA</td>
    <td nowrap><input type="text" class="form-control" id="ebea" name="ebea" value="{{ $data['record']['ebea'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Συμμετοχή σε Γ.Σ.</td>
    <td nowrap><input type="text" class="form-control" id="simetoxiseGS" name="simetoxiseGS" value="{{ $data['record']['simetoxiseGS'] }}"></td>
    </tr>
</table>



<table class="table">

<tr>
<td style='background:#515151; color:white; text-align:center;'>Στοιχεία κατοικίας</td>
<td style='background:#515151; color:white; text-align:center;'>Στοιχεία εργασίας</td>
</tr>

    <tr>
        <td>
        <table class="table" id="myTable">
            <tr><td>Διεύθυνση 1</td><td><input type="text" class="form-control" id="address1" name="address1" value="{{ $data['record']['address1'] }}"></td></tr>
            <tr><td>Πόλη 1</td><td><input type="text" class="form-control" id="city1" name="city1" value="{{ $data['record']['city1'] }}"></td></tr>
            <tr><td>ΤΚ 1</td><td><input type="text" class="form-control" id="zip1" name="zip1" value="{{ $data['record']['zip1'] }}"></td></tr>
            <tr><td>Τηλέφωνο 1</td><td><input type="text" class="form-control" id="phone1" name="phone1" value="{{ $data['record']['phone1'] }}"></td></tr>
            <tr><td>Τηλέφωνο 2</td><td><input type="text" class="form-control" id="phone2" name="phone2" value="{{ $data['record']['phone2'] }}"></td></tr>
        </table>
        </td>
        <td>

        <table class="table" id="myTable">
            <tr><td>Διεύθυνση 2</td><td><input type="text" class="form-control" id="address2" name="address2" value="{{ $data['record']['address2'] }}"></td></tr>
            <tr><td>Πόλη 2</td><td><input type="text" class="form-control" id="city2" name="city2" value="{{ $data['record']['city2'] }}"></td></tr>
            <tr><td>ΤΚ 2</td><td><input type="text" class="form-control" id="zip2" name="zip2" value="{{ $data['record']['zip2'] }}"></td></tr>
            <tr><td>Τηλέφωνο 3</td><td><input type="text" class="form-control" id="phone3" name="phone3" value="{{ $data['record']['phone3'] }}"></td></tr>
            <tr><td>Τηλέφωνο 4</td><td><input type="text" class="form-control" id="phone4" name="phone4" value="{{ $data['record']['phone4'] }}"></td></tr>
            <tr><td>Fax</td><td><input type="text" class="form-control" id="fax" name="fax" value="{{ $data['record']['fax'] }}"></td></tr>
        </table>
        </td>
    </tr>
</table>



<table class="table" id="myTable">
<tr>
<td style='background:#515151; color:white; text-align:center;' colspan=4>Λοιπά στοιχεία</td>
</tr>

    <tr>
    <td nowrap>Ημ. Εγγραφής</td>
    <td nowrap><input type="text" class="form-control" id="dateofrecord" name="dateofrecord" value="{{ $data['record']['dateofrecord'] }}"></td>
    <td nowrap></td>
    <td nowrap></td>
    </tr>
    
    <tr>
    <td nowrap>Διεγραμένο ?</td>
    <td nowrap><input type="text" class="form-control" id="diegrameno" name="diegrameno" value="{{ $data['record']['diegrameno'] }}"></td>
    <td nowrap>Απόφαση διαγραφής</td>
    <td nowrap><input type="text" class="form-control" id="apofasidelete" name="apofasidelete" value="{{ $data['record']['apofasidelete'] }}"></td>
    </tr>

    <tr>
    <td nowrap>Σημειώσεις</td>
    <td nowrap colspan=3><input type="text" class="form-control" id="notes" name="notes" value="{{ $data['record']['notes'] }}"></td>
    </tr>

</table>


    </div>

