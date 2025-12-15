<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table stripped">
                    <thead>
                        <tr>
                            <th>Számlaszám</th>
                            <th>Dátum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)

                        <tr>
                            <td>{{ $transaction->num }}</td>
                            <td>{{ $transaction->date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>