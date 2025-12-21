<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $invoice->num }}</h2>
                <p>Dátum: {{ $invoice->date }}</p>
                <p>típus: {{ $invoice->type }}</p>
                <p>Fizetési mód: {{ $invoice->pay_mode }}</p>
                <p>Összeg: {{ number_format($invoice->amount, 2, ',', ' ') }} Ft</p>
                
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <form action="{{ route('invoice.delete', $invoice->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Biztosan törölni szeretnéd a számlát?')">Számla törlése</button>
                </form>
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