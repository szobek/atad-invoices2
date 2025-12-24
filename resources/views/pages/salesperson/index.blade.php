<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Üzletkötők listája</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salespersons as $salesperson)
                            <tr>
                                <td>{{ $salesperson->name }}</td>
                                <td>{{ $salesperson->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</x-app-layout>