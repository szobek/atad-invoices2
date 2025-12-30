<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
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
                                    <form action="{{ route('salesperson.remove-partner') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="partner_id" value="{{ $partner->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger">Eltávolítás</button>
                                    </form>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>