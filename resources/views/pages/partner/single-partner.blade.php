<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Partner adatok</h3>
                    </div>
                    <div class="card-body">
                        <p>Név: {{ $partner->name }}</p>
                        <p>Cím: {{ $partner->zip }} {{ $partner->city }}, {{ $partner->address }} </p>
                        <p>Adószám: {{ $partner->tax }}</p>
                        <div class="d-flex gap-3">
                            <form action="{{ route('partner.delete', $partner->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Biztosan törölni szeretnéd a partnert?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <form action="{{ route('partner.edit', $partner->id) }}" method="get">
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Biztosan módosítani szeretnéd a partnert?')">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                        </div>

                        <hr>
                        <p>Partner számlái</p>
                        <table>

                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td><a href="{{ route('pages.single-invoice', $invoice->id) }}">{{ $invoice->num }}</a>
                                    </td>
                                    <td style="padding-left: 20px;">Dátum: {{ $invoice->date }}</td>
                                    <td style="padding-left: 20px;">Összeg: {{ number_format($invoice->amount, 2) }}
                                        {{ $invoice->currency }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>

</x-app-layout>