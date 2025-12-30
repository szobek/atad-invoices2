<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Saját partnerek</h1>
                @if (count($partners) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Partner neve</th>
                                <th>Címe</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($partners as $partner)
                                <tr>
                                    <td>{{ $partner['name'] }}</td>
                                    <td>{{ $partner['address'] }}</td>
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