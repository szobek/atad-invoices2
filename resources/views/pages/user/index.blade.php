<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-3">
                <a href="{{ route('page.user-create') }}" class="btn btn-primary">Új felhasználó</a>
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
                <h2>Felhasználók listája</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Email</th>
                            <th>Szerepkör</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('page.user-detail', $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('page.user-edit', $user->id) }}"
                                        class="btn btn-sm btn-secondary">Szerkesztés</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</x-app-layout>