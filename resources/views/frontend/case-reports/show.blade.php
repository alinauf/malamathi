<x-frontend-layout>
<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 min-h-screen">

    <div class="flex flex-col md:flex-row py-5 my-5 text-left max-w gap-6">
        <div class="md:w-1/4 px-6 pb-6 bg-blue-50 rounded min-h-[80vh]">
                <h1 class="text-xl my-4 font-serif text-gray-dark text-left pb-0 pt-3">
                    <small>Title:</small><br>
                    <b>{{  $caseReport->title  }}</b>
                    <br>
                 </h1>
                <p class="text-lg min-h-max">
                    <br>
                    Ecosystem: <b>{{  isset($caseReport->ecosystem) ? $caseReport->ecosystem->name : '-'  }}</b>
                    <br>
                    Island: <b>{{  isset($caseReport->island) ? $caseReport->island->name : '-'  }}</b>
                    <br>
                    Atoll: <b>{{  isset($caseReport->atoll) ? $caseReport->atoll->name : '-'  }}</b>
                </p>
        </div>
        <div class="md:w-3/4 px-6 pb-6 rounded">

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

            <ul wire:ignore role="list" class="divide-y divide-gray-100 b_gallery flex">
                @if($caseReport->getMedia('case-report-images') != null && count($caseReport->getMedia('case-report-images')))
                    @foreach($caseReport->getMedia('case-report-images') as $caseReportMedia)
                        <a href="{{ url($caseReportMedia->getUrl()) }}" class="flex m-2">
                            <img class="aspect-video rounded-xl bg-gray-50 object-cover hover:scale-110 transition-all duration-300"
                                    src="{{ url($caseReportMedia->getUrl()) }}"
                                    alt=""
                                    style="width:200px; height:200px; object-fit: cover; object-position: center; "
                                    />                            
                        </a>
                    @endforeach
                @endif
            </ul>




            @php
            $latitude = $caseReport->latitude;
            $longitude = $caseReport->longitude;
            @endphp
            @include('components.show-single-location')

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
