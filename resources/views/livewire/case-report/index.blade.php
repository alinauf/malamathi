<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Case Reports</h1>
                <p class="mt-2 text-sm text-gray-700">List of all case reports</p>
                <div class="mt-1 flex-1">
                    {{--Datatable Search Box--}}
                    <x-search-datatable placeholder="Search"></x-search-datatable>
                </div>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="{{url("case-report/create")}}"
                   class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Create</a>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>

                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Title
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Atoll
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Island
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Submitted On
                                </th>
                                

                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Manage</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($caseReports as $caseReport)

                                <tr>
                                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-ellipsis overflow-hidden">
                                        {{$caseReport->title}}
                                    </td>
                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        <a href="{{url("atoll/".$caseReport["atoll_id"])}}">
                                            {{$caseReport->atoll->name}}
                                        </a>
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        <a href="{{url("island/".$caseReport["island_id"])}}">
                                            {{$caseReport->island->name}}
                                        </a>
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        <a href="{{url("island/".$caseReport["island_id"])}}">
                                            {{$caseReport->created_at->format("d M Y, h:i A")}}
                                        </a>
                                    </td>

                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{url("case-report/".$caseReport["id"])}}"
                                           class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8">
                        {{$caseReports->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-flash-message></x-flash-message>

</div>
