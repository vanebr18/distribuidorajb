<x-layouts-app page="dashboard">
    <div class="grid grid-cols-12 gap-4 md:gap-6">

        <!-- ===== Left Column: Metrics & Chart One ===== -->
        <div class="col-span-12 xl:col-span-7 space-y-6">
            <!-- Metric Group One -->
            <div class="w-full bg-white rounded-lg shadow-md p-4">
                @include('partials.metric-group.metric-group-01')
            </div>

            <!-- Chart One -->
            <div class="w-full bg-white rounded-lg shadow-md p-4">
                @include('partials.chart.chart-01')
            </div>
        </div>

        <!-- ===== Right Column: Chart Two ===== -->
        <div class="col-span-12 xl:col-span-5 space-y-6">
            <div class="w-full bg-white rounded-lg shadow-md p-4">
                @include('partials.chart.chart-02')
            </div>
        </div>

        <!-- ===== Full Width Row: Chart Three ===== -->
        <div class="col-span-12 space-y-6">
            <div class="w-full bg-white rounded-lg shadow-md p-4">
                @include('partials.chart.chart-03')
            </div>
        </div>

        <!-- ===== Left Column: Map One ===== -->
        <div class="col-span-12 xl:col-span-5 space-y-6">
            <div class="w-full bg-white rounded-lg shadow-md p-4">
                @include('partials.map-01')
            </div>
        </div>

        <!-- ===== Right Column: Table One ===== -->
        <div class="col-span-12 xl:col-span-7 space-y-6">
            <div class="w-full bg-white rounded-lg shadow-md p-4">
                @include('partials.table.table-01')
            </div>
        </div>

    </div>
</x-layouts-app>