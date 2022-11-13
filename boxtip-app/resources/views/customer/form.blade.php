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
                        <label for="input-code" class="col-sm-4 col-form-label fw-bold">Customer Code</label>
                        <div class="col-sm-8 d-flex align-items-center">
                            New Code
                            {{-- <input type="text" class="form-control" id="input-code" name="code"> --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-old-code" class="col-sm-4 col-form-label fw-bold">Old Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-old-code" name="old_code"
                                value="{{ old('old_code') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-name" class="col-sm-4 col-form-label fw-bold">Customer Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-name" name="name"
                                value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-birth-date" class="col-sm-4 col-form-label fw-bold">Birth Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="input-birth-date" name="birth_date"
                                value="{{ old('birth_date') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-gender" class="col-sm-4 col-form-label fw-bold">Gender</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_male" id="input-gender-male"
                                    value="1" checked @checked(old('is_male'))>
                                <label class="form-check-label" for="input-gender-male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_male" id="input-gender-female"
                                    value="0" @checked(!old('is_male') && old('is_male') != null)>
                                <label class="form-check-label" for="input-gender-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-email" class="col-sm-4 col-form-label fw-bold">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="input-email" name="email"
                                value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-phone" class="col-sm-4 col-form-label fw-bold">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-phone" name="phone"
                                value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-province" class="col-sm-4 col-form-label fw-bold">Province</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-province" name="province"
                                value="{{ old('province') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-city" class="col-sm-4 col-form-label fw-bold">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-city" name="city"
                                value="{{ old('city') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-district" class="col-sm-4 col-form-label fw-bold">District</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-district" name="district"
                                value="{{ old('district') }}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="input-new-user" class="form-label fw-bold">Apakah sebelumnya pernah berbelanja dari
                            Taobao?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_new_to_taobao"
                                    id="input-new-user" value="1" checked @checked(old('is_new_to_taobao'))>
                                <label class="form-check-label" for="input-new-user">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_new_to_taobao"
                                    id="input-not-new-user" value="0" @checked(!old('is_new_to_taobao') && old('is_new_to_taobao') != null)>
                                <label class="form-check-label" for="input-not-new-user">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input-regular-bought-product" class="form-label fw-bold">Produk apa saja yang biasanya
                            dibeli
                            dari
                            Taobao?</label>
                        <select class="form-select" id="input-regular-bought-product" name="regular_bought_product_id">
                            <option selected disabled>Select Category</option>
                            @foreach ($regular_bought_product_ids as $regular_bought_product_id)
                                <option value="{{ $regular_bought_product_id->id }}" @selected(old('regular_bought_product_id') == $regular_bought_product_id->id)>
                                    {{ $regular_bought_product_id->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input-import-consideration" class="form-label fw-bold">Apa yang menjadi pertimbangan
                            ketika
                            memilih Jastip ataupun Jasa Import dari China?</label>
                        <select class="form-select" id="input-import-consideration" name="service_consideration_id">
                            <option selected disabled>Select One</option>
                            @foreach ($service_consideration_ids as $service_consideration_id)
                                <option value="{{ $service_consideration_id->id }}" @selected(old('service_consideration_id') == $service_consideration_id->id)>
                                    {{ $service_consideration_id->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-none" id="btn-submit">Submit</button>
        </form>
        <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
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
            <form method="POST" action="/customer/{{ $data->id }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <label for="input-code" class="col-sm-4 col-form-label fw-bold">Customer Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-code" name="code"
                                    value="{{ old('code', $data->code) }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-old-code" class="col-sm-4 col-form-label fw-bold">Old Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-old-code" name="old_code"
                                    value="{{ old('old_code', $data->old_code) }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-sm-4 col-form-label fw-bold">Customer Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-name" name="name"
                                    value="{{ old('name', $data->name) }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-birth-date" class="col-sm-4 col-form-label fw-bold">Birth Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="input-birth-date" name="birth_date"
                                    value="{{ old('birth_date', $data->birth_date) }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-gender" class="col-sm-4 col-form-label fw-bold">Gender</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_male" id="input-gender-male"
                                        value="1" @checked(old('is_male', $data->is_male))>
                                    <label class="form-check-label" for="input-gender-male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_male"
                                        id="input-gender-female" value="0" @checked(old('is_male', !$data->is_male))>
                                    <label class="form-check-label" for="input-gender-female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-email" class="col-sm-4 col-form-label fw-bold">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="input-email" name="email"
                                    value="{{ old('email', $data->email) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-phone" class="col-sm-4 col-form-label fw-bold">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-phone" name="phone"
                                    value="{{ old('phone', $data->phone) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-province" class="col-sm-4 col-form-label fw-bold">Province</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-province" name="province"
                                    value="{{ old('province', $data->province) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-city" class="col-sm-4 col-form-label fw-bold">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-city" name="city"
                                    value="{{ old('city', $data->city) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-district" class="col-sm-4 col-form-label fw-bold">District</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-district" name="district"
                                    value="{{ old('district', $data->district) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="input-new-user" class="form-label fw-bold">
                                Apakah sebelumnya pernah berbelanja dari Taobao?
                            </label>
                            <div class="d-flex align-items-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_new_to_taobao"
                                        id="input-new-user" value="1" @checked(old('is_new_to_taobao', $data->is_new_to_taobao)) required>
                                    <label class="form-check-label" for="input-new-user">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_new_to_taobao"
                                        id="input-not-new-user" value="0" @checked(old('is_new_to_taobao', !$data->is_new_to_taobao)) required>
                                    <label class="form-check-label" for="input-not-new-user">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input-regular-bought-product-id" class="form-label fw-bold">
                                Produk apa saja yang biasanya dibeli dari Taobao?
                            </label>
                            <select class="form-select" id="input-regular-bought-product-id"
                                name="regular_bought_product_id" required>
                                <option selected disabled>Select Category</option>
                                @foreach ($regular_bought_product_ids as $regular_bought_product_id)
                                    <option value="{{ $regular_bought_product_id->id }}" @selected(old('regular_bought_product_id', $data->regular_bought_product_id) == $regular_bought_product_id->id)>
                                        {{ $regular_bought_product_id->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="input-service-consideration-id" class="form-label fw-bold">
                                Apa yang menjadi pertimbangan ketika memilih Jastip ataupun Jasa Import dari China?
                            </label>
                            <select class="form-select" id="input-service-consideration-id"
                                name="service_consideration_id">
                                <option selected disabled>Select One</option>
                                @foreach ($service_consideration_ids as $service_consideration_id)
                                    <option value="{{ $service_consideration_id->id }}" @selected(old('service_consideration_id', $data->service_consideration_id) == $service_consideration_id->id)>
                                        {{ $service_consideration_id->name }}
                                    </option>
                                @endforeach
                            </select>
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
                            <label for="input-code" class="col-sm-4 col-form-label fw-bold">Customer Code</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->code }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-old-code" class="col-sm-4 col-form-label fw-bold">Old Code</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->old_code }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-sm-4 col-form-label fw-bold">Customer Name</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->name }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-birth-date" class="col-sm-4 col-form-label fw-bold">Birth Date</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->birth_date }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-gender" class="col-sm-4 col-form-label fw-bold">Gender</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->is_male ? 'Male' : 'Female' }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-email" class="col-sm-4 col-form-label fw-bold">Email</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->email }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-phone" class="col-sm-4 col-form-label fw-bold">Phone</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->phone }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-province" class="col-sm-4 col-form-label fw-bold">Province</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->province }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-city" class="col-sm-4 col-form-label fw-bold">City</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->city }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-district" class="col-sm-4 col-form-label fw-bold">District</label>
                            <div class="col-sm-8 d-flex align-items-center">
                                {{ $data->district }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="input-new-user" class="form-label fw-bold">
                                Apakah sebelumnya pernah berbelanja dari Taobao?
                            </label>
                            <div>
                                {{ $data->is_new_to_taobao ? 'Yes' : 'No' }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input-regular-bought-product-id" class="form-label fw-bold">
                                Produk apa saja yang biasanya dibeli dari Taobao?
                            </label>
                            <div>
                                {{ $data->regularBoughtProduct->name }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input-service-consideration-id" class="form-label fw-bold">
                                Apa yang menjadi pertimbangan ketika memilih Jastip ataupun Jasa Import dari China?
                            </label>
                            <div>
                                {{ $data->serviceConsideration->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-none" id="btn-submit">Submit</button>
            </form>
        @endif
    @endif
@endsection
