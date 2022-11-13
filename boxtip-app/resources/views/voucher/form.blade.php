@extends('layouts.form')
@section('form')
    @if (!$data)
        {{-- //create --}}
        <form method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="input-code" class="col-sm-4 col-form-label fw-bold">Customer Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-code" name="code">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-old-code" class="col-sm-4 col-form-label fw-bold">Old Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-old-code" name="old_code">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-name" class="col-sm-4 col-form-label fw-bold">Customer Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-name" name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-birth-date" class="col-sm-4 col-form-label fw-bold">Birth Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="input-birth-date" name="birth_date">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-gender" class="col-sm-4 col-form-label fw-bold">Gender</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="input-gender-male"
                                    value="1" checked>
                                <label class="form-check-label" for="input-gender-male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="input-gender-female"
                                    value="0">
                                <label class="form-check-label" for="input-gender-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-email" class="col-sm-4 col-form-label fw-bold">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="input-email" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-phone" class="col-sm-4 col-form-label fw-bold">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-phone" name="phone">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-province" class="col-sm-4 col-form-label fw-bold">Province</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-province" name="province">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-city" class="col-sm-4 col-form-label fw-bold">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-city" name="city">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-district" class="col-sm-4 col-form-label fw-bold">District</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-district" name="district">
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
                                    id="input-new-user" value="1" checked>
                                <label class="form-check-label" for="input-new-user">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_new_to_taobao"
                                    id="input-not-new-user" value="0">
                                <label class="form-check-label" for="input-not-new-user">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input-regular-bought-product" class="form-label fw-bold">Produk apa saja yang biasanya
                            dibeli
                            dari
                            Taobao?</label>
                        <select class="form-select" id="input-regular-bought-product" name="regular_bought_product">
                            <option selected>Select Category</option>
                            <option value="Books">Books</option>
                            <option value="Kitchenwares">Kitchenwares</option>
                            <option value="Eletronics">Eletronics</option>
                            <option value="Baby and Kids">Baby and Kids</option>
                            <option value="Men Fashions">Men Fashions</option>
                            <option value="Women Fashions">Women Fashions</option>
                            <option value="Moms">Moms</option>
                            <option value="Cosmetics">Cosmetics</option>
                            <option value="Homewares">Homewares</option>
                            <option value="F&B">F&B</option>
                            <option value="Stationeries">Stationeries</option>
                            <option value="Sports">Sports</option>
                            <option value="Automotives">Automotives</option>
                            <option value="Pet Needs">Pet Needs</option>
                            <option value="Tools">Tools</option>
                            <option value="Others">Others</option>
                            <option value="Phone Stuff">Phone Stuff</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input-import-consideration" class="form-label fw-bold">Apa yang menjadi pertimbangan
                            ketika
                            memilih Jastip ataupun Jasa Import dari China?</label>
                        <select class="form-select" id="input-import-consideration" name="service_consideration">
                            <option selected>Select One</option>
                            <option value="Ongkos Kirim">Ongkos Kirim</option>
                            <option value="Pelayanan Admin">Pelayanan Admin</option>
                            <option value="Tracking Status">Tracking Status</option>
                            <option value="Kejelasan Daftar Belanja">Kejelasan Daftar Belanja</option>
                            <option value="Kecepatan Pengiriman">Kecepatan Pengiriman</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-none" id="btn-submit">Submit</button>
        </form>
    @else
        {{-- //existing --}}
        @if ($view_mode == 'edit')
            {{-- edit mode --}}
            <form method="PUT" action="/customer/{{ $data->id }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 row">
                            <label for="input-code" class="col-sm-4 col-form-label fw-bold">Customer Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-code" name="code"
                                    value={{ old('code', $data->code) }} required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-old-code" class="col-sm-4 col-form-label fw-bold">Old Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-old-code" name="old_code"
                                    value={{ old('old_code', $data->old_code) }} required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-sm-4 col-form-label fw-bold">Customer Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-name" name="name"
                                    value={{ old('name', $data->name) }} required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-birth-date" class="col-sm-4 col-form-label fw-bold">Birth Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="input-birth-date" name="birth_date"
                                    value={{ old('birth_date', $data->birth_date) }} required>
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
                                    value={{ old('email', $data->email) }}>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-phone" class="col-sm-4 col-form-label fw-bold">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-phone" name="phone"
                                    value={{ old('phone', $data->phone) }}>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-province" class="col-sm-4 col-form-label fw-bold">Province</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-province" name="province"
                                    value={{ old('province', $data->province) }}>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-city" class="col-sm-4 col-form-label fw-bold">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-city" name="city"
                                    value={{ old('city', $data->city) }}>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-district" class="col-sm-4 col-form-label fw-bold">District</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input-district" name="district"
                                    value={{ old('district', $data->district) }}>
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
                                <option selected>Select Category</option>
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
                                <option selected>Select One</option>
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
