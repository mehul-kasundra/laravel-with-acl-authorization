@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p class="row center"><small>{{ $error }}</small></p>
        @endforeach
    </div>
@endif
