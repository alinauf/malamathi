<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div>

                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>

                            <p class="truncate text-sm font-medium text-gray-500">Atolls</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">{{$stats['atolls']}}</p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{url('atoll')}}"
                                       class="font-medium text-blue-600 hover:text-blue-500">View all<span
                                                class="sr-only"> Total Atolls stats</span></a>
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
                                       class="font-medium text-blue-600 hover:text-blue-500">View all<span
                                                class="sr-only"> Total Islands stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>

                            <p class="truncate text-sm font-medium text-gray-500">Islands Categories</p>
                        </dt>
                        <dd class="flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">{{$stats['island_categories']}}</p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{url('island-category')}}"
                                       class="font-medium text-blue-600 hover:text-blue-500">View all<span
                                                class="sr-only"> Total Island Categories stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>


        </div>
    </div>
</x-admin-layout>
