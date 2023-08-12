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
        
        <div class="md:w-3/4 px-6 pb-6 bg-gray-50 rounded">
                    @foreach($cases as $case)
                        <a href="{{url("/case-reports/$case->id")}}" >

                        <article class="relative isolate flex flex-col gap-8 lg:flex-row">
                            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                                <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
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
