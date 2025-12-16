<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex gap-2 flex-wrap ">

                @foreach ($invoices as $invoice)
                        <a href="{{ route('single-invoice', $invoice->num) }}">
                            <div class="card p-3">
                                <p>{{ $invoice->num }}</p>

                        </a>
                    </div>
                @endforeach
        </div>
    </div>
    </div>

</x-app-layout>