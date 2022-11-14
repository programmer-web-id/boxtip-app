@extends('layouts.app')
@section('content')
    @include('components.control_panel')
    <div class="container-fluid">
        <table class="table table-sm table-hover my-2 table-bordered w-100" style="font-size: 0.8rem">
            <thead>
                <tr>
                    <th width="10"><input type="checkbox" id="check-all"></th>
                    <th>Voucher Code</th>
                    <th>Customer</th>
                    <th>Issued Date</th>
                    <th>Used Date</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vouchers as $voucher)
                    <tr class="data-row" data-id="{{ $voucher->id }}" data-redirect="/voucher/{{ $voucher->id }}">
                        <td><input type="checkbox" class="check-row"></td>
                        <td class="data-column" data-column="voucher_code">{{ $voucher->voucher_code }}</td>
                        <td class="data-column" data-column="res_partner_id">
                            {{-- {{ dd($voucher->resPartners) }} --}}
                            @php
                                $row = 1;
                            @endphp
                            @foreach ($voucher->resPartners as $partner)
                                @if ($row > 1)
                                    <br />
                                @endif
                                {{ $partner->code . '-' . $partner->name }}
                                @php
                                    $row += 1;
                                @endphp
                            @endforeach
                        </td>
                        <td class="data-column" data-column="issued_date">{{ $voucher->issued_date }}</td>
                        <td class="data-column" data-column="used_date">{{ $voucher->used_date }}</td>
                        <td class="data-column" data-column="remarks">{{ $voucher->remarks }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
