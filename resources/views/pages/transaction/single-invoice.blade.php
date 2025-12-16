<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $invoice->num }}</h2>
                <p>Dátum: {{ $invoice->date }}</p>
                <p>típus: {{ $invoice->type }}</p>
                <p>Fizetési mód: {{ $invoice->pay_mode }}</p>
                <p>Összeg: {{ $invoice->amount }}</p>
            </div>
        </div>
    </div>
</x-app-layout>