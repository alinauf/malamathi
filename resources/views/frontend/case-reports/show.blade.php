<x-frontend-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 min-h-screen">

        <div class="flex flex-col md:flex-row py-5 my-5 text-left max-w gap-6">
            <div class="md:w-1/4 px-6 pb-6 bg-blue-50 rounded min-h-auto md:min-h-[80vh]">
                <h1 class="text-2xl my-8 tracking-tight font-bold font-serif text-gray-dark text-left text-blue-800">
                    {{ $caseReport->title }}
                </h1>

                <p class="text-md mt-12 min-h-max">

                    @isset($caseReport->ecosystem)
                        <small class="block mt-2">Ecosystem:</small>
                        <b>{{  isset($caseReport->ecosystem) ? $caseReport->ecosystem->name : '-'  }}</b>
                    @endisset

                    <br>
                    <small class="block mt-2">Island:</small>
                    {{  isset($caseReport->island) ? $caseReport->island->name : '-'  }}
                    <br>
                    <small class="block mt-2">Atoll:</small>
                    {{  isset($caseReport->atoll) ? $caseReport->atoll->name : '-'  }}
                </p>


                <small class="block mt-10">Location:</small>
                @php
                    $latitude = $caseReport->latitude;
                    $longitude = $caseReport->longitude;
                @endphp
                @if(!is_null($latitude) && !is_null($longitude))

                    <div class="mt-6">
                        <div id="map" class="min-h-[40vh] md:min-h-[65vh] rounded"></div>
                    </div>

                    <style>
                        .leaflet-control-attribution {
                            display: none !important;
                        }
                    </style>
                    @push('scripts')
                        <script>
                            const latitude = {{ $latitude }};
                            const longitude = {{ $longitude }};
                            const map = L.map('map').setView([latitude, longitude], 14);

                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '© OpenStreetMap'
                            }).addTo(map);
                            const marker = L.marker([latitude, longitude]).addTo(map);
                        </script>
                    @endpush
                @else
                    Unmarkedxsxs
                @endif

            </div>
            <div class="md:w-3/4 px-6 pb-6 rounded">

                @php
                    $latitude = $caseReport->latitude;
                    $longitude = $caseReport->longitude;
                @endphp

                <p class="p-1 text-base font-semibold leading-7 text-green-600">{{$caseReport->island->code .'. '. $caseReport->island->name}}</p>
                <h1 class="p-1 mt-1 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl font-serif">{{
            $caseReport->title
            }}</h1>

                <div class="flex items-center text-sm mt-6 ">
                    <a href="#"
                       class="relative px-3 py-1.5 font-medium text-gray-800 bg-gray-100 rounded">
                        Submitted by: <b>{{$caseReport->submitted_by ?? 'Anonymous'}}</b>
                        <time datetime="{{ $caseReport->created_at }}" class="text-gray-800 pl-8">
                            <span class="absolute inset-0"></span>
                            Date: <b>{{ $caseReport->created_at->format('d M, Y')}}</b>
                        </time>
                    </a>
                </div>

                <ul wire:ignore role="list" class="divide-y divide-gray-100 b_gallery flex mt-8">
                    @if($caseReport->getMedia('case-report-images') != null && count($caseReport->getMedia('case-report-images')))
                        @foreach($caseReport->getMedia('case-report-images') as $caseReportMedia)
                            <a href="{{ url($caseReportMedia->getUrl()) }}" class="flex m-2">

                                @if($caseReportMedia->mime_type != 'video/mp4')
                                    <img class="aspect-video rounded bg-gray-50 object-cover rounded-full hover:scale-110 transition-all duration-300"
                                         src="{{ url($caseReportMedia->getUrl()) }}"
                                         alt=""
                                         style="width:200px; height:200px; object-fit: cover; object-position: center; "
                                    />
                                @endif
                            </a>
                        @endforeach
                    @endif
                </ul>

                <ul wire:ignore role="list" class="divide-y divide-gray-100 grid grid-cols-1 gap-4 mt-8">
                    @if($caseReport->getMedia('case-report-images') != null && count($caseReport->getMedia('case-report-images')))

                        @foreach($caseReport->getMedia('case-report-images') as $caseReportMedia)
                            @if($caseReportMedia->mime_type == 'video/mp4')
                                <video class="aspect-video w-full bg-gray-50 object-cover"
                                       src="{{ url($caseReportMedia->getUrl()) }}"
                                       alt=""
                                       controls
                                       style=" object-fit: cover; object-position: center; "
                                ></video>

                            @endif
                        @endforeach
                    @endif
                </ul>

                <p class="mt-6 text-lg px-2 leading-8">
                    {{ $caseReport->statement}}
                </p>


            </div>
        </div>

        @if($caseReport->caseReportLinks->count() > 0)
            <div class="my-14">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-xl">Case Links</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Below are some news articles related to the
                            case</p>
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
                                        </a>
                                    </h3>
                                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                        {{$caseReportLink->description}}
                                    </p>
                                </div>

                            </article>

                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>

</x-frontend-layout>
