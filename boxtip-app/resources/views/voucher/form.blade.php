@extends('layouts.form')
@section('form')
    @if (!$data)
        {{-- //create --}}
        <form method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="input-voucher-code" class="col-sm-4 col-form-label fw-bold">Voucher Code</label>
                        <div class="col-sm-8 d-flex align-items-center">
                            New Code
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-type" class="col-sm-4 col-form-label fw-bold">Voucher Type</label>
                        <div class="col-sm-8 d-flex align-items-center">
                            <select class="form-select" name="type" id="input-type">
                                <option value="general">General</option>
                                <option value="personal">Personal</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-issued-date" class="col-sm-4 col-form-label fw-bold">Issued Date</label>
                        <div class="col-sm-8 d-flex align-items-center">
                            {{ now() }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-expired-date" class="col-sm-4 col-form-label fw-bold">Expired Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="input-expired-date" name="expired_date"
                                value="{{ old('expired_date') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-used-date" class="col-sm-4 col-form-label fw-bold">Used Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="input-used-date" name="used_date"
                                value="{{ old('used_date') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label fw-bold">Customers</label>
                        <div class="col-sm-8 py-2">
                            <input type="text" class="form-control form-control-sm" placeholder="Search here.."
                                id="customer-search">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check-all">
                                <label class="form-check-label" for="check-all">
                                    Check all
                                </label>
                            </div>
                            <div class="ps-4" style="max-height: 200px; overflow-y:auto;">
                                @foreach ($customer_ids as $customer_id)
                                    <div class="form-check customer-row">
                                        <input class="form-check-input check-row" type="checkbox"
                                            value="{{ $customer_id->id }}"
                                            id="{{ 'input-customer-ids-' . $customer_id->id }}" name="customer_ids[]"
                                            @checked(old('customer_ids') ? in_array($customer_id->id, old('customer_ids')) : false)>
                                        <label class="form-check-label"
                                            for="{{ 'input-customer-ids-' . $customer_id->id }}">
                                            {{ $customer_id->code . '-' . $customer_id->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="input-remarks" class="form-label fw-bold">Remarks</label>
                        <textarea class="form-control" id="input-remarks" name="remarks" rows="4">{{ old('remarks') }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-none" id="btn-submit">Submit</button>
        </form>
    @else
        {{-- //existing --}}
        @if ($view_mode == 'edit')
            {{-- edit mode --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/voucher/{{ $data->id }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <label for="input-voucher-code" class="col-sm-4 col-form-label fw-bold">Voucher Code</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->voucher_code }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-type" class="col-sm-4 col-form-label fw-bold">Voucher Type</label>
                            <div class="col-sm-8 d-flex align-items-center text-capitalize">
                                {{ $data->type }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-issued-date" class="col-sm-4 col-form-label fw-bold">Issued
                                Date</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->issued_date }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-expired-date" class="col-sm-4 col-form-label fw-bold">Expired
                                Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="input-expired-date" name="expired_date"
                                    value="{{ old('expired_date', $data->expired_date) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-used-date" class="col-sm-4 col-form-label fw-bold">Used Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="input-used-date" name="used_date"
                                    value="{{ old('used_date', $data->used_date) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Customers</label>
                            <div class="col-sm-8 py-2">
                                <input type="text" class="form-control form-control-sm" placeholder="Search here.."
                                    id="customer-search">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check-all">
                                    <label class="form-check-label" for="check-all">
                                        Check all
                                    </label>
                                </div>
                                <div class="ps-4" style="max-height: 200px; overflow-y:auto;">
                                    {{-- {{ dd($rel_customer_ids) }} --}}
                                    @foreach ($customer_ids as $customer_id)
                                        <div class="form-check customer-row">
                                            <input class="form-check-input check-row" type="checkbox"
                                                value="{{ $customer_id->id }}"
                                                id="{{ 'input-customer-ids-' . $customer_id->id }}" name="customer_ids[]"
                                                {{ (old('customer_ids') ? (in_array($customer_id->id, old('customer_ids')) || in_array($customer_id->id, $rel_customer_ids) ? 'checked' : '') : in_array($customer_id->id, $rel_customer_ids)) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="{{ 'input-customer-ids-' . $customer_id->id }}">
                                                {{ $customer_id->code . '-' . $customer_id->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="input-remarks" class="form-label fw-bold">Remarks</label>
                            <textarea class="form-control" id="input-remarks" name="remarks" rows="4">{{ old('remarks', $data->remarks) }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-none" id="btn-submit">Submit</button>
            </form>
        @else
            {{-- read mode --}}
            <form>
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <label for="input-voucher-code" class="col-sm-4 col-form-label fw-bold">Voucher Code</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->voucher_code }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-type" class="col-sm-4 col-form-label fw-bold">Voucher Type</label>
                            <div class="col-sm-8 d-flex align-items-center text-capitalize">
                                {{ $data->type }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-issued-date" class="col-sm-4 col-form-label fw-bold">Issued Date</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->issued_date }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-expired-date" class="col-sm-4 col-form-label fw-bold">Expired Date</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->expired_date }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-used-date" class="col-sm-4 col-form-label fw-bold">Used Date</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->used_date ? $data->used_date : 'Not Used' }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Customers</label>
                            <div class="col-sm-8 py-2">
                                <div class="" style="max-height: 200px; overflow-y:auto;">
                                    @if ($data->resPartners->count() > 0)
                                        @php
                                            $row = 1;
                                        @endphp
                                        @foreach ($data->resPartners as $partner)
                                            @if ($row > 1)
                                                <br />
                                            @endif
                                            {{ $partner->code . '-' . $partner->name }}
                                            @php
                                                $row += 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="input-remarks" class="form-label fw-bold">Remarks</label>
                            <div>
                                {{ $data->remarks }}
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-none" id="btn-submit">Submit</button>
            </form>
        @endif
    @endif
@endsection
