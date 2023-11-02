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


    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Case Report') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update the details of the case report") }}
        </p>
    </header>


    <form action="{{url("case-report/$caseReport->id")}}" method="POST">
        @method('PUT')
        @csrf

        <div class="">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


                <div class="sm:col-span-3">
                    <label for="atoll_id" class="block text-sm font-medium leading-6 text-gray-900">
                        Atoll</label>
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
                    <label for="island_id" class="block text-sm font-medium leading-6 text-gray-900">Island
                    </label>
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


                <div class="sm:col-span-3">
                    <label for="ecosystem_id" class="block text-sm font-medium leading-6 text-gray-900">Ecosystem
                    </label>
                    <div class="mt-2">
                        <select id="ecosystem_id"
                                wire:model.live="ecosystem_id"
                                name="ecosystem_id"
                                class="block w-full rounded-md  @error('ecosystem_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Select Ecosystem</option>
                            @foreach($ecosystems as $ecosystem)
                                <option value="{{$ecosystem->id}}">{{$ecosystem->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('ecosystem_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Title--}}
                <div class="sm:col-span-3">
                    <label for="title" class="block text-sm font-medium text-gray-700"
                    >
                        Title <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="title"
                               wire:model.live="title"
                               id="title"
                               class="
                            @error('title') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('title')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Statement--}}
                <div class="sm:col-span-6">
                    <label for="statement" class="block text-sm font-medium text-gray-700"
                    >
                        Statement <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                         <textarea name="statement"
                                   wire:model.live="statement"
                                   id="statement" cols="5" rows="3" class="
                            @error('statement') border border-red-500 @enderror
                        shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                        border-gray-300 rounded-md">
                </textarea>

                    </div>

                    @error('statement')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Submitted By--}}
                <div class="sm:col-span-3">
                    <label for="submitted_by" class="block text-sm font-medium text-gray-700"
                    >
                        Submitted By
                    </label>
                    <div class="mt-1">
                        <input type="text" name="submitted_by"
                               wire:model.live="submitted_by"
                               id="submitted_by"
                               class="
                            @error('submitted_by') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('submitted_by')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Phone--}}
                <div class="sm:col-span-3">
                    <label for="phone" class="block text-sm font-medium text-gray-700"
                    >
                        Phone
                    </label>
                    <div class="mt-1">
                        <input type="text" name="phone"
                               wire:model.live="phone"
                               id="phone"
                               class="
                            @error('phone') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Email--}}
                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700"
                    >
                        Email
                    </label>
                    <div class="mt-1">
                        <input type="email" name="email"
                               wire:model.live="email"
                               id="email"
                               class="
                            @error('email') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                </div>

                <div class="sm:col-span-3">
                    <label for="cover-photo"
                           class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                        Location

                        <p class="my-4 text-xs font-mono text-gray-400">
                             LAT: {{ $latitude }}<br> LON: {{ $longitude }}</p>
                        {{-- <input type="text" name="latitude" wire:model="latitude">
                        <input type="text" name="longitude" wire:model="longitude"> --}}
                        </label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <div id="map" style="height: 15rem" class="rounded-lg" wire:ignore></div>
                    </div>
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
                                subtitle="Please confirm if you would like to update the case report"/>
    </form>


    @push('scripts')
    <script>
        latitude = {{ $latitude }};
        longitude = {{ $longitude }};
        const map = L.map('map').setView([latitude, longitude], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        let marker = new L.Marker([latitude, longitude]).addTo(map);

        map.on('click', function(e) {
            if(marker) {
                map.removeLayer(marker);
            }
            marker = new L.Marker(e.latlng).addTo(map);
            @this.set('latitude', e.latlng.lat);
            @this.set('longitude', e.latlng.lng);
        });

    </script>
    @endpush

    <style>
        .leaflet-control-attribution{
        display:none!important;
        }
    </style>
</div>

