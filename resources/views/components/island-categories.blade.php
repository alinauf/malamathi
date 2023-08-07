<div x-data="{
    }" class="">

    <div class=" pb-5 flex justify-between">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Islands
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        @if(isset($islandCategories) && $atoll->islands->count() > 0)
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                         Total Islands
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{$atoll->islands->count()}}
                    </dd>
                </div>


                <div class="sm:col-span-2">
                    <canvas id="islandCategoryChart"></canvas>
                </div>

            </dl>
        @else
            <p class="text-gray-500">No islands in the atoll yet.</p>
        @endif
    </div>

    <script type="module">


        const ctx = document.getElementById('islandCategoryChart');
        const islandCategories = @json($islandCategories);

        const categoryLabels = islandCategories.map((item) => item.category);

        const islandCategoriesDataset = [
            {
                label: 'Islands',
                backgroundColor: "#ccfbf1",
                borderColor: "#ccfbf1",
                data: islandCategories.map((item) => item.total_islands),
            }
        ];




        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categoryLabels,
                datasets: islandCategoriesDataset
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
                        text: 'Islands belonging to each category'
                    }
                }
            }
        });
    </script>


</div>
