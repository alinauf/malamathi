<div x-data="" class="">
    @push('styles')

    @endpush
    <div class=" pb-5 flex justify-between">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Location
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        @if(isset($latitude) && isset($longitude))
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <div>
                        <div id="map" class="h-80"></div>
                    </div>
                </div>

            </dl>
        @else
            <p class="text-gray-500">No location available</p>
        @endif

    </div>

    @if(isset($latitude) && isset($longitude))

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

    @endif
</div>
