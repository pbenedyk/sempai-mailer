<div class="alert-fixed">
    @if ($message = Session::get('success'))
        <div class="m-0 rounded-0 alert alert-success alert-block">
            
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="m-0 rounded-0 alert alert-danger alert-block">
            
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div class="m-0 rounded-0 alert alert-warning alert-block">
            
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('info'))
        <div class="m-0 rounded-0 alert alert-info alert-block">
            
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="m-0 rounded-0 alert alert-danger">
            
            <strong>Błąd:</strong> {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif
</div>
