@extends('layout')


@section('mid')

<h1><a href="/imenikk/{{$imenikk->id}}">Kontakt</a></h1><br>
<div class="container text-center">
    <form method="POST" action="/imenikk/{{$imenikk->id}}" enctype="multipart/form-data">

        @method('PATCH')
        @csrf
        <div>

            <label for="ime">Ime</label>

            <input type="text" name="ime" class="form-control text-center" placeholder="Ime" value="{{$imenikk->ime}}">

        </div>
        <br>
        <div>

            <label for="prezime">Prezime</label>

            <input type="text" name="prezime" class="form-control text-center" placeholder="Prezime" value="{{$imenikk->prezime}}">

        </div>
        <br>
        <div>

            <label for="broj">Broj</label>

            <input type="text" name="broj" class="form-control text-center" placeholder="Broj" value="{{$imenikk->broj}}">

        </div>
        <br>
        <div>

            <input type="file" name="avatar" accept="image/*" id="avatar">
        </div>
        <div>

            <button type="submit" class="btn btn-primary">Izmeni</button>



        </div>




    </form>
</div>
<br><br>
<form method="POST" action="/imenikk/{{$imenikk->id}}">

    @method('DELETE')
    @csrf
    <div>

        <button type="submit" class="btn btn-danger">Izbrisi Kontakt</button>


    </div>

</form>



@endsection

@section('right')


@endsection


@section('left')

<h4><a href="/imenikk">
        < Kontakti </a> </h4> @endsection