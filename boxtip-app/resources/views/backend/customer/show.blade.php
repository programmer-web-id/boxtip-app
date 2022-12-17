@extends('layouts.form')
@section('form')
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
                    <label for="input-address" class="col-sm-4 col-form-label fw-bold">Address</label>
                    <div class="col-sm-8 d-flex align-items-center text-break">
                        {{ $data->address }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="input-province" class="col-sm-4 col-form-label fw-bold">Province</label>
                    <div class="col-sm-8 d-flex align-items-center">
                        {{ $data->province->name }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="input-city" class="col-sm-4 col-form-label fw-bold">City</label>
                    <div class="col-sm-8 d-flex align-items-center">
                        {{ $data->city->name }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="input-district" class="col-sm-4 col-form-label fw-bold">District</label>
                    <div class="col-sm-8 d-flex align-items-center">
                        {{ $data->district->name }}
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
                        Kategori produk apa yang ingin anda impor?
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
    @if (session('created'))
        <div class="data-created">
            <div class="data-description">
                <h2 class="fs-1 mb-4">Congratulations</h2>
                <h1 style="font-size: 3rem;">
                    {{ session('created')[1]->code . ' - ' . session('created')[1]->name }}
                </h1>
                <p class="fs-5">Akun anda sudah aktif dan bisa digunakan.<br />
                    Silahkan copy kode voucher dibawah untuk mendapatkan Promo Free Ongkir 1 kg</p>
                <div class="data-content border p-4 mb-5">
                    <h3 style="font-size: 4rem;">
                        {{ session('created')[2]->voucher_code }}
                    </h3>
                </div>
                <button class="btn btn-secondary float-end" id="btn-close-alert">Close</button>
            </div>
        </div>
    @endif
@endsection
