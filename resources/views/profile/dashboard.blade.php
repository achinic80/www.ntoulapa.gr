<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}    
        </h2>
    </x-slot>

    <div class="py-2">

    </div>

    <?php 
    $table_links =   
    [
    "AIProvider" => "aiprovider",
    "PromptCategory" => "promptcategory",
    "Prompt" => "prompt",
    
    
    "Subject" => "subject",
    "MediaSource" => "mediasource",

    "ArticlesPublished" => "articlespublished",
    "Company" => "company",
    "ContentContributor" => "contentcontributor",
    "ContributorCommercialModel" => "contributorcommercialmodel",

    "ContentPublisher" => "contentpublisher",
    "PublisherCommercialModel" => "publishercommercialmodel",


    "ArticlesPublished" => "ArticlesPublished",

    "ContentContributor" => "ContentContributor",
    "ContentPublisher" => "ContentPublisher",
    "ArticlesPublished" => "articlespublished",
    "Company" => "company",
    "ContentContributor" => "contentcontributor",
    "ContributorCommercialModel" => "contributorcommercialmodel",

    "ContentPublisher" => "contentpublisher",
    "PublisherCommercialModel" => "publishercommercialmodel",

    "Company" => "company",
    "MotherCompany" => "mothercompany",
    "User" => "User",
    "UserGroup" => "UserGroup"
    ];


    ?>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"  style="float:left;">

@foreach($table_links as $key => $value) 

        
            
                <div class="p-2 text-gray-900">
                    <a href="./{{ $value }}">
                        {{ $key }}
                    </a>
                </div>


        
           
        
   
@endforeach
</div>


<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="float:left;">
<div class="p-2 text-gray-900">
                    <a href="./articles">
                        Articles MarketPlace
                    </a>
                </div>

</div>

</div>
</x-app-layout>
