@extends('layouts.app')

@section('content')
    @include('layouts.confirmModal')
    <div class="container">
        <div class="row bg-white py-4">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Send To') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th class="text-center"><a href="/mailer/add" class="btn btn-sm btn-success">+
                                    {{ __('Add') }}</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mailerItems->count() > 0)
                            @foreach ($mailerItems as $mi)
                                <tr>
                                    <td>{{ $mi->id }}</td>
                                    <td>{{ $mi->send_to }}</td>
                                    <td>{{ $mi->title }}</td>
                                    <td>{{ $mi->send_date }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('mailerShow', [$mi->id]) }}"
                                            class="btn btn-sm btn-secondary">{{ __('Show') }}</a>
                                        <a class="btn btn-sm btn-danger deleteRow"
                                            data-id="{{ $mi->id }}">{{ __('Remove') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    {{ __('No e-mails') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
