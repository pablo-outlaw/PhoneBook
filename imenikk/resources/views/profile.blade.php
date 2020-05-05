@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <form method="POST" action="/profile">

                        @method('PATCH')
                        @csrf
                        <div>

                            <label for="name">Ime:</label>

                            <input type="text" name="name" class="form-control text-center" placeholder="Name" value="{{$user->name}}">

                        </div>
                        <br>
                        <div>

                            <label for="adress">Adresa:</label>

                            <input type="text" name="adress" class="form-control text-center" placeholder="Adress" value="{{$user->adress}}">

                        </div>

                        <br>

                        <div class="text-center">

                            <button type="submit" class="btn btn-primary">Promeni</button>



                        </div>




                    </form>

                </div>
            </div>
            <div class="card">
                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBOafFXzDa3HMbqt_Xqqp7WSiZ4BOvrn2c&q={{$user->adress}}" width="700" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>
@endsection