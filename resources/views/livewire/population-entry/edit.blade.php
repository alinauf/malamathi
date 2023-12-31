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
            {{ __('Edit Population Entry') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update the details of the population entry") }}
        </p>
    </header>


    <form action="{{url("population-entry/$populationEntry->id")}}" method="POST">
        @method('PUT')
        @csrf

        <div class="">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


                <div class="sm:col-span-3">
                    <label for="atoll_id" class="block text-sm font-medium leading-6 text-gray-900">
                        Atolls</label>
                    <div class="mt-2">
                        <select id="atoll_id"
                                wire:model.live="atoll_id"
                                name="atoll_id"
                                class="block w-full rounded-md  @error('atoll_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Select Atoll</option>
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
                    <label for="island_id" class="block text-sm font-medium leading-6 text-gray-900">
                        Islands</label>
                    <div class="mt-2">
                        <select id="island_id"
                                wire:model.live="island_id"
                                name="island_id"
                                class="block w-full rounded-md  @error('island_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Select Island</option>
                            @foreach($islands as $island)
                                <option value="{{$island->id}}">{{$island->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('island_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Men--}}
                <div class="sm:col-span-3">
                    <label for="men_count" class="block text-sm font-medium text-gray-700"
                    >
                        Men Count <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="number" name="men_count"
                               wire:model.live="men_count"
                               id="men_count"
                               class="
                            @error('men_count') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('men_count')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Woman--}}
                <div class="sm:col-span-3">
                    <label for="women_count" class="block text-sm font-medium text-gray-700"
                    >
                        Woman Count <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="number" name="women_count"
                               wire:model.live="women_count"
                               id="women_count"
                               class="
                            @error('women_count') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('women_count')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Local Count--}}
                <div class="sm:col-span-3">
                    <label for="local_count" class="block text-sm font-medium text-gray-700"
                    >
                        Local Count <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="number" name="local_count"
                               wire:model.live="local_count"
                               id="local_count"
                               class="
                            @error('local_count') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('local_count')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Expat Count--}}
                <div class="sm:col-span-3">
                    <label for="expat_count" class="block text-sm font-medium text-gray-700"
                    >
                        Expat Count <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="number" name="expat_count"
                               wire:model.live="expat_count"
                               id="expat_count"
                               class="
                            @error('expat_count') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('expat_count')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="logged_date" class="block text-sm font-medium text-gray-700"
                    >
                        Logged Date
                    </label>
                    <div class="mt-1">
                        <input type="date" name="logged_date"
                               wire:model.live="logged_date"
                               id="logged_date"
                               class="
                            @error('logged_date') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('logged_date')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="description" class="block text-sm font-medium text-gray-700"
                    >
                        Description
                    </label>
                    <div class="mt-1">
                        <input type="text" name="description"
                               wire:model.live="description"
                               id="description"
                               class="
                            @error('description') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
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
                    <svg width="24" height="24" viewBox="0 0 24 24" class="pr-1" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#fff" d="m14.72 8.79l-4.29 4.3l-1.65-1.65a1 1 0 1 0-1.41 1.41l2.35 2.36a1 1 0 0 0 .71.29a1 1 0 0 0 .7-.29l5-5a1 1 0 0 0 0-1.42a1 1 0 0 0-1.41 0ZM12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8a8 8 0 0 1-8 8Z"/>
                    </svg>
                Update
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to update the population entry"/>

    </form>
</div>
