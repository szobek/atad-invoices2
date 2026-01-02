<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                @include('profile.partials.update-profile-information-form')
            </div>
            
            <div class="col-md-12">
                @include('profile.partials.update-password-form')
            </div>

        </div>
    </div>
</x-app-layout>
