<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Üzletkötő részletei</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $salesperson->name }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $salesperson->email }}</p>
                        <hr>
                        <h5>Kapcsolódó partnerek:</h5>
                        @if($salesperson->partners->isEmpty())
                            <p>Nincsenek kapcsolódó partnerek.</p>
                        @else
                            <ul>
                                @foreach($salesperson->partners as $partner)
                                    <li>{{ $partner->name }} - {{ $partner->address }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>