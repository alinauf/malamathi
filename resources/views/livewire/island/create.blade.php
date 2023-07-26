<div x-data="{
formValidationStatus:@entangle('formValidationStatus'),
}"

     class=""
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>


    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add new Island') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Enter the details of the island") }}
        </p>
    </header>

    <form action="{{url("island")}}" method="POST">
        @csrf

        <div class="">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


                <div class="sm:col-span-3">
                    <label for="atoll_id" class="block text-sm font-medium leading-6 text-gray-900">
                        Atolls</label>
                    <div class="mt-2">
                        <select id="atoll_id"
                                wire:model="atoll_id"
                                name="atoll_id"
                                class="block w-full rounded-md  @error('atoll_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Select Atolls</option>
                            @foreach($atolls as $atoll)
                                <option value="{{$atoll->id}}">{{$atoll->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('atoll_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                <div class="sm:col-span-3">
                    <label for="island_category_id" class="block text-sm font-medium leading-6 text-gray-900">Island
                        Category</label>
                    <div class="mt-2">
                        <select id="island_category_id"
                                wire:model="island_category_id"
                                name="island_category_id"
                                class="block w-full rounded-md  @error('island_category_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Select Island Category</option>
                            @foreach($island_categories as $island_category)
                                <option value="{{$island_category->id}}">{{$island_category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('island_category_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Name--}}
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700"
                    >
                        Name <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="name"
                               wire:model="name"
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
                               wire:model="code"
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

            </div>
        </div>

        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Save
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to create the island"/>
    </form>
</div>
