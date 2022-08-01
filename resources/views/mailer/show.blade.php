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
                    <label for="email">Email</label>
                    <input value="{{ $mailerItem->send_to }}" type="email" class="form-control" id="email" disabled>
                </div>
                <div class="form-group mt-2">
                    <label for="title">Title</label>
                    <input value="{{ $mailerItem->title }}" type="text" class="form-control" id="title" disabled>
                </div>
                <div class="form-group mt-2">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="15" disabled>{{ $mailerItem->content }}</textarea>
                </div>
                <div class="form-group mt-2 text-right">
                    <a href="{{ route('mailerList') }}" class="btn btn-primary float-right">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
