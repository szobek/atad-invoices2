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
                    <div class="form-group">
                        <label for="num">Tranzakció szám</label>
                        <input type="text" name="num" id="num" class="@error('num') is-invalid @enderror"
                            value="{{ old('num') }}">
                        @error('num')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Dátum</label>
                        <input type="date" name="date" id="date" class="@error('date') is-invalid @enderror"
                            value="{{ old('date') }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pay_mode">Fizetési mód</label>
                        <select name="pay_mode" id="pay_mode" class="@error('pay_mode') is-invalid @enderror">
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
                    <div class="form-group">
                        <label for="amount">Összeg</label>
                        <input type="number" name="amount" id="amount" step="100"
                            class="@error('amount') is-invalid @enderror" value="{{ old('amount') }}">
                        @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-400 text-black rounded">Új Számla
                        Létrehozása</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>