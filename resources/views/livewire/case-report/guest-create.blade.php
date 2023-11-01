<div x-data="{
formValidationStatus:@entangle('formValidationStatus').live,
form1:@entangle('form1').live,
form2:@entangle('form2').live,
form3:@entangle('form3').live,
latitude:@entangle('latitude').live,
longitude:@entangle('longitude').live,
}"
     class=""
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>

    @include('livewire.case-report.guest-form._form_header')
    
    <div class="mx-auto max-w-7xl px-4 my-6 sm:px-6 lg:px-8">
        <form action="{{url("case-report/submission")}}" method="POST">
        @csrf

          <div id="part1" class="form-part {{ $form1 ? 'block' : 'hidden' }}">

            @include('livewire.case-report.guest-form.form')
          </div>

          <div id="part2" class="form-part {{ $form2 ? 'block' : 'hidden' }}">

            @include('livewire.case-report.guest-form.details')
          </div>

          <div id="part3" class="form-part {{ $form3 ? 'block' : 'hidden' }}">
            @include('livewire.case-report.guest-form.confirm')
          </div>


            <x-confirm-create-modal title="Are you sure"
                                    subtitle="Please confirm if you would like to create the case report"/>
    </form>
    </div>

    <style>
        .form-selected > span > span > span {
            color: rgb(0, 76, 148);
        }
        .form-selected  > span > span > span > .step-count{
            color: rgb(0, 76, 148)        
        }
        .step-count {
            border-color: rgba(0, 76, 148, 0.7);
            font-weight: 600;
            font-size: 1.3em;
        }
    </style>


</div>

