<x-app-layout>
    <x-slot name="header">
    <div id="printable-content">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Ταμειακώς τακτοποιημένα μέλη
        </h2><br>
        Ταξινόμηση με : 
        <a href='{{ route('meli.remains0') }}?sort_by=surname'>Επώνυμο</a>&nbsp;|&nbsp;
        <a href='{{ route('meli.remains0') }}?sort_by=cussupcode'>Κωδ.Μέλους</a>&nbsp;|&nbsp;
        <a href='{{ route('meli.remains0') }}?sort_by=category'>Κατηγορία</a>&nbsp;|&nbsp;
        <a href='{{ route('meli.remains0') }}?sort_by=remain'>Υπόλοιπο</a>
        <br>

        <button class="btn btn-primary mt-3" onclick="printContent()">ΕΚΤΥΠΩΣΗ</button>
        <br>
        <br>
        <table class="table" id="myTable2" border='1' cellpading=0 cellspacing=0>
            <thead>
                <tr>
                    <th style='text-align:center;'>Κωδ.Μέλους</th>
                    <th>Επώνυμο Όνομα</th>
                    <th>Πατρώνυμο</th>
                    <th style='text-align:right;'>Υπολοιπο</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data['records'] as $record)
            <tr>
                <td nowrap style='text-align:center;'><a href='./analysi/{{ $record->ID }}' target='_blank'>{{ $record->ID }}</a></td>
                <td nowrap style='text-align:left;'>
                <a href='./analysi/{{ $record->ID }}' target='_blank'>{{ $record->surname }}&nbsp;{{ $record->name }}</a></td>
                <td nowrap style='text-align:left;'>
                    {{ $record->fathername }}</a></td>
                <td style='text-align:right;'><b> {{ $record->remain }}&nbsp;&euro; &nbsp;&nbsp;</td>
                <?php $data['aa']=$data['aa']+1;?>
            </tr>
            @endforeach
    </table>

</div>
</div>
</div>
</x-slot>
</x-app-layout>

@include('common/modalForEditRecord', [     'what' => 'Meli',
                                      'updatePath' => 'meli/update',
                                        'editPath' => 'meli/edit'])






<script>
    function printContent() {
        var content = document.getElementById('printable-content').innerHTML;
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print</title></head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

