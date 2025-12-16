<x-app-layout>
    <div class="container">
        <div class="row">
            <h2>Összes partner</h2>
            <div class="col-md-12 d-flex gap-4 flex-wrap">
                @foreach ($partners as $partner)
                    <div class="card">
                        <a href="{{ route('pages.single-partner', [$partner->id]) }}">
                            <div class="card-body">
                                <p class="card-text">Név: {{ $partner->name }}</p>
                                <p class="card-text">Cím: {{ $partner->address }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>