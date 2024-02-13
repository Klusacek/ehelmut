
<form action="/files/upload/1" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" >
    <button type="submit">Nahrát soubor</button>
</form>

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div>
        {{ session('error') }}
    </div>
@endif