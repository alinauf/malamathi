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
            {{ __('Edit Atoll') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Enter the details of the atoll to update") }}
        </p>
    </header>

    <form action="{{url("atoll/$atoll->id")}}" method="POST">
        @method('PUT')
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

                {{-- Code--}}
                <div class="sm:col-span-3">
                    <label for="code" class="block text-sm font-medium text-gray-700"
                    >
                        Code <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="code"
                               wire:model.live="code"
                               id="code"
                               class="
                            @error('code') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('code')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Is City--}}
                <div class="sm:col-span-3">

                    <div class="mt-1">

                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="is_city" name="is_city" type="checkbox"
                                       @if($is_city) checked @endif
                                       value="{{true}}"
                                       wire:model.live="is_city"
                                       class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="is_city" class="font-medium text-gray-900">Is City?</label>
                                <p class="text-gray-500">Is the atoll a city?</p>
                            </div>
                        </div>
                    </div>

                    @error('is_city')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


            </div>
        </div>

        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg width="24" height="24" viewBox="0 0 24 24" class="pr-1" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#fff" d="m14.72 8.79l-4.29 4.3l-1.65-1.65a1 1 0 1 0-1.41 1.41l2.35 2.36a1 1 0 0 0 .71.29a1 1 0 0 0 .7-.29l5-5a1 1 0 0 0 0-1.42a1 1 0 0 0-1.41 0ZM12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8a8 8 0 0 1-8 8Z"/>
                    </svg>
                Update
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to update the atoll"/>
    </form>
</div>
