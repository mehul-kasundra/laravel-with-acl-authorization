<div class="form-inline">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <label class="form-check-label">
                    <input name="checkbox[]" type="checkbox" class="form-check-input" value="{{$page->id}}">
                </label>
            </div>
            <div class="input-group-btn">
                <div class="dropdown">
                    <a href="#" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons" style="top: 0">keyboard_arrow_down</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a class="dropdown-item" href="{{route('admin.page.edit', $page->id)}}"
                           title="{{trans($trans_path . 'general.action.edit')}}">
                            <i class="material-icons md-18 mr10">edit</i> {{trans('general.button.edit')}}
                        </a>

                        <a class="dropdown-item enableDisable" href="{{route('admin.page.' . ($page->status == 1?'disable':'enable'), $page->id)}}"
                           title="{{trans($trans_path.'general.action.enable_disable')}}">
                            <i class="material-icons md-18 mr10">{{($page->status == 1 ? 'block': 'check_circle')}}</i>
                            {{($page->status == 1? trans('general.button.disable'):trans('general.button.enable'))}}
                        </a>

                        <a class="dropdown-item try-sweet-warningConfirm" href="#" id="{{$page->id}}" title="{{trans('general.button.delete')}}">
                            <i class="material-icons text-danger md-18 mr10">delete</i> {{trans('general.button.delete')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>