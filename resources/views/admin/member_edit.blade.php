@extends('layouts.admin')
@section('title','File Submission Edit')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
@endsection
@section('content')
    <div class="py-2">
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="alert alert-danger alert-dismissible pb-2" role="alert">
                {{\Illuminate\Support\Facades\Session::get('error')}}
            </div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success alert-dismissible pb-2" role="alert">
                {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{route('member_update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$member->id}}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <h3 class="text-left pb-2">Beneficiary Information</h3>
                                    <div class="col-sm-12 pt-3">
                                        <label for="birth_certificate_no">Birth Certificate No <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="birth_certificate_no" name="birth_certificate_no" placeholder="Birth Certificate No" value="{{$member->birth_certificate_no}}">
                                        @error('birth_certificate_no')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="nid">National ID</label>
                                        <input type="text" class="form-control" id="nid" name="nid" placeholder="National ID" value="{{$member->nid}}">
                                        @error('nid')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="passport">Passport No</label>
                                        <input type="text" class="form-control" id="passport" name="passport" placeholder="Passport No" value="{{$member->passport}}">
                                        @error('passport')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="nationality">Nationality <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" readonly value="Bangladeshi">
                                        @error('nationality')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{$member->name}}">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="name">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="Select Your Date of Birth" value="{{$member->dob}}">
                                        @error('dob')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{$member->gender == 'male' ? 'selected':''}}>Male</option>
                                            <option value="female" {{$member->gender == 'female' ? 'selected':''}}>Female</option>
                                            <option value="other" {{$member->gender == 'other' ? 'selected':''}}>Other</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <h3 class="text-left pb-2">Vaccination Details</h3>
                                    <div class="col-sm-12 pt-3">
                                        <label for="date_of_dose_1">Date of Vaccination (Dose 1)</label>
                                        <input type="text" class="form-control datepicker" id="date_of_dose_1" name="date_of_dose_1" placeholder="Date of Vaccination (Dose 1)" value="{{$member->date_of_dose_1}}">
                                        @error('date_of_dose_1')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <div class="col-sm-12 pt-3">
                                            <label for="name_of_dose_1">Name of Vaccine (Dose 1)</label>
                                            <select name="name_of_dose_1" id="name_of_dose_1" class="form-control changeVaccine">
                                                <option value="">Select One</option>
                                                <option {{$member->name_of_dose_1 == \App\Models\Member::VACCINE_NAME_1 ? 'selected':''}} value="{{\App\Models\Member::VACCINE_NAME_1}}">{{\App\Models\Member::VACCINE_NAME_1}}</option>
                                                <option {{$member->name_of_dose_1 == \App\Models\Member::VACCINE_NAME_2 ? 'selected':''}} value="{{\App\Models\Member::VACCINE_NAME_2}}">{{\App\Models\Member::VACCINE_NAME_2}}</option>
                                                <option {{($member->name_of_dose_1 != \App\Models\Member::VACCINE_NAME_1 && $member->name_of_dose_1 != \App\Models\Member::VACCINE_NAME_2 && $member->name_of_dose_1 != null) ? 'selected':''}} value="{{\App\Models\Member::VACCINE_OTHER}}">{{\App\Models\Member::VACCINE_OTHER}}</option>
                                            </select>
                                            <input type="text" class="form-control {{($member->name_of_dose_1 == \App\Models\Member::VACCINE_NAME_1 || $member->name_of_dose_1 == \App\Models\Member::VACCINE_NAME_2 || $member->name_of_dose_1 == null) ? 'd-none':''}}" id="name_of_dose_1_other" name="name_of_dose_1_other" placeholder="Name of Vaccine (Dose 1)" value="{{$member->name_of_dose_1}}">
                                            @error('name_of_dose_1')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="date_of_dose_2">Date of Vaccination (Dose 2)</label>
                                        <input type="text" class="form-control datepicker" id="date_of_dose_2" name="date_of_dose_2" placeholder="Date of Vaccination (Dose 2)" value="{{$member->date_of_dose_2}}">
                                        @error('date_of_dose_2')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="name_of_dose_2">Name of Vaccine (Dose 2)</label>
                                        <select name="name_of_dose_2" id="name_of_dose_2" class="form-control changeVaccine">
                                            <option value="">Select One</option>
                                            <option {{$member->name_of_dose_2 == \App\Models\Member::VACCINE_NAME_1 ? 'selected':''}} value="{{\App\Models\Member::VACCINE_NAME_1}}">{{\App\Models\Member::VACCINE_NAME_1}}</option>
                                            <option {{$member->name_of_dose_2 == \App\Models\Member::VACCINE_NAME_2 ? 'selected':''}} value="{{\App\Models\Member::VACCINE_NAME_2}}">{{\App\Models\Member::VACCINE_NAME_2}}</option>
                                            <option {{($member->name_of_dose_2 != \App\Models\Member::VACCINE_NAME_1 && $member->name_of_dose_2 != \App\Models\Member::VACCINE_NAME_2 && $member->name_of_dose_2 != null) ? 'selected':''}} value="{{\App\Models\Member::VACCINE_OTHER}}">{{\App\Models\Member::VACCINE_OTHER}}</option>
                                        </select>
                                        <input type="text" class="form-control {{($member->name_of_dose_2 == \App\Models\Member::VACCINE_NAME_1 || $member->name_of_dose_2 == \App\Models\Member::VACCINE_NAME_2 || $member->name_of_dose_2 == null) ? 'd-none':''}}" id="name_of_dose_2_other" name="name_of_dose_2_other" placeholder="Name of Vaccine (Dose 2)" value="{{$member->name_of_dose_2}}">
                                        @error('name_of_dose_2')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="vaccination_center">Vaccination Center</label>
                                        <input type="text" class="form-control" id="vaccination_center" name="vaccination_center" placeholder="Vaccination Center" value="{{$member->vaccination_center}}">
                                        @error('vaccination_center')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="vaccinated_by">Vaccinated By</label>
                                        <input type="text" class="form-control" id="vaccinated_by" name="vaccinated_by" placeholder="Vaccinated By" readonly value="Directorate General of
Health Services (DGHS)">
                                        @error('vaccinated_by')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="total_dose">Total Doses Given</label>
                                        <input type="text" class="form-control" id="total_dose" name="total_dose" placeholder="Total Doses Given" value="{{$member->total_dose}}">
                                        @error('total_dose')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-4 col-sm-12 offset-md-4">
                                <center>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function () {
            $('.datepicker').datepicker({
                autoclose:true
            });
        });
        $(document).on('change','.changeVaccine',function () {
            let id = $(this).attr('id');
            let value = $(this).val() || 0;
            $("#"+id+"_other").addClass('d-none');

            if(value == "{{\App\Models\Member::VACCINE_OTHER}}"){
                $("#"+id+"_other").removeClass('d-none');
            }
        });

    </script>
@endsection
