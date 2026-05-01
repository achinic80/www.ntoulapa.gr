
<div class="form-group  w-full">
<input type="text" name="ID" id="ID" value="{{ $rec['ID'] }}" 
class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="display:none;">
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="Name" id="Name" value="{{ $rec['Name'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">CompanyName</label>
                    <input type="text" name="BillingCompanyName" id="BillingCompanyName" value="{{ $rec['BillingCompanyName'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">VAT</label>
                    <input type="text" name="VAT" id="VAT" value="{{ $rec['VAT'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">DOY</label>
                    <input type="text" name="BillingDOY" id="BillingDOY" value="{{ $rec['BillingDOY'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">BillingAddress1</label>
                    <input type="text" name="BillingAddress1" id="BillingAddress1" value="{{ $rec['BillingAddress1'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">BillingAddress2</label>
                    <input type="text" name="BillingAddress2" id="BillingAddress2" value="{{ $rec['BillingAddress2'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">BillingCity</label>
                    <input type="text" name="BillingCity" id="BillingCity" value="{{ $rec['BillingCity'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">BillingCountry</label>
                    <input type="text" name="BillingCountry" id="BillingCountry" value="{{ $rec['BillingCountry'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">BillingPhone</label>
                    <input type="text" name="BillingPhone" id="BillingPhone" value="{{ $rec['BillingPhone'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">BillingBankAccount</label>
                    <input type="text" name="BillingBankAccount" id="BillingBankAccount" value="{{ $rec['BillingBankAccount'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">MotherCompanyID</label>
                    {!! $rec['Combo_MotherCompanyID'] !!}
                </div>


 </div>


 </div>