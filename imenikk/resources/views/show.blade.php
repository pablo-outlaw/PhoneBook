@extends('layout')


@section('mid')

<h1><a href="#">Kontakt</a></h1><br>

<img src="/slike/{{$imenikk->avatar}}" height="200" width="200" alt="">
<h2>{{$imenikk->ime}} {{$imenikk->prezime}}</h2>
<h4>{{$imenikk->broj}}</h4>
<a href="/imenikk/{{$imenikk->id}}/edit">Izmeni</a>
@endsection

@section('right')


@endsection


@section('left')

<h4><a href="/imenikk">
        < Kontakti </a> </h4> @endsection