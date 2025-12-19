<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <p>Üdvözlünk a tranzakciók irányítópultján! Itt kezelheted és nyomon követheted pénzügyi
                    tranzakcióidat.</p>

                <h3>Új számla</h3>
                <p>Készíts új számlát ügyfeleid számára, és kövesd nyomon a fizetéseket.</p>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('saved'))
                    <div class="alert alert-success" role="alert">
                        {{ session('saved') }}
                    </div>
                @endif
                <form action="{{ route('transactions-create') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="num">Tranzakció szám</label>
                                <input type="text" name="num" id="num"
                                    class="form-control @error('num') is-invalid @enderror" value="{{ old('num') }}">
                                @error('num')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="date">Dátum</label>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pay_mode">Fizetési mód</label>
                                <select name="pay_mode" id="pay_mode"
                                    class="form-control @error('pay_mode') is-invalid @enderror">
                                    <option value="">Válassz...</option>
                                    <option value="cash" {{ old('pay_mode') == 'cash' ? 'selected' : '' }}>
                                        Készpénz
                                    </option>
                                    <option value="bank" {{ old('pay_mode') == 'bank' ? 'selected' : '' }}>
                                        Banki átutalás
                                    </option>
                                    <option value="credit_card" {{ old('pay_mode') == 'credit_card' ? 'selected' : '' }}>
                                        Bankkártya
                                    </option>
                                </select>
                                @error('pay_mode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="comment">Megjegyzés</label>
                                <textarea name="comment" id="comment"
                                    class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="amount">Összeg</label>
                                <input type="number" name="amount" id="amount" step="100"
                                    class="form-control @error('amount') is-invalid @enderror"
                                    value="{{ old('amount') }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Új Számla
                                Létrehozása</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>