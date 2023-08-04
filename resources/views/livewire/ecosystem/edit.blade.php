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
            {{ __('Edit Ecosystem') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Enter the details of the ecosystem to update") }}
        </p>
    </header>

    <form action="{{url("ecosystem/$ecosystem->id")}}" method="POST">
        @method('PUT')
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
                                wire:model="island_id"
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

                {{-- Description--}}
                <div class="sm:col-span-6">
                    <label for="description" class="block text-sm font-medium text-gray-700"
                    >
                        Description
                    </label>
                    <div class="mt-1">
                         <textarea name="description"
                                   wire:model="description"
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

                {{-- Latitude--}}
                <div class="sm:col-span-3">
                    <label for="latitude" class="block text-sm font-medium text-gray-700"
                    >
                        Latitude
                    </label>
                    <div class="mt-1">
                        <input type="text" name="latitude"
                               wire:model="latitude"
                               id="latitude"
                               class="
                            @error('latitude') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('latitude')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Longitude--}}
                <div class="sm:col-span-3">
                    <label for="longitude" class="block text-sm font-medium text-gray-700"
                    >
                        Longitude
                    </label>
                    <div class="mt-1">
                        <input type="text" name="longitude"
                               wire:model="longitude"
                               id="longitude"
                               class="
                            @error('longitude') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('longitude')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Is Documented--}}
                <div class="sm:col-span-3">

                    <div class="mt-1">

                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="is_documented" name="is_documented" type="checkbox"
                                       @if($is_documented) checked @endif
                                       value="{{true}}"
                                       wire:model="is_documented"
                                       class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="is_documented" class="font-medium text-gray-900">Is Documented?</label>
                                <p class="text-gray-500">Is the ecosystem documented?</p>
                            </div>
                        </div>
                    </div>

                    @error('is_documented')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Potentially Threatened--}}
                <div class="sm:col-span-3">

                    <div class="mt-1">

                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="is_potentially_threatened" name="is_potentially_threatened" type="checkbox"
                                       @if($is_potentially_threatened) checked @endif
                                       value="{{true}}"
                                       wire:model="is_potentially_threatened"
                                       class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="is_potentially_threatened" class="font-medium text-gray-900">Potentially
                                    Threatened?</label>
                                <p class="text-gray-500">Is the ecosystem potentially threatened?</p>
                            </div>
                        </div>
                    </div>

                    @error('is_potentially_threatened')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{--  Threatened--}}
                <div class="sm:col-span-3">

                    <div class="mt-1">

                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="is_threatened" name="is_threatened" type="checkbox"
                                       @if($is_threatened) checked @endif

                                       value="{{true}}"
                                       wire:model="is_threatened"
                                       class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="is_threatened" class="font-medium text-gray-900">Threatened?</label>
                                <p class="text-gray-500">Is the ecosystem threatened?</p>
                            </div>
                        </div>
                    </div>

                    @error('is_threatened')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Destroyed--}}
                <div class="sm:col-span-3">

                    <div class="mt-1">

                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="is_destroyed" name="is_destroyed" type="checkbox"
                                       @if($is_destroyed) checked @endif
                                       value="{{true}}"
                                       wire:model="is_destroyed"
                                       class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="is_destroyed" class="font-medium text-gray-900">Destroyed?</label>
                                <p class="text-gray-500">Is the ecosystem destroyed?</p>
                            </div>
                        </div>
                    </div>

                    @error('is_destroyed')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


            </div>
        </div>

        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Update
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to update the ecosystem"/>
    </form>
</div>
