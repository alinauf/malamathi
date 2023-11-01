<div class="lg:border-t lg:border-gray-200">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
    <ol role="list" class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">
        <li class="relative overflow-hidden lg:flex-1">
        <div class="overflow-hidden border border-gray-200 rounded-t-md border-b-0 lg:border-0">
            <!-- Completed Step -->
            <a href="#" class="group step-link {{ $form1 ? 'form-selected' : '' }}" wire:click="showForm(1)">                    
                <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                    <span class="flex-shrink-0">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300 bg-white">
                        <span class="text-gray-700 step-count">1</span>
                    </span>
                    </span>
                    <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                        <span class="text-sm font-bold text-blue-800">Case Details</span>
                        <span class="text-sm font-medium text-blue-800">Essentials required for case</span>
                    </span>
                </span>
                </a>
        </div>
        </li>
        <li class="relative overflow-hidden lg:flex-1">
        <div class="overflow-hidden border border-gray-200 lg:border-0">
            <!-- Current Step -->
            <a href="#" class="group step-link {{ $form2 ? 'form-selected' : '' }}" wire:click="showForm(2)">                    
                
                <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                    <span class="flex-shrink-0">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300 bg-white">
                        <span class="text-gray-700 step-count">2</span>
                    </span>
                    </span>
                    <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                    <span class="text-sm font-bold text-blue-800">Supporting Information</span>
                    <span class="text-sm font-medium text-blue-800">Optional information</span>
                    </span>
                </span>
                </a>
            <!-- Separator -->
            <div class="absolute inset-0 left-0 top-0 hidden w-3 lg:block" aria-hidden="true">
            <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
            </svg>
            </div>
        </div>
        </li>
        <li class="relative overflow-hidden lg:flex-1">
        <div class="overflow-hidden border border-gray-200 rounded-b-md border-t-0 lg:border-0">
            <!-- Upcoming Step -->
            <a href="#" class="group step-link {{ $form3 ? 'form-selected' : '' }}" wire:click="showForm(3)">                    
            
            <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                <span class="flex-shrink-0">
                <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300 bg-white">
                    <span class="text-gray-700 step-count">3</span>
                </span>
                </span>
                <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                    <span class="text-sm font-bold text-blue-800">Review & Submit</span>
                    <span class="text-sm font-medium text-blue-800">Penatibus eu quis ante.</span>
                </span>
            </span>
            </a>
            <!-- Separator -->
            <div class="absolute inset-0 left-0 top-0 hidden w-3 lg:block" aria-hidden="true">
            <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
            </svg>
            </div>
        </div>
        </li>
    </ol>
    </nav>
</div>