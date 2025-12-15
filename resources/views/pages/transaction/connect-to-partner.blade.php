<x-app-layout>
    <form action="{{ route('transactions-to-partner-save') }}" method="post">

        <select name="partner_id" id="">
            @foreach ($partners as $partner)
            <option value="{{ $partner->id }}">{{ $partner->name }}   </option>
            @endforeach
        </select>
        <button>Mentés</button>
    </form>
</x-app-layout>