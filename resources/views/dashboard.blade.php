<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div>

                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>

                            <p class="truncate text-sm font-normal text-gray-700">Cases Count</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-4xl font-bold text-gray-900">{{$stats['cases_count']}}</p>
                            <a href="{{url('case-report')}}">
                            <div class="absolute inset-x-0 bottom-0 bg-blue-100 px-4 py-4 sm:px-6 hover:bg-blue-700 active:bg-blue-600 hover:text-white transition text-right">
                                <div class="pr-1">
                                    Browse Cases
                                    <span class="sr-only"> Case Count</span>
                                </div>
                            </div>
                            </a>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                        <p class="truncate text-sm font-normal text-gray-700">Ecosystems</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-4xl font-bold text-gray-900">{{$stats['ecosystems']}}</p>
                            <a href="{{url('ecosystem')}}">
                                <div class="absolute inset-x-0 bottom-0 bg-blue-100 px-4 py-4 sm:px-6 hover:bg-blue-700 active:bg-blue-600 hover:text-white transition text-right">
                                <div class="pr-1">
                                    Browse Ecosystems
                                    <span class="sr-only"> Ecosystems Count</span>
                                </div>
                            </div>
                            </a>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                        <p class="truncate text-sm font-normal text-gray-700">Islands</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-4xl font-bold text-gray-900">
                                {{$stats['islands']}}
                                <a href="{{ url('atoll') }}">  
                                <small class="text-sm text-gray-500">from {{$stats['islands']}} atolls</small>
                                </a>
                            </p>
                            <a href="{{url('island')}}">
                            <div class="absolute inset-x-0 bottom-0 bg-blue-100 px-4 py-4 sm:px-6 hover:bg-blue-700 active:bg-blue-600 hover:text-white transition text-right">
                                <div class="pr-1">
                                    Browse Islands
                                    <span class="sr-only"> Islands Count</span>
                                </div>
                            </div>
                            </a>
                        </dd>
                    </div>

                </dl>
            </div>



            <div>

                <dl class="mt-12 grid grid-cols-1 gap-0 sm:grid-cols-2 lg:grid-cols-3 shadow-md">
                    
                    <span class="text-2xl bg-blue-700 text-white p-4 md:rounded-l-lg font-serif">
                        <a href="{{ route('case-report.index') }}" class="hover:text-gray-100 ">
                            Incoming <b>Cases</b>
                        </a>
                    </span>
                    <table class="bg-white table col-span-2 md:rounded-r-lg overflow-clip">
                        <thead class="text-left bg-blue-800 text-white">
                          <tr>
                            <th class="p-4">Submitted</th>
                            <th class="p-4">Title</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($recent_cases as $case)
                          <tr class="">
                            <td class="border-b border-gray-100 p-4 font-light">{{ \Carbon\Carbon::parse($case->created_at)->format('d-m-Y') }}</td>
                            <td class="border-b border-gray-100 p-4 font-normal">{{ $case->title }}</td>
                            <td class="border-b border-gray-100 p-4 font-light">{{ $case->is_verified ? 'Verified' : 'Not Verified' }}</td>
                            <td class="border-b border-gray-100 p-4 font-light">
                                <a href="{{ route('case-report.show', $case->id) }}" class="btn btn-sm btn-primary text-blue-700 hover:text-blue-500">View</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    
                </dl>
            </div>


        </div>
    </div>
</x-admin-layout>
