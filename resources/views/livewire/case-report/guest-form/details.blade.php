
            <div class="space-y-12 sm:space-y-16">

                <div>

                    <h2 class="text-base font-semibold leading-7 text-gray-900">Documentation</h2>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
                        Please provide any photos or videos related to this case.
                    </p>

                    <div class="mt-5 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="cover-photo"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                                Photos or Video
                                </label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">

                                <x-media-library-attachment rules="mimes:jpeg,png,jpg,mp4" multiple name="uploads"/>

                            </div>
                        </div>

                    </div>


                    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
                        You can skip this section if you'd like to be anonymous.
                    </p>

                    <div class="mt-5 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">

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

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <dt class="text-sm font-medium leading-6 text-gray-900">
                              <a href="#"
                                    wire:click="showForm(1)"
                                    class="mt-8 text-md font-semibold leading-6 text-gray-900 step-link">
                                 Back
                                </a>
                            </dt>
                            <dd class="mt-2 sm:col-span-2 sm:mt-0">
                                <div class="flex justify-end">
                                <a href="#" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                                        step-link" wire:click="showForm(3)">
                                    Review & Submit
                                 </a>
                                </div>
                            </dd>
                          </div>


                    </div>
                </div>



            </div>
