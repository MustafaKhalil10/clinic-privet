@extends('layout.dashboard')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">patients</a></li>
    <li class="breadcrumb-item active">{{ isset($patient) ? 'Edit' : 'Create' }}</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_edit_date-->
        <form action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }}"
            method="post">
            @csrf
            @if (isset($patient))
                @method('PUT')
            @endif

            <x-form.text name="name" type="text" label="Name"
                value="{{ isset($patient) ? $patient->name : '' }}" />

            <x-form.text name="email" type="email" label="Email"
                value="{{ isset($patient) ? $patient->email : '' }}" />

            <x-form.text name="phone" type="tel" label="Phone"
                value="{{ isset($patient) ? $patient->phone : '' }}" />

            <x-form.text name="date_of_birth" type="date" label="Date of birth"
                value="{{ isset($patient) ? $patient->date_of_birth : '' }}" />

            <x-form.select name="gender" :options="['male', 'faminine']"
                value="{{ isset($patient) ? $patient->gender : '' }}" />

            <x-form.text name="address" type="text" label="Address"
                value="{{ isset($patient) ? $patient->address : '' }}" />


            <button type="submit" class="btn btn-primary">{{ isset($patient) ? 'save edit' : 'save' }}</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
