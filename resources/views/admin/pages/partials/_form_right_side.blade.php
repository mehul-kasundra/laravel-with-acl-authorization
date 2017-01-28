<div class="col-md-3">
    <div class="card-block">
        <div class="form-design1">
            <p class="m-b-0">
                <label for="text">Enable / Disable</label>
            </p>
            <div class="btn-group radioButton">
                <input name="status" type="checkbox" data-on-color="success" data-off-color="danger"
                        {{((isset($page['status']) && $page['status'] == 1)
                            || !isset($page['status'])) ?'checked':''}}>
            </div>
        </div>
    </div>
</div>
