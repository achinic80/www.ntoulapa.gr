


    
    <div class="container">

            <div class="form-group">
            Μέλος : {{ $data['record']['ck_cussupcode'] }} <b>{{ $data['record']['ck_cussuptxt'] }}</b>
            </div>

            <input type="hidden" class="form-control" id="ck_cussupcode" name="ck_cussupcode" value="{{ $data['record']['ck_cussupcode'] }}">

            <div class="form-group">
                <label for="ck_date">Ημερομηνία</label>
                <input type="date" class="form-control" id="ck_date" name="ck_date" min="2022-01-01" value="{{ $data['record']['ck_date'] }}">

            </div>

            <div class="form-group">
                    <label for="ck_kk" class=" text-sm font-medium text-gray-700">Kωδ.Kίνησης</label>
                    {!! $data['Combo_KKID'] !!}
            </div>

            <div class="form-group">
                <label for="ck_parastatiko">Παραστατικό</label>
                <input type="text" class="form-control" id="ck_parastatiko" name="ck_parastatiko" value="{{ $data['record']['ck_parastatiko'] }}">
            </div>

            <div class="form-group">
                <label for="ck_aitiologia">Αιτιολογία</label>
                <input type="text" class="form-control" id="ck_aitiologia" name="ck_aitiologia" value="{{ $data['record']['ck_aitiologia'] }}">
            </div>

            <div class="form-group">
                <label for="ck_poso">Ποσό</label>
                <input type="number" class="form-control" id="ck_poso" name="ck_poso" value="{{ $data['record']['ck_poso'] }}">
            </div>

    </div>
