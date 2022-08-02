@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row bg-white py-4">
            <form method="post" action="{{ route('mailerSave') }}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="form-group mt-2">
                    <label for="email">{{ __('Email')}}</label>
                    <input name="send_to" value="{{ old('send_to') }}" type="email" class="form-control" id="email">
                </div>
                <div class="form-group mt-2">
                    <label for="title">{{ __('Title')}}</label>
                    <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title">
                </div>
                <div class="form-group mt-2">
                    <label for="content">{{ __('Content')}}</label>
                    <textarea name="content" value="{{ old('content') }}"" class="form-control" id="content" rows="5"></textarea>
                </div>
                <div class="form-group mt-2 text-right">
                    <button type="submit" class="btn btn-primary float-right">{{ __('Send')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
