<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Saját számlák</h1>
                @if (count($list) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Partner neve</th>
                                <th>
                                    Összeg</th>
                                <th>
                                    Dátum</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($list as $invoice)
                                <tr>
                                    <td>{{ $invoice['partner_name'] }}</td>
                                    <td>{{ number_format($invoice['amount'], 2, ',', ' ') }}</td>
                                    <td>{{ $invoice['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    Nincs saját számla.
                @endif
            </div>
        </div>
    </div>


</x-app-layout>