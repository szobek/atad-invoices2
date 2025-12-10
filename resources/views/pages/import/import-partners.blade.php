<!DOCTYPE html>
<html>
<head>
    <title>Excel Import</title>
</head>
<body>
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
        <input type="file" name="file" required>
        <button type="submit">Feltöltés</button>
    </form>
</body>
</html>