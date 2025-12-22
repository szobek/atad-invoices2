<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('pages.create-partner') }}" class="btn btn-primary my-3">Új partner hozzáadása</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h2>Összes partner</h2>
            <div class="col-md-12 d-flex gap-4 flex-wrap">

                <form method="GET" action="{{ route('pages.all-partners') }}" class="mb-4">
                    <div>
                        <p>
                            Keresés név alapján:
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Keresés név alapján..." class="form-control">

                        <button type="submit" class="btn btn-secondary">
                            Keresés
                        </button>
                    </div>
                </form>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Cím</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $partner)
                            <tr>
                                <td>
                                    <a href="{{ route('pages.single-partner', [$partner->id]) }}">
                                        {{ $partner->name }}
                                    </a>
                                </td>
                                <td>{{ $partner->zip }} {{ $partner->state }} {{ $partner->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $partners->links() }}

            </div>
        </div>
    </div>
</x-app-layout>