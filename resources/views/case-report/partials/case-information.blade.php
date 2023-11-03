<div x-data="{
            showDeleteModal:false,
            showVerifyModal:false,
            showUnpublishModal:false,
                keydown(){
                this.showDeleteModal=false;
                this.showVerifyModal=false;
                this.showUnpublishModal=false;
            }
    }" class="">
    <div class=" pb-5 flex justify-between">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Case Report Information
            @if($caseReport->is_verified)
                <span class="inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                    <svg class="h-1.5 w-1.5 fill-green-500" viewBox="0 0 6 6" aria-hidden="true">
                        <circle cx="3" cy="3" r="3"/>
                    </svg>
                    Verified
                </span>
            @else
                <span class="inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                    <svg class="h-1.5 w-1.5 fill-yellow-500" viewBox="0 0 6 6" aria-hidden="true">
                        <circle cx="3" cy="3" r="3"/>
                    </svg>
                    Unverified
                </span>
            @endif
        </h3>

        @include('case-report.partials.case-information-actions')
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">


            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Atoll
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{$caseReport->atoll->name}}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Island
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{$caseReport->island->name}}
                </dd>
            </div>


            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Ecosystem
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{isset($caseReport->ecosystem) ? $caseReport->ecosystem->name : 'NA'}}
                    @if(isset($caseReport->ecosystem))
                        @if($caseReport->ecosystem->is_destroyed)
                            <span class="ml-3 inline-flex items-center rounded-md bg-gray-50 px-1.5 py-0.5 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Destroyed</span>
                        @endif

                        @if($caseReport->ecosystem->is_threatened && !$caseReport->ecosystem->is_destroyed)
                            <span class="ml-3 inline-flex items-center rounded-md bg-red-50 px-1.5 py-0.5 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                                Threatened
                            </span>
                        @endif

                        @if($caseReport->ecosystem->is_potentially_threatened &&
                        !$caseReport->ecosystem->is_threatened &&
                         !$caseReport->ecosystem->is_destroyed)
                            <span class=" ml-3 inline-flex items-center rounded-md bg-yellow-50 px-1.5 py-0.5 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20"
                            >Potentially Threatened
                            </span>
                        @endif
                    @endif

                </dd>
            </div>


            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Title
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{$caseReport->title}}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Statement
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{$caseReport->statement ?? 'N/A'}}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Submitted By
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{$caseReport->submitted_by ?? 'N/A'}}
                </dd>
            </div>


            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Phone
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{$caseReport->phone ?? 'N/A'}}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Email
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{$caseReport->email ?? 'N/A'}}
                </dd>
            </div>


            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Case Report Links
                </dt>
                <ul role="list" class="divide-y divide-gray-100">
                    @if($caseReport->caseReportLinks->count() == 0)
                        <dd class="mt-1 text-sm text-gray-900">
                            No links have been added to this case report.
                        </dd>
                    @endif
                    @foreach($caseReport->caseReportLinks as $caseReportLink)
                        <li class="flex items-center justify-between gap-x-6 py-5">
                            <div class="min-w-0">
                                <div class="flex items-start gap-x-3">
                                    <a href="{{$caseReportLink->link}}">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{$caseReportLink->link}}</p>
                                    </a>
                                </div>
                                @if(isset($caseReportLink->description))
                                    <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                        <p class="">Details: {{$caseReportLink->description}}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-none items-center gap-x-4">
                                <form action="{{ url("/case-report/link/$caseReportLink->id") }}" method="post">

                                    @method('DELETE')
                                    @csrf
                                    <button
                                            type="submit"
                                            class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Case Report Images and videos
                </dt>
                <ul wire:ignore role="list" class="divide-y divide-gray-100 b_gallery flex">
                    @if($caseReport->getMedia('case-report-images') != null && count($caseReport->getMedia('case-report-images')))
                        @foreach($caseReport->getMedia('case-report-images') as $caseReportMedia)
                            @if($caseReportMedia->mime_type != 'video/mp4')
                                <a href="{{ url($caseReportMedia->getUrl()) }}" class="flex m-2">
                                    <img class="aspect-video rounded-xl bg-gray-50 object-cover  transition-all duration-300"
                                         src="{{ url($caseReportMedia->getUrl()) }}"
                                         alt=""
                                         style="width:100px; height:100px; object-fit: cover; object-position: center; "
                                    />
                                </a>
                            @endif
                        @endforeach
                    @endif
                </ul>

                <ul wire:ignore role="list" class="divide-y divide-gray-100 grid grid-cols-1 gap-4 ">
                    @if($caseReport->getMedia('case-report-images') != null && count($caseReport->getMedia('case-report-images')))
                        @foreach($caseReport->getMedia('case-report-images') as $caseReportMedia)
                            @if($caseReportMedia->mime_type == 'video/mp4')
                                <video class="aspect-video w-full  bg-gray-50 object-cover"
                                       src="{{ url($caseReportMedia->getUrl()) }}"
                                       alt=""
                                       controls
                                       style="height: 500px; object-fit: cover; object-position: center; "
                                ></video>
                            @endif
                        @endforeach
                    @endif
                </ul>

            </div>

        </dl>
    </div>

    <x-confirm-delete-modal post-url="case-report/{{$caseReport->id}}"
                            title="Are you sure"
                            subtitle="Please confirm if you would like to delete the case-report"
    />

    @if(!$caseReport->is_verified)
        <div class="fixed z-10 inset-0 overflow-y-auto" x-show="showVerifyModal" aria-labelledby="modal-title"
             role="dialog"
             aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"

                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"

                     aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"

                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"


                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <!-- Heroicon name: outline/check -->
                            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>

                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Would you like to verify this case report?
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Upon verification, this case report will be made visible on the public case report
                                    page.
                                </p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url("/case-report/$caseReport->id/verify") }}" method="post">
                        @csrf

                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">

                            <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent
                            shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:col-start-2 sm:text-sm">
                                Verify
                            </button>


                            <button type="button" @click="showVerifyModal=false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border
                            border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700
                            hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0
                            sm:col-start-1 sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif

    @if($caseReport->is_verified)
        <div class="fixed z-10 inset-0 overflow-y-auto" x-show="showUnpublishModal" aria-labelledby="modal-title"
             role="dialog"
             aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"

                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"

                     aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"

                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"


                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100">
                            <!-- Heroicon name: outline/check -->
                            <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>

                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Would you like to unpublish this case report?
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Upon unpublishing, this case report will be removed from the public case report
                                    page.
                                </p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url("/case-report/$caseReport->id/unpublish") }}" method="post">
                        @csrf

                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">

                            <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent
                            shadow-sm px-4 py-2 bg-yellow-600 text-base font-medium text-white hover:bg-yellow-700
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:col-start-2 sm:text-sm">
                                Unpublish
                            </button>


                            <button type="button" @click="showUnpublishModal=false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border
                            border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700
                            hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0
                            sm:col-start-1 sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif


</div>
