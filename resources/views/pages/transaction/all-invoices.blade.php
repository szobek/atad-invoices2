<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table stripped">
                    <thead>
                        <tr>
                            <th>Számlaszám</th>
                            <th>Dátum</th>
                            <th>Típus</th>
                            <th>Fizetési mód</th>
                            <th>Összeg</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)

                        <tr>
                            <td>{{ $invoice->num }}</td>
                            <td>{{ $invoice->date }}</td>
                            <td>{{ $invoice->type }}</td>
                            <td>{{ $invoice->pay_mode }}</td>
                            <td>{{ number_format($invoice->amount, 2, ',', ' ') }} Ft</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>