<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <select name="year" id="year" >
                    <option value="">Kérlek válassz</option>
                    <option value="2025" @if($year == 2025) selected @endif>2025</option>
                    <option value="2026" @if($year == 2026) selected @endif>2026</option>
                    <option value="2027" @if($year == 2027) selected @endif>2027</option>
                </select>
            </div>
            <div class="col-md-12">
                <p>Kezdő dátum: {{ $dashboard_data["start_date"] }}</p>
                <p>Végső dátum: {{ $dashboard_data["end_date"] }}</p>
                <p>Összes számla: {{ $dashboard_data["all_invoice"] }}</p>
                <p>ebből storno: {{ $dashboard_data["all_storno"] }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="chart_bar" data-invoices="{{ json_encode($dashboard_data["bar_chart"]["normal"]) }}"
                    data-storno="{{ json_encode($dashboard_data["bar_chart"]["storno"]) }}">
                </canvas>
            </div>
            <div class="col-md-6">
                <canvas id="chart_line" data-invoices="{{ json_encode($dashboard_data["bar_chart"]["normal"]) }}"
                    data-storno="{{ json_encode($dashboard_data["bar_chart"]["storno"]) }}">
                </canvas>
            </div>
        </div>
    </div>
</x-app-layout>