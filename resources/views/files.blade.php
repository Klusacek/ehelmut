<form action="/files/upload/" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="orderNum" value="{{$order}}">
    <input type="text" name="id" value="{{$id}}">
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