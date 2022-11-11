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
                    <tr>
                        <td><input type="checkbox" class="check-row" data-id="{{ $customer->id }}"></td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->code }}</td>
                        <td>{{ $customer->old_code }}</td>
                        <td>{{ $customer->birth_date }}</td>
                        <td>
                            @if ($customer->is_male)
                                Male
                            @else
                                Female
                            @endif
                        </td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->province }}</td>
                        <td>{{ $customer->city }}</td>
                        <td>{{ $customer->district }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
