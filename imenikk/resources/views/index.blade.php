@extends ('layout')


@section('mid')
@if (Route::has('login'))
@auth
<a href="/imenikk">
    <h1>Kontakti</h1>
</a>
<form action="/search" method="get">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Pretraga"> <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">
                Trazi
            </button>
        </span>
    </div>
</form>
<br>
<br>
<div class="container">
    @foreach ($kontakti as $kontakt)
    @if ($kontakt->user_id == $user)
    <table class="blueTable">
        <tbody>
            <tr>
                <td> <a href="/imenikk/{{$kontakt->id}}">
                        <h4> {{$kontakt->ime}}
                            {{$kontakt->prezime}}</h4>

                    </a></td>
            </tr>
        </tbody>
    </table>


    @endif







    @endforeach
    <br>
    <span style="position: relative; top: 0; left: 75px;">{{$kontakti->links()}}</span>
</div>
@else

@endif
@endauth


@endsection


@section('right')

@if (Route::has('login'))

@auth
<h1><a href="/imenikk/create">+</a></h1>
@else

@endif
@endauth



@endsection