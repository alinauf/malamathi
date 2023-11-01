<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Plot</h1>
                <p class="mt-2 text-sm text-gray-700">List of all plots</p>
                <div class="mt-1 flex-1">
                    {{--Datatable Search Box--}}
                    <x-search-datatable placeholder="Search"></x-search-datatable>
                </div>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="{{url("plot/create")}}"
                   class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                   <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="inline pr-1">
                    <path fill="currentColor" d="M3 5.75A2.75 2.75 0 0 1 5.75 3h12.5A2.75 2.75 0 0 1 21 5.75v6.272a6.463 6.463 0 0 0-2-.848V5.75a.75.75 0 0 0-.75-.75H5.75a.75.75 0 0 0-.75.75v12.5c0 .414.336.75.75.75h5.424c.17.72.46 1.395.848 2H5.75A2.75 2.75 0 0 1 3 18.25V5.75ZM23 17.5a5.5 5.5 0 1 0-11 0a5.5 5.5 0 0 0 11 0Zm-5 .5l.001 2.503a.5.5 0 1 1-1 0V18h-2.505a.5.5 0 0 1 0-1H17v-2.5a.5.5 0 1 1 1 0V17h2.497a.5.5 0 0 1 0 1H18Z"/>
                   </svg>
                Create
                </a>
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
                                    Name
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Zone
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Description
                                </th>

                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Manage</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($plots as $plot)

                                <tr>
                                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-ellipsis overflow-hidden">
                                        {{$plot->name}}
                                    </td>
                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        <a href="{{url("zone/".$plot["zone_id"])}}">
                                            {{$plot->zone->name}}
                                        </a>
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        {{$plot->description ?? "N/A"}}
                                    </td>

                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{url("plot/".$plot["id"])}}"
                                           class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8">
                        {{$plots->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-flash-message></x-flash-message>

</div>
