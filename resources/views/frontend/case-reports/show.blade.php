<x-frontend-layout>
    <div class="bg-white px-6 py-32 lg:px-8">


        <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">

            @php
                $latitude = $caseReport->latitude;
                $longitude = $caseReport->longitude;
            @endphp


            <p class="text-base font-semibold leading-7 text-blue-600">{{$caseReport->island->code .'. '. $caseReport->island->name}}</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{
            $caseReport->title
            }}</h1>
            <p class="mt-6 text-xl leading-8">
                {{ $caseReport->statement}}
            </p>
            <div class="mt-10 max-w-2xl">
                <p>Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed
                    amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius
                    sit neque erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim.
                    Mattis mauris semper sed amet vitae sed turpis id.</p>
            </div>
            <figure class="mt-16">
                <img class="aspect-video rounded-xl bg-gray-50 object-cover"
                     src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&w=1310&h=873&q=80&facepad=3"
                     alt="">
                <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                    <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                              clip-rule="evenodd"/>
                    </svg>
                    Faucibus commodo massa rhoncus, volutpat.
                </figcaption>
            </figure>

            <div class="mt-16">
                <div id="map" class="h-80"></div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
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

</x-frontend-layout>
