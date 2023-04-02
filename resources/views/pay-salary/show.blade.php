@extends('dashboard.body.main')

@section('specificpagestyles')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            @if (session()->has('success'))
                <div class="alert text-white bg-success" role="alert">
                    <div class="iq-alert-text">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif
            @if (session()->has('warning'))
                <div class="alert text-white bg-warning" role="alert">
                    <div class="iq-alert-text">{{ session('warning') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pay Salary</h4>
                    </div>
                </div>

                <div class="card-body">
                    <!-- begin: Input Data -->
                    <div class=" row align-items-center">

                        <div class="form-group col-md-1">
                            <label for="name_employee">Name Employee <span class="text-danger">*</span></label>
                            {{-- <input type="text" class="form-control" id="name_employee" name="name_employee" value="{{ $paySalary->employee->name }}" required> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="datepicker">Date <span class="text-danger">*</span></label>
                            <input id="datepicker" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $paySalary->date) }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="advance_salary">Advance Salary <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('advance_salary') is-invalid @enderror" id="advance_salary" name="advance_salary" value="{{ $paySalary->advance_salary }}" required>
                        </div>
                    </div>
                    <!-- end: Input Data -->
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <a class="btn bg-danger" href="{{ route('pay-salary.index') }}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        // https://gijgo.com/datetimepicker/configuration/format
    });
</script>
@endsection