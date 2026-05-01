
<div class="form-group  w-full">
<input type="text" name="ID" id="ID" value="{{ $rec['ID'] }}" 
class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="display:none;">
                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">SourceName</label>
                    <input type="text" name="SourceName" id="SourceName" value="{{ $rec['SourceName'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="SourceName" id="SourceName" value="{{ $rec['SourceName'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="SourceDescription" id="SourceDescription" value="{{ $rec['SourceDescription'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">ListSourceURL</label>
                    <input type="text" name="ListSourceURL" id="ListSourceURL" value="{{ $rec['ListSourceURL'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">ListSourceFeed</label>
                    <input type="text" name="ListSourceFeed" id="ListSourceFeed" value="{{ $rec['ListSourceFeed'] }}" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="SubjectID" class=" text-sm font-medium text-gray-700">SubjectID</label>
                    {!! $rec['Combo_SubjectID'] !!}
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="Language" class=" text-sm font-medium text-gray-700">Language</label>
                    {!! $rec['Combo_Language'] !!}
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="SourceType" class=" text-sm font-medium text-gray-700">SourceType</label>
                    {!! $rec['Combo_SourceType'] !!}
                </div>

                <div class="fl-left  mt-2 fl-left wd-500" >
                    <label for="PromptID" class=" text-sm font-medium text-gray-700">PromptID</label>
                    {!! $rec['Combo_PromptID'] !!}
                </div>
                </div>
            </div>
    </div>
    </div>