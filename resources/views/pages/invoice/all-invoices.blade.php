<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <form method="GET" action="{{ route('pages.all-invoices') }}" class="mb-4">
                    <div>
                        <p>
                            Keresés számlaszám alapján:
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Keresés számlaszám alapján..." class="form-control">
                        <button type="submit" class="btn btn-secondary">
                            Keresés
                        </button>
                    </div>
                </form>
            </div>
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

                            <tr class="@if($invoice->type == "storno") bg-red @endif">
                                <td>
                                    <a href="{{ route('pages.single-invoice', $invoice->id) }}">
                                        {{ $invoice->num }}
                                    </a>
                                </td>
                                <td>{{ $invoice->date }}</td>
                                <td>{{ $invoice->type }}</td>
                                <td>{{ __("invoice." . $invoice->pay_mode) }}</td>
                                <td>{{ number_format($invoice->amount, 2, ',', ' ') }} Ft</td>
                                <td>{{ $invoice->comment }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $invoices->links() }}
            </div>
        </div>
    </div>
</x-app-layout>