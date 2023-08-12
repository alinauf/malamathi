<div x-data="" class="">
    @push('styles')

    @endpush
    <div class=" pb-5 flex justify-between">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Ecosystems
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        {{--        @if(isset($latitude) && isset($longitude))--}}
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

            <div class="sm:col-span-2">
                <div>
                    <div id="map" style="height: 60rem"></div>
                </div>
            </div>

        </dl>
        {{--        @else--}}
        {{--            <p class="text-gray-500">No location available</p>--}}
        {{--        @endif--}}

    </div>

    @push('scripts')
        <script>
            const markers = @js($markers);
            const latitude = 4.1;
            const longitude = 73.5;
            const map = L.map('map').setView([latitude, longitude], 8);

            const potentiallyThreatenedColor = '#fbbf24';
            const threatenedColor = '#ef4444';
            const destroyedColor = '#a3a3a3';

            markers.map((marker) => {
                L.marker([marker.latitude, marker.longitude]).addTo(map)
                    .bindPopup(`<b>${marker.name}</b><br>${marker.status}
<br><a href="ecosystem/${marker.id}">View</a>
`);
            });


            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

        </script>
    @endpush
</div>
