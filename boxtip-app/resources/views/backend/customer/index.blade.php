@extends('layouts.app')
@section('content')
    @include('components.control_panel')
    <div class="container-fluid">
        <table class="table table-sm table-hover my-2 table-bordered w-100" style="font-size: 0.8rem">
            <thead>
                <tr>
                    <th width="10"><input type="checkbox" id="check-all"></th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Old Code</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Province</th>
                    <th>City</th>
                    <th>District</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr class="data-row" data-id="{{ $customer->id }}" data-redirect="/customer/{{ $customer->id }}">
                        <td><input type="checkbox" class="check-row"></td>
                        <td class="data-column" data-column="name">{{ $customer->name }}</td>
                        <td class="data-column" data-column="code">{{ $customer->code }}</td>
                        <td class="data-column" data-column="old_code">{{ $customer->old_code }}</td>
                        <td class="data-column" data-column="birth_date">{{ $customer->birth_date }}</td>
                        <td class="data-column" data-column="is_male">{{ $customer->is_male ? 'Male' : 'Female' }}</td>
                        <td class="data-column" data-column="email">{{ $customer->email }}</td>
                        <td class="data-column" data-column="phone">{{ $customer->phone }}</td>
                        <td class="data-column" data-column="province">{{ $customer->province }}</td>
                        <td class="data-column" data-column="city">{{ $customer->city }}</td>
                        <td class="data-column" data-column="district">{{ $customer->district }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
