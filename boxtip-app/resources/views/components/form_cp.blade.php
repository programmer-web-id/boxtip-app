<div class="container-fluid py-3 bg-light border-bottom">
    <div class="row mb-3">
        <div class="col">
            <h1>{{ $data->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 d-flex justify-content-between">
            @if ($view_mode == 'read')
                <button class="btn btn-sm btn-primary rounded-0" style="width: 47.5%;" id="btn-create">Create</button>
                <button class="btn btn-sm btn-outline-warning rounded-0" style="width: 47.5%;"
                    id="btn-edit">Edit</button>
            @else
                <button class="btn btn-sm btn-primary rounded-0" style="width: 47.5%;" id="btn-save">Save</button>
                <button class="btn btn-sm btn-secondary rounded-0" style="width: 47.5%;"
                    id="btn-discard">Discard</button>
            @endif
        </div>
    </div>
</div>
