@extends('layouts.form')
@section('form')
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
@endsection
