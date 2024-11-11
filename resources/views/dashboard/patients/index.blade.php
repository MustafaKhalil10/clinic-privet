@extends('layout.dashboard')

@section('title')
    patients
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">patients</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <!------ Sersh ------->
    {{-- <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <select name="status" id="" class="form-control mx-2 mt-3 ml-4">
            <option value="active">active</option>
            <option value="inactive">inactive</option>
        </select>
        <button type="submit" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-4">Sersh</button>
    </form> --}}
    <!------ End Sersh ------->

    <x-alert type="success" />
    <x-alert type="info" />

    <!------main-content-start----------->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Patients Schedule</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="{{ route('patients.create') }}" class="btn btn-success" data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add a patient</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Patient_Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->date_of_birth }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>
                                        <a href="{{ route('patients.edit', $patient->id) }}" class="edit"
                                            data-toggle="modal">
                                            <i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete" data-toggle="modal"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('styles')
    <style>
        .thead {
            background: rgba(134, 134, 134, 0.982);
            color: #fff;
            font-size: 30px;
        }
        .delete{
            border: none;
        }
        .edit{
            color: #eabb00;
        }
    </style>
@endpush

@push('scripts')
@endpush
