<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
            <x-info />
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
                    <div>
                        @if($search)
                        <a href="{{ route('pages.all-partners') }}">Keresés törlése</a>
                        @endif
                    </div>
                </form>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}">
                                    Név
                                    @if($sort == 'name') 
                                        <i class="bi bi-caret-{{ $direction == 'asc' ? 'up' : 'down' }}-fill"></i> 
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'zip', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}">
                                    Irányítószám
                                    @if($sort == 'zip') 
                                        <i class="bi bi-caret-{{ $direction == 'asc' ? 'up' : 'down' }}-fill"></i> 
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'address', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}">
                                    Cím
                                    @if($sort == 'address') 
                                        <i class="bi bi-caret-{{ $direction == 'asc' ? 'up' : 'down' }}-fill"></i> 
                                    @endif
                                </a>
                            </th>
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
                                <td>{{ $partner->zip }}</td>
                                <td>{{ $partner->zip }} {{ $partner->city }} {{ $partner->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $partners->links() }}

            </div>
        </div>
    </div>
</x-app-layout>