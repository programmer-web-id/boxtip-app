<div class="container-fluid py-3 bg-light border-bottom">
    <div class="row mb-3">
        <div class="col">
            <button class="btn btn-link nav-link link-primary px-0" id="btn-back"><i
                    class="bi bi-arrow-left-circle-fill"></i> {{ $title }} List</button>
            <h1>{{ isset($header) ? $header : 'New' }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="row">
                @if ($view_mode == 'read')
                    <div class="col-4">
                        <button class="btn btn-sm btn-warning rounded-0 w-100" id="btn-edit">Edit</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-sm btn-outline-secondary rounded-0 w-100" id="btn-create">Create</button>
                    </div>
                @else
                    <div class="col-4">
                        <button class="btn btn-sm btn-warning rounded-0 w-100" id="btn-save">Save</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-sm btn-outline-secondary rounded-0 w-100"
                            id="btn-discard">Discard</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
