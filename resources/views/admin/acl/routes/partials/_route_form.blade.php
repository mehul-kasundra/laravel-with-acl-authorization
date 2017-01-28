<fieldset class="form-group">
    {!! Form::label('method', trans($trans_path.'general.columns.method')) !!}
    {!! Form::text('method', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.method')]) !!}
</fieldset>
<fieldset class="form-group">
    {!! Form::label('path', trans($trans_path.'general.columns.path')) !!}
    {!! Form::text('path', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.path')]) !!}
</fieldset>
<fieldset class="form-group">
    {!! Form::label('name', trans($trans_path.'general.columns.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.name')]) !!}
</fieldset>
<fieldset class="form-group">
    {!! Form::label('action_name', trans($trans_path.'general.columns.action_name')) !!}
    {!! Form::text('action_name', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.action_name')]) !!}
</fieldset>