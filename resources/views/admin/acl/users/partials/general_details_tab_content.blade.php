<div class="card-group">
    <div class="card">
        <div class="card-block">

            <fieldset class="form-group">
                {!! Form::label('first_name', trans($trans_path.'general.columns.first_name')) !!}
                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.first_name')]) !!}
            </fieldset>
            <fieldset class="form-group">
                {!! Form::label('last_name', trans($trans_path.'general.columns.last_name')) !!}
                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.last_name')]) !!}
            </fieldset>

        </div>
    </div>
    <div class="card">
        <div class="card-block">

            <div class="form-group row">
                <label for="username"
                       class="col-sm-3 form-control-label">{{ trans($trans_path.'general.columns.username') }}</label>
                <div class="col-sm-9">
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.username')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="email"
                       class="col-sm-3 form-control-label">{{ trans($trans_path.'general.columns.email') }}</label>
                <div class="col-sm-9">
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.email')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="password"
                       class="col-sm-3 form-control-label">{{ trans($trans_path.'general.columns.password') }}</label>
                <div class="col-sm-9">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.password')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation"
                       class="col-sm-3 form-control-label">{{ trans($trans_path.'general.columns.password_confirmation') }}</label>
                <div class="col-sm-9">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.password_confirmation')]) !!}
                </div>
            </div>


        </div>
    </div>
</div>