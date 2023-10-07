<div x-data="{
formValidationStatus:@entangle('formValidationStatus').live,
}"

     class=""
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>


    <form action="{{url("case-report/submission")}}" method="POST">
        @csrf

        <div class="space-y-12 sm:space-y-16">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Case Details</h2>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
                    Enter the details of the case report
                </p>

                <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="atoll_id" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                            Atoll</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <select id="atoll_id"
                                    wire:model.live="atoll_id"
                                    name="atoll_id"
                                    class="block w-full rounded-md  @error('atoll_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="">Select Atoll</option>
                                @foreach($atolls as $atoll)
                                    <option value="{{$atoll->id}}">{{$atoll->name}}</option>
                                @endforeach
                            </select>

                            @error('atoll_id')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="island_id" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                            Island</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <select id="island_id"
                                    wire:model.live="island_id"
                                    name="island_id"
                                    class="block w-full rounded-md  @error('island_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="">Select Island</option>
                                @foreach($islands as $island)
                                    <option value="{{$island->id}}">{{$island->name}}</option>
                                @endforeach
                            </select>

                            @error('island_id')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="ecosystem_id" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Ecosystem
                        </label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <select id="ecosystem_id"
                                    wire:model.live="ecosystem_id"
                                    name="ecosystem_id"
                                    class="block w-full rounded-md  @error('ecosystem_id') border border-red-500 @enderror border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="">Select Ecosystem</option>
                                @foreach($ecosystems as $ecosystem)
                                    <option value="{{$ecosystem->id}}">{{$ecosystem->name}}</option>
                                @endforeach
                            </select>

                            @error('ecosystem_id')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    {{-- Title--}}
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="title" class="block text-sm font-medium text-gray-700"
                        >
                            Title <span class="text-red-900">*</span>
                        </label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <input type="text" name="title"
                                   wire:model.live="title"
                                   id="title"
                                   class="
                            @error('title') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">

                            @error('title')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>

                    </div>



                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="statement"
                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Summary</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <textarea name="statement"
                                          wire:model.live="statement"
                                          id="statement" rows="3"
                                          class="
                                           @error('statement') border border-red-500 @enderror
                                          block w-full max-w-2xl rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"></textarea>
                            <p class="mt-3 text-sm leading-6 text-gray-600">
                                Write a summary regarding the case report.
                            </p>

                            @error('statement')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="cover-photo"
                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                            Photos or Video
                            </label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-media-library-attachment multiple name="uploads" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
                    You can skip this section if you'd like to be anonymous.
                </p>

                <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">

                    {{-- Submitted By--}}
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="submitted_by" class="block text-sm font-medium text-gray-700"
                        >
                            Submitted By
                        </label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <input type="text" name="submitted_by"
                                   wire:model.live="submitted_by"
                                   id="submitted_by"
                                   class="
                            @error('submitted_by') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                        </div>

                        @error('submitted_by')
                        <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                        @enderror
                    </div>



                    {{-- Phone--}}
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700"
                        >
                            Phone
                        </label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <input type="text" name="phone"
                                   wire:model.live="phone"
                                   id="phone"
                                   class="
                            @error('phone') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                        </div>

                        @error('phone')
                        <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                        @enderror
                    </div>


                    {{-- Email--}}
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="email" class="block text-sm font-medium text-gray-700"
                        >
                            Email
                        </label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <input type="email" name="email"
                                   wire:model.live="email"
                                   id="email"
                                   class="
                            @error('email') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                        </div>

                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                        @enderror
                    </div>


                </div>
            </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="mt-8 text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <div class="mt-8 flex justify-end">
                <button wire:click="validateForm" type="button"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save
                </button>
            </div>


            <x-confirm-create-modal title="Are you sure"
                                    subtitle="Please confirm if you would like to create the case report"/>
        </div>
    </form>

</div>

