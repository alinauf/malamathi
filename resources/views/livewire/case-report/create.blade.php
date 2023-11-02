<div x-data="{
    formValidationStatus:@entangle('formValidationStatus').live,
    latitude:@entangle('latitude').live,
    longitude:@entangle('longitude').live,
    }"
         class=""
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
    >
    
        
        <div class="mx-auto max-w-7xl px-4 my-6 sm:px-6 lg:px-8">
        <form action="{{route("case-report.store")}}" method="POST">
            @csrf
    
                @include('livewire.case-report.backend_form')        
    
                <x-confirm-create-modal title="Are you sure"
                                        subtitle="Please confirm if you would like to create the case report"/>
        </form>
        </div>
    
    
    </div>
    
    