<div class="space-y-6 sm:space-y-16">
    <div>
        <h2 class="text-base font-semibold leading-7 text-gray-900">Case Details</h2>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
            Enter the details of the case report
        </p>

        <div class="mt-5 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="atoll_id" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                    Location</label>
                <div class="mt-2 sm:col-span-1 sm:mt-0">
                    <select id="atoll_id"
                            wire:model.live="atoll_id"
                            name="atoll_id"
                            class="block w-full rounded-md  @error('atoll_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Select Atoll</option>
                        @foreach($atolls as $atoll)
                            <option value="{{$atoll->id}}">{{$atoll->code}} - {{$atoll->name}}</option>
                        @endforeach
                    </select>

                    @error('atoll_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="mt-2 sm:col-span-1 sm:mt-0">
                    <select id="island_id"
                            wire:model.live="island_id"
                            name="island_id"
                            class="block w-full rounded-md  @error('island_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Select Island</option>
                        @foreach($islands as $island)
                            <option value="{{$island->id}}">{{$island->name}}</option>
                        @endforeach
                    </select>

                    @error('island_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="ecosystem_id" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Ecosystem
                </label>
                <div class="mt-2 sm:col-span-2 sm:mt-0">
                    <select id="ecosystem_id"
                            wire:model.live="ecosystem_id"
                            name="ecosystem_id"
                            class="block w-full rounded-md  @error('ecosystem_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Select Ecosystem</option>
                        @foreach($ecosystems as $ecosystem)
                            <option value="{{$ecosystem->id}}">{{$ecosystem->name}}</option>
                        @endforeach
                    </select>

                    @error('ecosystem_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
            </div>


            {{-- Title--}}
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="title" class="block text-sm font-medium text-gray-700"
                >
                    Title <span class="text-red-900">*</span>
                    <p class="mt-3 text-sm leading-6 text-gray-600">
                        Something descriptive and short.
                    </p>
                </label>
                <div class="mt-2 sm:col-span-2 sm:mt-0">
                    <input type="text" name="title"
                           wire:model.live="title"
                           id="title"
                           class="
                    @error('title') border border-red-500 @enderror
                            shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                            border-gray-300 rounded-md">

                    @error('title')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

            </div>


            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="statement"
                       class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Summary
                    <p class="mt-3 text-sm leading-6 text-gray-600">
                        A brief summary of your case.
                    </p>
                </label>
                <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <textarea name="statement"
                                  wire:model.live="statement"
                                  id="statement" rows="3"
                                  class="
                                    @error('statement') border border-red-500 @enderror
                                    block w-full max-w-2xl rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"></textarea>

                    @error('statement')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
            </div>


            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="cover-photo"
                       class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                    Location

                    <p class="my-4 text-xs font-mono text-gray-400">
                        LAT: {{ $latitude }}<br> LON: {{ $longitude }}</p>
                    <input type="hidden" name="latitude" wire:model="latitude">
                    <input type="hidden" name="longitude" wire:model="longitude">
                </label>
                <div class="mt-2 sm:col-span-2 sm:mt-0">
                    <div id="map" style="height: 20rem" class="rounded-lg" wire:ignore></div>
                </div>
            </div>

            @if(env('HCAPTCHA_ENABLED')==true)
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="cover-photo"
                           class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                        Security
                    </label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <div wire:ignore id="captcha" class="h-captcha"></div>
                    </div>
                </div>
            @endif


        </div>
    </div>


</div>


<div class="space-y-12 sm:space-y-16">

    <div>

        <h2 class="text-base font-semibold leading-7 text-gray-900">Documentation</h2>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
            Please provide any photos or videos related to this case.
        </p>

        <div class="mt-5 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="cover-photo"
                       class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                    Photos or Video
                </label>
                <div class="mt-2 sm:col-span-2 sm:mt-0">
                    <livewire:media-library wire:model="uploads" rules="mimes:jpeg,png,jpg,mp4" multiple />
                </div>
            </div>

        </div>


        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
            You can skip this section if you'd like to be anonymous.
        </p>

        <div class="mt-5 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="submitted_by" class="block text-sm font-medium text-gray-700"
                >
                    Submitted By
                </label>
                <div class="mt-2 sm:col-span-2 sm:mt-0">
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

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <dt class="text-sm font-medium leading-6 text-gray-900">
                    <a href="#"
                       wire:click="showForm(1)"
                       class="mt-8 text-md font-semibold leading-6 text-gray-900 step-link">
                        Back
                    </a>
                </dt>
                <dd class="mt-2 sm:col-span-2 sm:mt-0">
                    <div class="flex justify-end">
                        <button class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                            step-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                 class="inline pr-1">
                                <path fill="currentColor"
                                      d="M3 5.75A2.75 2.75 0 0 1 5.75 3h12.5A2.75 2.75 0 0 1 21 5.75v6.272a6.463 6.463 0 0 0-2-.848V5.75a.75.75 0 0 0-.75-.75H5.75a.75.75 0 0 0-.75.75v12.5c0 .414.336.75.75.75h5.424c.17.72.46 1.395.848 2H5.75A2.75 2.75 0 0 1 3 18.25V5.75ZM23 17.5a5.5 5.5 0 1 0-11 0a5.5 5.5 0 0 0 11 0Zm-5 .5l.001 2.503a.5.5 0 1 1-1 0V18h-2.505a.5.5 0 0 1 0-1H17v-2.5a.5.5 0 1 1 1 0V17h2.497a.5.5 0 0 1 0 1H18Z"/>
                            </svg>
                            Create New Case
                        </button>
                    </div>
                </dd>
            </div>


        </div>
    </div>


</div>



@push('scripts')
    <script>
        latitude = {{ $latitude }};
        longitude = {{ $longitude }};
        const map = L.map('map').setView([latitude, longitude], 7);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        let marker = new L.Marker([latitude, longitude]).addTo(map);

        map.on('click', function (e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = new L.Marker(e.latlng).addTo(map);
            @this.
            set('latitude', e.latlng.lat);
            @this.
            set('longitude', e.latlng.lng);
        });

    </script>
@endpush

<style>
    .leaflet-control-attribution {
        display: none !important;
    }
</style>
