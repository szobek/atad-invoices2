<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <x-info />
                <h2>Felhasználó részletei</h2>
                <p><strong>Név:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Szerepkör:</strong> {{ __('user.'.$user->role) }}</p>
                @if(($user->id != auth()->user()->id)&& ($user->role != 'admin'))
                <form action="{{ route('user.delete', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">törlés</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>