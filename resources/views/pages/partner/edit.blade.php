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
                <h1>Partner szerkesztése</h1>
                <form action="{{ route('partner.update', $partner->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name">Név:</label>
                        <input type="text" name="name" id="name" value="{{ $partner->name }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="zip">Irányítószám:</label>
                        <input type="text" name="zip" id="zip" value="{{ $partner->zip }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="city">Város:</label>
                        <input type="text" name="city" id="city" value="{{ $partner->city }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">Cím:</label>
                        <input type="text" name="address" id="address" value="{{ $partner->address }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tax">Adószám:</label>
                        <input type="text" name="tax" id="tax" value="{{ $partner->tax }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Mentés</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Mégse</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>