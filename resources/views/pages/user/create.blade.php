<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-info />
                <h2>Új felhasználó létrehozása</h2>
                <form method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Név')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        

                        <!-- Role -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('user.role')" />
                            <select id="role" name="role" class="form-control">
                                <option value="admin">{{ __('user.admin') }}</option>
                                <option value="sales">{{ __('user.sales') }}</option>
                                <option value="salesperson">{{ __('user.salesperson') }}</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                Felhasználó létrehozása
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    
</x-app-layout>