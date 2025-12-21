<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $invoice->num }}</h2>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <p>Dátum: {{ $invoice->date }}</p>
                            <p>típus: {{ $invoice->type }}</p>
                            <p>Fizetési mód: {{ $invoice->pay_mode }}</p>
                            <p>Összeg: {{ number_format($invoice->amount, 2, ',', ' ') }} Ft</p>

                            <form action="{{ route('invoice.delete', $invoice->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Biztosan törölni szeretnéd a számlát?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            <a href="{{ route('pages.all-invoices') }}" class="btn btn-secondary mt-4">
                                <i class="fas fa-arrow-left"></i> Vissza a számlákhoz
                            </a>

                        </div>
                    </div>

                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif


                </div>
                <div class="col-md-12">
                    <h3>Partner</h3>
                    @if ($partner)
                        <p>Név: {{ $partner->name }}</p>
                        <p>Cím: {{ $partner->address }}</p>
                        <a href="{{ route('pages.single-partner', $partner->id) }}">Partner adatai</a>
                    @else
                        <p>Nincs partner hozzárendelve.</p>
                    @endif

                </div>
            </div>
        </div>
</x-app-layout>