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
            {{ __('Case Report Links') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Enter the details of the case link") }}
        </p>
    </header>

    <form action="{{url("case-report/$caseReport->id/link")}}" method="POST">
        @csrf

        <div class="">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <label for="link" class="block text-sm font-medium text-gray-700"
                    >
                        Link <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="link"
                               wire:model.live="link"
                               placeholder="Enter the URL of the case link"
                               id="link"
                               class="
                            @error('link') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('link')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Description--}}
                <div class="sm:col-span-6">
                    <label for="description" class="block text-sm font-medium text-gray-700"
                    >
                        Description
                    </label>
                    <div class="mt-1">
                         <textarea name="description"
                                   wire:model.live="description"
                                   id="description" cols="5" rows="3" class="
                            @error('description') border border-red-500 @enderror
                        shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                        border-gray-300 rounded-md">
                </textarea>

                    </div>

                    @error('description')
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
                                subtitle="Please confirm if you would like to create the link"/>
    </form>
</div>
