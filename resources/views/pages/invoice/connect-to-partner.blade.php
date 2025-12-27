<x-app-layout title="Számla partnerhez rendelése">
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-4">
        <form action="{{ route('invoice-to-partner-save') }}" method="post">
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <select name="partner_id" id="partner_id" class="form-select">
                        <option value="">Kérlek válassz</option>
                        @foreach ($partners as $partner)
                        <option value="{{ $partner->id }}">
                            {{ $partner->name }}
                                {{ $partner->zip }} {{ $partner->city }} {{ $partner->address }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-4">
                    <select name="transaction_id" class="form-select">
                        <option value="">Kérlek válassz</option>
                        @foreach ($transactions as $transaction)
                        <option value="{{ $transaction->id }}">{{ $transaction->num }} </option>
                        @endforeach
                    </select>
                    
                </div>
                
                <div class="col-md-4">
                    <button class="btn btn-primary">Mentés</button>
                    
                </div>


        </form>
    </div>
    </div>
</x-app-layout>