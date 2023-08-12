<x-frontend-layout>
<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">

    <div class="flex flex-col md:flex-row py-5 m-5 text-left max-w gap-6">
        <div class="md:w-1/4 px-6 pb-6 bg-blue-50 rounded">
                <h1 class="text-xl my-4 font-serif text-gray-dark text-left pb-0 pt-3">
                    <small>Title:</small><br>
                    <b>{{  $caseReport->title  }}</b>
                    <br>
                 </h1>
                <p class="text-lg">
                    <br>
                    Ecosystem: <b>{{  isset($caseReport->ecosystem) ? $caseReport->ecosystem->name : '-'  }}</b>
                    <br>
                    Island: <b>{{  isset($caseReport->island) ? $caseReport->island->name : '-'  }}</b>
                    <br>
                    Atoll: <b>{{  isset($caseReport->atoll) ? $caseReport->atoll->name : '-'  }}</b>
                </p>
        </div>
        <div class="md:w-3/4 px-6 pb-6 bg-gray-50 rounded">

            @php
                $latitude = $caseReport->latitude;
                $longitude = $caseReport->longitude;
            @endphp


            <p class="text-base font-semibold leading-7 text-green-600">{{$caseReport->island->code .'. '. $caseReport->island->name}}</p>
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
                     src="https://plus.unsplash.com/premium_photo-1666497934040-ec832d302f13?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1940&q=80"
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

    @if($caseReport->caseReportLinks->count() > 0)
    <div class="my-14">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-xl">Case Links</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Below are some news articles related to the case</p>
            </div>
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-6
            sm:mt-10 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                @foreach($caseReport->caseReportLinks as $caseReportLink)
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="2020-03-16" class="text-gray-500">
                                {{$caseReportLink->created_at->format('d M, Y')}}
                            </time>

                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
{{--                                    Boost your conversion rate--}}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                {{$caseReportLink->description}}
                            </p>
                        </div>

                    </article>

                @endforeach
                <!-- More posts... -->
            </div>
        </div>
    </div>
    @endif

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
