<?php

use App\User;

$user_id = auth()->user()->id;
?>

@extends('layout')

@section('mid')

<a href="#">
    <h1>Napravi Kontakt</h1>
</a>

<form method="POST" action="/imenikk" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="container text-center">
        <label for="ime">Ime</label>
        <input type="text" class="form-control text-center" name="ime" placeholder="Ime">
        <label for="prezime">Prezime</label>
        <input type="text" class="form-control text-center" name="prezime" placeholder="Prezime">
        <label for="broj">Broj</label>
        <input type="text" class="form-control text-center" name="broj" placeholder="Broj">
        <br>
        <input type="file" name="avatar" accept="image/*" id="avatar">
        <br>
        <input type="hidden" name="user_id" value='{{$user_id}}'>

        <button type="submit" class="btn btn-primary">Dodaj


    </div>
</form>


@endsection



@section('left')

<h4><a href="/imenikk">
        < Kontakti </a> </h4> @endsection