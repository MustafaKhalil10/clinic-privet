@extends('layout.dashboard')

@section('title')
    appointments
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">appointments</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
      <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
         <input type="number" name="id" class="form-control mx-2 mt-3 ml-4" placeholder="Appointments ID">
         <input type="text" name="patient_name" class="form-control mx-2 mt-3 ml-4" placeholder="Patient Name">
        <button type="submit" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-4">Sersh</button>
    </form>
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
                                <h2 class="ml-lg-2">appointments Schedule</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="{{ route('patients.create') }}" class="btn btn-success" data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add a appointments</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Appointment_ID</th>
                                <th>Patient_Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Review_Type</th>
                                <th>Status</th>
                                <th>Status_Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->appointment_time }}</td>
                                    <td>{{ $appointment->review_type }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    <td>
                                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="edit"
                                            data-toggle="modal">
                                            <i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
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

            <!----add-modal start--------->
            <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Employees</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="emil" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <!----edit-modal end--------->
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
