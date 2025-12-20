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
                            <th>Megjegyzés</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)

                        <tr class="@if($invoice->type=="storno") bg-red @endif">
                            <td>
                                <a href="{{ route('pages.single-invoice', $invoice->id) }}">
                                    {{ $invoice->num }}
                                </a>
                            </td>
                            <td>{{ $invoice->date }}</td>
                            <td>{{ $invoice->type }}</td>
                            <td>{{ $invoice->pay_mode }}</td>
                            <td>{{ number_format($invoice->amount, 2, ',', ' ') }} Ft</td>
                            <td>{{ $invoice->comment }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>