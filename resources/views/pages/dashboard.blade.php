<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <canvas id="chart_transactions" data-values="{{ json_encode($transactions_data["data"]) }}"
                    data-storno="{{ json_encode($transactions_data["stornos"]) }}">
                </canvas>
            </div>
        </div>
    </div>
</x-app-layout>