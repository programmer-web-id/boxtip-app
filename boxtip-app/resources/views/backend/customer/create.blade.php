@extends('layouts.form')
@section('form')
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
                            <input class="form-check-input" type="radio" name="is_new_to_taobao" id="input-new-user"
                                value="1" checked @checked(old('is_new_to_taobao'))>
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
                    <label for="input-regular-bought-product" class="form-label fw-bold">Kategori produk apa yang ingin
                        anda impor?</label>
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
@endsection
