<div class="checkbox">
    <!-- Trick to force cleared checkbox to being posted in form! It will be posted as zero unless checked then posted again as 1 and since only last one count! -->

    {!! '<input type="hidden" name="enabled" value="0">' !!}
    <label>
        {!! Form::checkbox('enabled', '1', $perm->enabled) !!} {!! trans('general.status.enabled') !!}
    </label>
</div>