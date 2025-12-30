<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-info />
                <h2>Felhasználó szerkesztése</h2>
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Név')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Szerepkör')" />
                        <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="sales" {{ $user->role == 'sales' ? 'selected' : '' }}>Sales</option>
                            <option value="salesperson" {{ $user->role == 'salesperson' ? 'selected' : '' }}>Üzletkötő</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            Felhasználó frissítése
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>