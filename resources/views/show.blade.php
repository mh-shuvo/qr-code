<html lang="en">
<head>
<title>QR code generator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>
<main>
    <div class="container py-3">
        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
            <div class="col-md-12 p-sm-0">
                <div class="d-flex justify-content-between">
                    <div class="col-md-12 p-sm-0">
                        <div class="text-end mb-2 no-print">
                            <a class="btn btn-sm btn-success" href="{{route('print',[$member->code])}}">Print</a>
                        </div>
                        <div style="border: 1px solid rgb(222, 226, 230);">
                            <div class="row cert-header-print m-0 mt-2">
                                <div class="col-md-3 text-end d-none d-md-block d-print-inline-block">
                                    <img src="{{asset("/bd_logo.png")}}" width="70" />
                                </div>
                                <div class="col-md-6 text-center px-4 px-md-0">
                                    <p style="margin-bottom: 0px; margin-top: 18px; font-weight: bold;font-size: 24px;">
                                        Government of the People's Republic of Bangladesh
                                    </p>
                                    <p class="py-1" style="font-weight: bold;font-size: 24px;">
                                        Ministry of Health and Family Welfare
                                    </p>
                                </div>
                                <div class="col-md-3 text-start d-none d-md-block d-print-inline-block">
                                    <img src="{{asset("/Mujib_100_Logo.png")}}" width="100" />
                                </div>
                            </div>
                            <div class="text-center mt-2 mb-2 d-none">
                                <div style="font-size: 30px; color: green; font-weight: bold;">
                                    {!! QrCode::size(300)->generate(route('get-member-data',[$member->code])); !!}
                                </div>
                            </div>
                            @if(isset($page))
                            <div class="text-center mt-2 mb-2">
                                <h2 class="text-success fw-bold">Verification Successfull !</h2>
                                <h4 class="text-success">This Vaccination Certificate is Valid.</h4>
                            </div>
                            @endif
                        </div>
                        <div style="border: 1px solid rgb(222, 226, 230);" class="py-2">
                            <div class="row">
                                <div class="col-12 text-center fw-bold" style="font-size: 20px;">
                                    <h2> COVID-19 Vaccination Certificate</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row m-0">
                                <div class="col-md-5 col-print-sm p-0">
                                    <div class="text-center p-2" style="text-align: center; background-color: rgb(238, 238, 238); font-size: 14px; font-weight: bold; border: 1px solid rgb(222, 226, 230);">
                                        Beneficiary Details (???????????? ?????????????????????????????? ???????????????)
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Certificate No:<br />
                                                ????????????????????????????????? ??????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                BD{{$member->birth_certificate_no}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                NID Number:<br />
                                                ??????????????? ??????????????????????????? ??????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->nid) ? $member->nid : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Passport No:<br />
                                                ???????????????????????? ??????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->nid) ? $member->passport : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Country/Nationality:<br />
                                                ?????????/?????????????????????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{$member->nationality}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Name:<br />
                                                ?????????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{$member->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Date of Birth:<br />
                                                ???????????? ???????????????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{$member->dob}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Gender:<br />
                                                ???????????????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; text-transform: capitalize;">
                                                {{ucfirst($member->gender)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-print-md p-0">
                                    <div class="text-center p-2" style="text-align: center; background-color: rgb(238, 238, 238); font-size: 14px; font-weight: bold; border: 1px solid rgb(222, 226, 230);">
                                        Vaccination Details (???????????? ???????????????????????? ???????????????)
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Date of Vaccination (Dose 1):<br />
                                                ???????????? ???????????????????????? ??????????????? (????????? ???):
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->date_of_dose_1) ? $member->date_of_dose_1 : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Name of Vaccine (Dose 1):<br />
                                                ??????????????? ????????? (????????? ???):
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->name_of_dose_1) ? $member->name_of_dose_1 : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Date of Vaccination (Dose 2):<br />
                                                ???????????? ???????????????????????? ??????????????? (????????? ???):
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->date_of_dose_2) ? $member->date_of_dose_2 : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Name of Vaccine (Dose 2):<br />
                                                ??????????????? ????????? (????????? ???):
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->name_of_dose_2) ? $member->name_of_dose_2 : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Vaccination Center:<br />
                                                ???????????? ???????????????????????? ?????????????????????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->vaccination_center) ? $member->vaccination_center : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Vaccinated By:<br />
                                                ???????????? ??????????????????????????????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->vaccinated_by) ? $member->vaccinated_by : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-p-50" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                Total Doses Given:<br />
                                                ????????? ????????? ??????????????????:
                                            </div>
                                        </div>
                                        <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                            <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                {{!empty($member->total_dose) ? $member->total_dose : "N/A"}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2" style="text-align: center; border: 1px solid rgb(222, 226, 230);">
                            For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd <br />
                            (???????????????????????? www.dghs.gov.bd ??????????????? ??????????????? ??????????????? ???????????? ???????????? ??????????????? ??????????????? info@dghs.gov.bd)
                        </div>
                        <div class="text-center p-2" style="text-align: center; background-color: rgb(238, 238, 238); font-size: 14px; font-weight: bold; border: 1px solid rgb(222, 226, 230);">
                            In Cooperation With
                        </div>
                        <div class="text-center p-2 mb-3 footer-cert-verify-img" style="border: 1px solid rgb(222, 226, 230);">
                            <img src="{{asset('/footer.png')}}" alt="ict logo" style="max-width: 80%; height: 100px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
