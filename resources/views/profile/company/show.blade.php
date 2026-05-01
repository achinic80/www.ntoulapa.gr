<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Company Details
           @include('common/addButton')
        </h2><br>
        <!-- Filter Form -->
        <form method="GET" action="{{ route('company.show') }}" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">
                <!-- Filters -->
                <div class="p-0" >
                <div class="fl-left  mt-2 fl-left wd-50" >
                    <label for="artist" class=" text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="Name" id="Name" value="{{ request('Name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">Billing Company Name</label>
                    <input type="text" name="BillingCompanyName" id="BillingCompanyName" value="{{ request('BillingCompanyName') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="fl-left  mt-2 fl-left wd-50">
                    <label for="artist" class=" text-sm font-medium text-gray-700">Billing City</label>
                    <input type="text" name="BillingCity" id="BillingCity" value="{{ request('BillingCity') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="btn_filter">Filter</button>
            </div>
        </form>
        <br>
        <div class="container" style="width:100%;">

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-3">

<!-- Records Grid -->

<div class="p-0" style="width:100%;" >
    <div class="text-sm text-gray-900 fl-left wd-50 maxwd-50 text-center">ID</div>
    <div class="text-sm text-gray-900 fl-left wd-400 maxwd-400" >Name</div>
    <div class="text-sm text-gray-900 fl-left wd-400 maxwd-400" >BillingCompanyName</div>
    <div class="text-sm text-gray-900 fl-left wd-100 maxwd-100" >BillingCity</div>
    <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >Action</div>
</div>

@foreach($records as $record)
    <div class="p-0" style="width:100%;" >
        <div class="text-sm text-gray-900 fl-left wd-50 maxwd-50 text-center"  >{{ $record->ID }}       </div>
        <div class="text-sm text-gray-900 fl-left wd-400 maxwd-400" >{{ $record->Name }}                </div>
        <div class="text-sm text-gray-900 fl-left wd-400 maxwd-400" >{{ $record->BillingCompanyName }}  </div>
        <div class="text-sm text-gray-900 fl-left wd-100 maxwd-100" >{{ $record->BillingCity }}         </div>
        <div class="text-sm text-gray-900 fl-left wd-200 maxwd-200" >
        @include('common/editButton', ['id' =>  $record->ID])
        @include('common/delButton', ['id' => $record->ID])
        </div>
    </div>
@endforeach
</div>
</div>
        <!-- Pagination -->
        <div class="mt-8">
            {{ $records->links() }} <!-- Tailwind-styled pagination links -->
        </div>



</div>
</div>
</x-slot>
</x-app-layout>

@include('common/modalForEditRecord', [     'what' => 'Company',
                                      'updatePath' => 'company/update',
                                        'editPath' => 'company/edit'])




















