<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Kezdő dátum: {{ $transactions_data["start_date"] }}</p>
                <p>Végső dátum: {{ $transactions_data["end_date"] }}</p>
                <p>Összes számla: {{ array_sum($transactions_data["invoice"]) }}</p>
                <p>ebből storno: {{ array_sum($transactions_data["stornos"]) }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="chart_bar" 
                    data-invoices="{{ json_encode($transactions_data["invoice"]) }}"
                    data-storno="{{ json_encode($transactions_data["stornos"]) }}"
                    >
                </canvas>
            </div>
            <div class="col-md-6">
                    <canvas id="chart_line" 
                        data-invoices="{{ json_encode($transactions_data["invoice"]) }}"
                        data-storno="{{ json_encode($transactions_data["stornos"]) }}">
                    </canvas>
                </div>
        </div>
    </div>
</x-app-layout>