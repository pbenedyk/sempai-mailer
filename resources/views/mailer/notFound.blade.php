@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white py-4">
            <div class="col-12 bg-danger text-white text-center py-4">{{ __('No email') }} <a class="text-white"
                    href="{{ route('mailerList') }}">{{ __('Click to back') }}</a></div>
        </div>
    </div>
@endsection
