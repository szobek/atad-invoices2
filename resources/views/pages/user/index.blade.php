<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Felhasználók listája</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('page.user-detail', $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</x-app-layout>