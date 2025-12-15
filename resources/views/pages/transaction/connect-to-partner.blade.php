<x-app-layout>
    <form action="{{ route('transactions-to-partner-save') }}" method="post">
        @csrf
        <select name="partner_id" id="">
            @foreach ($partners as $partner)
                <option value="{{ $partner->id }}">{{ $partner->name }} </option>
            @endforeach
        </select>
        <select name="transaction_id" id="">
            @foreach ($transactions as $transaction)
                <option value="{{ $transaction->id }}">{{ $transaction->num }} </option>
            @endforeach
        </select>
        <button>Mentés</button>
    </form>
</x-app-layout>