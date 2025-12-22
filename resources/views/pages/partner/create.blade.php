<x-app-layout>
    <div class="container">
        <div class="row">
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
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Partner neve</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="zip" class="form-label">Irányítószám</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label">Város</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Cím</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="tax" class="form-label">Adószám</label>
                    <input type="text" class="form-control" id="tax" name="tax">
                </div>

                <button type="submit" class="btn btn-primary">Mentés</button>
            </form>
        </div>
    </div>
    </div>
</x-app-layout>