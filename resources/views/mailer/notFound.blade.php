@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row bg-white py-4">
            <div class="col-12 bg-danger text-white text-center py-4">Brak takiego maila. <a class="text-white" href="{{route('mailerList')}}">Kliknij aby wrócić</a></div>
        </div>
    </div>
@endsection
