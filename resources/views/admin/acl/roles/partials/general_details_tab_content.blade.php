<?php $readonly = ($role->isEditable()) ? '' : 'readonly'; ?>
<fieldset class="form-group">
    {!! Form::label('name', trans($trans_path. 'general.columns.name') ) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.name'), $readonly]) !!}
</fieldset>
<fieldset class="form-group">
    {!! Form::label('display_name', trans($trans_path. 'general.columns.display_name') ) !!}
    {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.display_name'), $readonly]) !!}
</fieldset>
<fieldset class="form-group">
    {!! Form::label('description', trans($trans_path. 'general.columns.description') ) !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder'=>trans($trans_path . 'general.columns.description'), $readonly]) !!}
</fieldset>