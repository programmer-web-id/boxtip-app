<div class="container-fluid py-5 bg-light border-bottom">
    <div class="row mb-4">
        <div class="col-md-11">
            <div class="row">
                <div class="col-5">
                    <div class="row">
                        <div class="col-2">
                            <span>Quick Filter 1</span>
                        </div>
                        <div class="col">
                            <select name="filterField1" class="form-select form-select-sm rounded-0" id="filterField1">
                                <option value="-1">Filter Field 1</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Filter Input 1"
                                class="form-control form-control-sm rounded-0">
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-2">
                            <span>Quick Filter 2</span>
                        </div>
                        <div class="col">
                            <select name="filterField2" class="form-select form-select-sm rounded-0" id="filterField2">
                                <option value="-1">Filter Field 2</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Filter Input 2"
                                class="form-control form-control-sm rounded-0">
                        </div>
                    </div>
                </div>
                <div class="col-2 text-center">
                    <div class="row">
                        <div class="col-6"><button class="btn btn-sm btn-warning rounded-0 w-100">Query</button></div>
                        <div class="col-6"><button class="btn btn-sm btn-secondary rounded-0 w-100">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="btn-group w-100">
                <button class="btn btn-secondary btn-sm dropdown-toggle rounded-0" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Export</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col">
                    <button class="btn btn-sm btn-primary w-100 rounded-0" id="btn-create">Create</button>
                </div>
                <div class="col">
                    <button class="btn btn-sm btn-primary w-100 rounded-0" id="btn-edit">Edit</button>
                </div>
                <div class="col">
                    <button class="btn btn-sm btn-secondary w-100 rounded-0" id="btn-discard">Discard</button>
                </div>
            </div>
        </div>
    </div>
</div>
