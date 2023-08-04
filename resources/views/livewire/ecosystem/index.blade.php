<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Ecosystem</h1>
                <p class="mt-2 text-sm text-gray-700">List of all ecosystems</p>
                <div class="mt-1 flex-1">
                    {{--Datatable Search Box--}}
                    <x-search-datatable placeholder="Search"></x-search-datatable>
                </div>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="{{url("ecosystem/create")}}"
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
                                    Name
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Atoll
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Island
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Is Documented?
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Is Potentially threatened?
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Is Threatened?
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                    Is Destroyed?
                                </th>




                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Manage</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($ecosystems as $ecosystem)

                                <tr>
                                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-ellipsis overflow-hidden">
                                        {{$ecosystem->name}}
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">

                                        <a
                                                href="{{url("atoll/".$ecosystem["atoll_id"])}}">
                                            {{$ecosystem->atoll->name}}
                                        </a>

                                    </td>


                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        <a
                                                href="{{url("island/".$ecosystem["island_id"])}}">
                                            {{$ecosystem->island->name}}
                                        </a>
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        {{$ecosystem->is_documented ? "Yes" : "No"}}
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        {{$ecosystem->is_potentially_threatened ? "Yes" : "No"}}
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        {{$ecosystem->is_threatened ? "Yes" : "No"}}
                                    </td>

                                    <td class=" px-3 py-4 text-sm text-gray-500 text-ellipsis overflow-hidden">
                                        {{$ecosystem->is_destroyed ? "Yes" : "No"}}
                                    </td>


                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{url("ecosystem/".$ecosystem["id"])}}"
                                           class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8">
                        {{$ecosystems->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-flash-message></x-flash-message>

</div>
