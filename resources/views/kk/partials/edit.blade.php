
<div class="container">
        ID : {{ $data['record']['ID'] }}
        <form method="POST" action="{{ route('kk.update') }}">
            @csrf
            <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $data['record']['ID'] }}">
            <div class="form-group">
                <label for="txt">Κίνηση</label>
                <input type="text" class="form-control" id="txt" name="txt" value="{{ $data['record']['txt'] }}">
            </div>

            <div class="form-group">
                <label for="description">Περιγραφή</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $data['record']['description'] }}">
            </div>

            <div class="form-group">
                <label for="year">Έτος</label>
                <input type="text" class="form-control" id="year" name="year" value="{{ $data['record']['year'] }}">
            </div>

            <div class="form-group">
                <label for="kk">Κωδ.Κινησης 2</label>
                <input type="text" class="form-control" id="kk" name="kk" value="{{ $data['record']['kk'] }}">
            </div>

        </form>
    </div>
