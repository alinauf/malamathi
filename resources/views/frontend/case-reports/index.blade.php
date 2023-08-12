<x-frontend-layout>
<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">

    <div class="flex flex-col md:flex-row py-5 m-5 text-left max-w gap-6">
        <div class="md:w-1/4 px-6 pb-6 bg-blue-50 rounded">
                <h1 class="text-2xl my-4 font-serif text-bold text-gray-900 text-left pb-0 pt-3">Case Reports</h1>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Here are the latest case reports submitted
                </p>
                <p class="text-lg">
                    {{-- Stats: --}}
                </p>
        </div>

        <div class="md:w-3/4 px-6 pb-6  rounded">
                    @foreach($cases as $case)
                        <a class="" href="{{url("/case-reports/$case->id")}}" >

                        <article class="mt-2 relative isolate flex flex-col gap-8 lg:flex-row">
                            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                                <img src="data:image/jpeg;base64,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"
                                     alt="" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                            </div>
                            <div>
                                <div class="flex items-center gap-x-4 text-xs">
                                    <time datetime="2020-03-16" class="text-gray-500">
                                        <span class="absolute inset-0"></span>
                                        {{ $case->created_at->format('d M, Y')}}
                                    </time>
                                    @if(isset($case->ecosystem))
                                        <a href="#"
                                           class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                            {{$case->ecosystem->name}}
                                        </a>
                                    @endif
                                </div>
                                <div class="group relative max-w-xl">
                                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                        <a href="#">
                                            <span class="absolute inset-0"></span>
                                            {{ $case->title}}
                                        </a>
                                    </h3>
                                    {{--                                    clip text--}}
                                    <p class="mt-5 text-sm leading-6 text-gray-600
                                    truncate-overflow-3-lines

                                    ">
                                        {{ $case->statement}}
                                    </p>
                                </div>
                                <div class="mt-6 flex border-t border-gray-900/5 pt-6">
                                    <div class="relative flex items-center gap-x-4">

                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    Reported by {{ $case->submitted_by ?? 'Anonymous'}}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        </a>

                    @endforeach
                <div class="mt-8">
                    {{$cases->links()}}
                </div>
            </div>
        </div>
    </div>



</x-frontend-layout>
