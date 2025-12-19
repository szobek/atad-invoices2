<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Excel fájl feltöltése</h1>

                @if(session('success'))
                    <div style="color: green;">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div style="color: red;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('post.import.partners') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" required class="form-control">
                    <button type="submit" class="btn btn-primary mt-3">Feltöltés</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>