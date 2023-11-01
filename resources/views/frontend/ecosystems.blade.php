<x-frontend-layout>





    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto max-w-2xl lg:max-w-none">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">                     Echoes of Ecosystems: Unveiling the Fate of Maldives' Natural Treasures
                    </h2>
                    <p class="mt-4 text-lg leading-8 text-gray-600">
                        Exploring Data, Maps, and Case Studies of Threatened, Potentially Threatened, and Destroyed Ecosystems


                    </p>
                </div>
                <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-3">
                    <div class="flex flex-col bg-gray-400/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-gray-600">Ecosystems</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">
                            {{$stats['all_ecosystems']}}
                        </dd>
                    </div>
                    <div class="flex flex-col bg-gray-400/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-gray-600">Documented</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">
                            {{$stats['documented_count']}}

                        </dd>
                    </div>
                    <div class="flex flex-col bg-gray-400/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-gray-600">Undocumented</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">
                            {{$stats['undocumented_count']}}
                        </dd>
                    </div>

                </dl>
            </div>





            <div class="mx-auto mt-16 flex max-w-2xl justify-center flex-col gap-8 lg:mx-0 lg:mt-20 lg:max-w-none lg:flex-row lg:items-end">

                <div class="flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-amber-50 p-8 sm:w-3/4 sm:max-w-md sm:flex-row-reverse sm:items-end lg:w-72 lg:max-w-none lg:flex-none lg:flex-col lg:items-start">
                    <p class="flex-none text-3xl font-bold tracking-tight text-gray-900">{{$stats['potentially_threatened_count']}}</p>
                    <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
                        <p class="text-lg font-semibold tracking-tight text-gray-900">Potentially Threatened</p>
                        <p class="mt-2 text-base leading-7 text-gray-600">
                            Vigilance needed to protect vulnerable ecosystems from potential jeopardy ahead. Let's keep
                            an eye on these.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-red-700 p-8 sm:w-3/4 sm:max-w-md sm:flex-row-reverse sm:items-end lg:w-72 lg:max-w-none lg:flex-none lg:flex-col lg:items-start">
                    <p class="flex-none text-3xl font-bold tracking-tight text-white">{{$stats['threatened_count']}}</p>
                    <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
                        <p class="text-lg font-semibold tracking-tight text-white"> Threatened</p>
                        <p class="mt-2 text-base leading-7 text-white">
                            Urgent action required as threats loom, imperiling a delicate ecosystem's equilibrium.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-gray-900 p-8 sm:w-3/4 sm:max-w-md sm:flex-row-reverse sm:items-end lg:w-72 lg:max-w-none lg:flex-none lg:flex-col lg:items-start">
                    <p class="flex-none text-3xl font-bold tracking-tight text-white">{{$stats['destroyed_count']}}</p>
                    <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
                        <p class="text-lg font-semibold tracking-tight text-white"> Destroyed</p>
                        <p class="mt-2 text-base leading-7 text-white">

                            Once-vibrant ecosystems vanished, underscoring the irreversible cost of neglect and
                            destruction.

                        </p>
                    </div>
                </div>


            </div>


            <div class="mt-16">

                <div class="p-4 sm:p-8 bg-white">
                    <div id="map" style="height: 60rem"></div>
                </div>

            </div>


        </div>
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

    <style>
        .leaflet-control-attribution{
          display:none!important;
        }
    </style>

</x-frontend-layout>
