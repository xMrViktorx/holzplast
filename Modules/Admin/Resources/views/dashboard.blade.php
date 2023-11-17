@extends('admin::layouts.navigation')

@section('content')
    <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                <i class="ri-dropbox-line text-2xl"></i>
            </div>
            <div>
                <span class="block text-2xl font-bold">{{ $dashboard['productsNum'] }}</span>
                <span class="block text-gray-500">Termék</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                <i class="ri-list-ordered text-2xl"></i>
            </div>
            <div>
                <span class="block text-2xl font-bold">{{ $dashboard['ordersNum'] }}</span>
                <span class="block text-gray-500">Rendelés</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                <i class="ri-wallet-2-line text-2xl"></i>
            </div>
            <div>
                <span class="inline-block text-2xl font-bold">{{ formatPrice($dashboard['orderTotalIncome']) }}</span>
                <span class="block text-gray-500">Teljes bevétel</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                <i class="ri-coin-line text-2xl"></i>
            </div>
            <div>
                <span class="block text-2xl font-bold">{{ formatPrice($dashboard['orderMonthlyIncome']) }}</span>
                <span class="block text-gray-500">Havi bevétel</span>
            </div>
        </div>
    </section>

    <div class="flex flex-wrap justify-center mt-10">
        <div class="h-40 sm:h-96 w-auto sm:w-[40rem] md:w-[45rem] mb-10">
            <canvas id="monthlyOrder" class="pr-0"></canvas>
        </div>

        <div class="h-40 sm:h-96 w-auto sm:w-[40rem] md:w-[45rem] mb-10">
            <canvas id="monthlyIncome"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //Monthly view
        new Chart("monthlyOrder", {
            type: "bar",
            data: {
                labels: <?php echo json_encode($monthlyOrdersMonth); ?>,
                datasets: [{
                    label: 'Havi rendelés',
                    data: <?php echo json_encode($monthlyOrdersView); ?>,
                }],
                options: {
                    responsive: true,
                }
            },

        });

        new Chart("monthlyIncome", {
            type: "bar",
            data: {
                labels: <?php echo json_encode($monthlyOrdersMonth); ?>,
                datasets: [{
                    label: 'Havi bevétel',
                    data: <?php echo json_encode($monthlyIncomeView); ?>,
                }],
                options: {
                    responsive: true,
                }
            },

        });
    </script>
@endsection
