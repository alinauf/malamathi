<div x-data="" class="">
    
    @push('styles')

    @endpush
    
    <div class="py-4 flex justify-between">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Location
        </h3>
    </div>

    <div class="border-t border-gray-200 py-5 sm:px-6">

        @if(!is_null($latitude) && !is_null($longitude))
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <div id="map" style="height: 20rem; border-radius: 10px;"></div>
                </div>

            </dl>
        @else
            <p class="text-gray-500">No location available</p>
        @endif

    </div>

    @if(!is_null($latitude) && !is_null($longitude))

        @push('scripts')
            <script >
                const latitude = @json($latitude);
                const longitude = @json($longitude);
                const map = L.map('map').setView([latitude, longitude], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);
                const marker = L.marker([latitude, longitude]).addTo(map);
            </script>
        @endpush

        <style>
            .leaflet-control-attribution{
              display:none!important;
            }
        </style>

    @endif
</div>
