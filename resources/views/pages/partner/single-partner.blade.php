<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Partner adatok</h3>
                    </div>
                    <div class="card-body">
                        <p>Név: {{ $partner->name }}</p>
                        <p>Cím: {{ $partner->zip }} {{ $partner->state }}, {{ $partner->address }} </p>
                        <p>Partner számlái</p>
                        <hr>
                        <table>
                            
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td><a href="{{ route('pages.single-invoice', $invoice->id) }}">{{ $invoice->num }}</a></td>
                                    <td style="padding-left: 20px;">Dátum: {{ $invoice->date }}</td>
                                    <td style="padding-left: 20px;">Összeg: {{ number_format($invoice->amount, 2) }} {{ $invoice->currency }}</td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
            
        </div>
    </div>

</x-app-layout>