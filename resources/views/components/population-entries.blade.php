<div x-data="{
            showDeleteModal:false,
                keydown(){
                this.showDeleteModal=false;
            }
    }" class="">

    <div class=" pb-5 flex justify-between">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Population Entries
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        @if(isset($lastPopulationEntry))
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">


                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        No. of Men
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{$lastPopulationEntry->men_count}}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        No. of Female
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{$lastPopulationEntry->women_count}}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        No. of Locals
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{$lastPopulationEntry->local_count }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        No. of Expats
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{$lastPopulationEntry->expat_count }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Current Total Population
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{$lastPopulationEntry->total_population}}
                    </dd>
                </div>


                <div class="sm:col-span-2">
                    <canvas id="populationChart"></canvas>
                </div>

            </dl>
        @else
            <p class="text-gray-500">No population entries yet.</p>
        @endif
    </div>

    <script type="module">


        const ctx = document.getElementById('populationChart');


        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($populationCounts['labels']),
                datasets: [{
                    label: 'Male',
                    backgroundColor: "rgba(54, 162, 235, 0.7)",
                    borderColor: "rgba(54, 162, 235, 0.7)",
                    data: @json($populationCounts['maleData']),
                },
                    {
                        label: 'Female',
                        backgroundColor: "rgba(255, 99, 132, 0.7)",
                        borderColor: "rgba(255, 99, 132, 0.7)",
                        data: @json($populationCounts['femaleData']),

                    },
                    {
                        label: 'Local',
                        backgroundColor: "rgba(75, 192, 192, 0.7)",
                        borderColor: "rgba(75, 192, 192, 0.7)",
                        data: @json($populationCounts['localsData']),
                    },
                    {
                        label: 'Expat',
                        backgroundColor: "rgba(255, 206, 86, 0.7)",
                        borderColor: "rgba(255, 206, 86, 0.7)",
                        data: @json($populationCounts['expatsData'])
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Population Chart'
                    }
                }
            }
        });
    </script>


</div>
