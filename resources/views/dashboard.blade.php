<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div>

                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>

                            <p class="truncate text-sm font-medium text-gray-500">Cases Count</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">{{$stats['cases_count']}}</p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{url('case-report')}}"
                                       class="font-medium text-blue-600 hover:text-blue-900">View all<span
                                                class="sr-only"> Case Count</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>

                            <p class="truncate text-sm font-medium text-gray-500">Ecosystems</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">{{$stats['ecosystems']}}</p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{url('ecosystem')}}"
                                       class="font-medium text-blue-600 hover:text-blue-900">View all<span
                                                class="sr-only"> Ecosystems Registered</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>

                            <p class="truncate text-sm font-medium text-gray-500">Islands</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">{{$stats['islands']}}</p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{url('island')}}"
                                       class="font-medium text-blue-600 hover:text-blue-900">View all<span
                                                class="sr-only"> Total Islands stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>



            <div>

                <dl class="mt-12 grid grid-cols-1 gap-0 sm:grid-cols-2 lg:grid-cols-3 shadow-md">
                    
                    <span class="text-2xl bg-blue-100 p-4 md:rounded-l-lg font-serif">
                        <a href="{{ route('case-report.index') }}" class="hover:text-gray-800">
                            Incoming <b>Cases</b>
                        </a>
                    </span>
                    <table class="bg-white table col-span-2 md:rounded-r-lg overflow-clip">
                        <thead class="text-left bg-gray-700 text-white">
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
