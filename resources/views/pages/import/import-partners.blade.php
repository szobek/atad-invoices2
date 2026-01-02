<x-app-layout title="Partnerek importálása">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Excel fájl feltöltése</h1>
                <form action="{{ route('post.import.partners') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" required class="form-control">
                    <button type="submit" class="btn btn-primary mt-3">Feltöltés</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>