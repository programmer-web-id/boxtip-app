<div class="container-fluid py-3 bg-light border-bottom">
    <h1>{{ $title }} List</h1>
    <div class="row my-3">
        <div class="col-md-11">
            <div class="row">
                <div class="col-5">
                    <div class="row">
                        <div class="col-2">
                            <span>Quick Filter 1</span>
                        </div>
                        <div class="col">
                            <select name="filter-field-1" class="form-select form-select-sm rounded-0"
                                id="filter-field-1">
                                <option selected disabled value="-1">Filter Field 1</option>
                                @foreach ($fields as $field)
                                    <option value="{{ $field }}" class="filter-option"></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Filter Input 1" id="filter-input-1"
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
                            <select name="filter-field-2" class="form-select form-select-sm rounded-0"
                                id="filter-field-2">
                                <option selected disabled value="-1">Filter Field 2</option>
                                @foreach ($fields as $field)
                                    <option value="{{ $field }}" class="filter-option"></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Filter Input 2" id="filter-input-2"
                                class="form-control form-control-sm rounded-0">
                        </div>
                    </div>
                </div>
                <div class="col-2 text-center">
                    <div class="row">
                        <div class="col-6"><button class="btn btn-sm btn-warning rounded-0 w-100"
                                id="btn-query">Query</button></div>
                        <div class="col-6"><button class="btn btn-sm btn-secondary rounded-0 w-100"
                                id="btn-reset-query">Reset</button>
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
                    <li><button class="dropdown-item" id="btn-export"
                            data-export="{{ $path . '/export/' }}">Export</button></li>
                    <li><button class="dropdown-item" id="btn-delete" data-delete="{{ $path }}">Delete</button>
                    </li>
                    <form action="{{ $path }}" method="POST" id="form-delete" class="d-none">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" id="btn-form-delete"></button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col-4">
                    <button class="btn btn-sm btn-primary w-100 rounded-0" id="btn-create">Create</button>
                </div>
            </div>
        </div>
    </div>
</div>
