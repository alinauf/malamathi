<div x-data="{
formValidationStatus:@entangle('formValidationStatus').live,
}"

     class=""
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>


    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add new Island Category') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Enter the details of the island category") }}
        </p>
    </header>

    <form action="{{url("island-category")}}" method="POST">
        @csrf

        <div class="">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                {{-- Name--}}
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700"
                    >
                        Name <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="name"
                               wire:model.live="name"
                               id="name"
                               class="
                            @error('name') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg width="24" height="24" viewBox="0 0 24 24" class="inline pr-1" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#fff" d="m9 20.42l-6.21-6.21l2.83-2.83L9 14.77l9.88-9.89l2.83 2.83L9 20.42Z"/>
                    </svg>
                Save
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to create the island category"/>
    </form>
</div>
