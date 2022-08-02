@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white py-4">
            <div class="col-12 bg-success text-white text-center py-4">
                Twój API Token to:<br />
                <samp>{{ $token }} </samp><br /><br />
                Użyj go do połączenia się z API.
            </div>
        </div>
    </div>
@endsection
