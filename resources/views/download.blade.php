<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vaccine PDF</title>
    <style type="text/css">
        body{
            background: #fff;
            margin: 0px;
            font-family: 'nirmala, sans-serif';
        }
        .container{
            height: auto;
            border: 2px solid #EBEBEB;
        }
        .headerTable tr, .headerTable tr, .headerTable td{
            border: none;
        }
        .p-1{
            font-size: 15px;
            font-family: "Times New Roman", Times, serif;
        }
        .p-2{
            font-size: 15px;
            font-family: "Times New Roman", Times, serif;
        }
        /*qr start*/
        .qr{
            width: 30%;
            margin: 0px auto;
        }
        .qr img{
            display: block;
            width: 100%;
        }
        .text-center{
            text-align: center;
        }
        /*qr end*/
        /*header end*/

        /*main start*/
        /*main title start*/
        .main-title{
            text-align: center;
        }
        .main-title h1{
            margin: 10px 0px 10px 0px;
            font-size: 20px;
        }
        /*main title end*/
        /*table start*/
        .InformationTable tr th, .InformationTable tr td{
            border-collapse: collapse;
            border: 1px;
            border-bottom-style: dashed;
            border-top-style: dashed;ed;
            border-color: #e3dcdc;
            padding: 10px;
        }
        table tr th{
            padding: 10px;
            font-size: 18px;
            background: #EEEEEE;
        }
        /*table end*/
        /*main footer start*/
        .main-footer{
            width: 50%;
            margin: 0px auto;
            text-align: center;
        }
        .main-footer img{
            display: block;
            width: 100%;
        }
        /*main footer end*/
        /*main end*/
    /*    certificate start */
        .certificate{
            margin-top: 15%;
            margin-left: 5%;
            margin-right: 5%;
        }
        .text-end{
            text-align: right;
        }
        .text-start{
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <header>

        <table width="100%" cellspacing="0" class="headerTable">
            <tr>
                <td style="text-align: right;width: 20%;">
                        <img src="{{public_path().'/bd_logo.png'}}" style="height: 70px; width: 70px;"/>
                </td>
                <td style="text-align: center;width: 60%;">
                    <p class="p-1">Government of the People's Republic of Bangladesh</p>
                    <p class="p-2">Ministry of Health and Family Welfare</p>
                </td>
                <td style="text-align: left;width: 20%;">
                    <img src="{{public_path()."/Mujib_100_Logo.png"}}" style="height: 100px; width: 100px;float: left;"/>
                </td>
            </tr>
        </table>
        <div class="qr">
            <img src="{{public_path('/')}}code/{{$path}}" alt=".." title=".."/>
        </div>
    </header>
    <main>
        <div class="main-title">
            <hr>
            <p style="margin-top: -8px;margin-bottom: 2px; font-size: 16px;font-weight: bold;"> COVID-19 Vaccination Certificate <br>
               <span style="font-weight: normal;"> (কোভিড-১৯ ভ্যাকসিন গ্রহণের সার্টিফিকেট)</span>
            </p>
        </div>
        <table width="100%" cellspacing="0" class="InformationTable"  style="background-image: url('https://play-lh.googleusercontent.com/T4lbDfq91wNFLbTB_YaCafqJN1ucdBocu0BeEKSU1Gbn9Kkq9B-4AwMDiZRIMOOuawI'); background-image-opacity: 0.1; background-repeat: no-repeat; background-position: 25% 45%">
            <tr>
                <th colspan="2" class="text-start" width="50%" style="font-size: 15px;text-align: left;">Beneficiary Details (টিকা গ্রহণকারীর বিবরণ)</th>
                <th colspan="2" class="text-end" width="50%" style="font-size: 15px;text-align: left">Vaccination Details (টিকা প্রদানের বিবরণ)</th>
            </tr>

            <tr>
                <td width="25%" class="text-end">Certificate No: <br> সার্টিফিকেট নং-</td>
                <td width="25%">BD{{$member->birth_certificate_no}}</td>
                <td width="25%" class="text-end">Date of Vaccination(Dose 1): <br>
                টিকা প্রদানের তারিখ(ডোজ ১)-
                </td>
                <td width="25%"> {{!empty($member->date_of_dose_1) ? $member->date_of_dose_1 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">NID Number: <br> জাতীয় পরিচয়পত্র নং-</td>
                <td width="25%">{{!empty($member->nid) ? $member->nid : "N/A"}}</td>
                <td width="25%" class="text-end">Name of Vaccine (Dose 1): <br>টিকার নাম (ডোজ ১)</td>
                <td width="25%"> {{!empty($member->name_of_dose_1) ? $member->name_of_dose_1 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Passport No:<br> পার্সপোর্ট নং-</td>
                <td width="25%">  {{!empty($member->nid) ? $member->passport : "N/A"}} </td>
                <td width="25%" class="text-end">Date of Vaccination(Dose 2): <br>টিকা প্রদানের তারিখ(ডোজ ২)- </td>
                <td width="25%">{{!empty($member->date_of_dose_2) ? $member->date_of_dose_2 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Country/Nationality:<br> দেশ/জাতীয়তাঃ</td>
                <td width="25%"> {{$member->nationality}}</td>
                <td width="30%" class="text-end">Name of Vaccine (Dose 2): <br>টিকার নাম (ডোজ ২)</td>
                <td width="20%"> {{!empty($member->name_of_dose_2) ? $member->name_of_dose_2 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Name: <br> নামঃ</td>
                <td width="25%">  {{$member->name}}</td>
                <td width="10%" class="text-end" rowspan="2">Vaccination Center: <br>টিকা প্রদানের কেন্দ্রঃ</td>
                <td width="40%" rowspan="2"> {{!empty($member->vaccination_center) ? $member->vaccination_center : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Date of Birth: <br> জন্ম তারিখঃ</td>
                <td width="25%"> {{$member->dob}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Gender: <br> লিঙ্গ </td>
                <td width="25%">{{ucfirst($member->gender)}}</td>
                <td width="30%" class="text-end">Vaccinated By: <br>টিকা প্রদানকারীঃ </td>
                <td width="20%"> {{!empty($member->vaccinated_by) ? $member->vaccinated_by : "N/A"}}</td>
            </tr>

            <tr>
                <td width="100%" class="text-center" colspan="4" style="border-bottom: 1px solid #e3dcdc;">
                    To verify this certificate please visit www.surokkha.gov.bd/verify or scan the QR code. <br>
                    ( এই সার্টিফিকেটটি যাচাই করার জন্য www.surokkha.gov.bd/verify ভিজিট অথবা QR কোডটি স্ক্যান করুন )
                </td>
            </tr>

            <tr>
                <td width="100%" class="text-center" colspan="4" style="">
                    For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd <br>
                    (প্রয়োজনে www.dghs.gov.bd ওয়েবসাইটে ভিজিট করুন অথবা ইমেইল করুনঃ info@dghs.gov.bd)
                </td>
            </tr>

            <tr>
                <th colspan="4" class="text-center" width="100%">In cooperation with</th>
            </tr>
        </table>
        <div class="main-footer">
            <img src="{{public_path()."/footer.png"}}" alt="" title="">
        </div>
    </main>
</div>
<div class="">
    <div class="certificate">
        <table width="100%" style="border: 1px solid green;">
            <tr>
                <td style="border-right: 1px solid green;width: 48%">
                    <table width="100%" style="padding: 1px; border: none" class="certificateInnerTable">
                        <tr>
                            <td colspan="2" style="text-align: center"><img src="{{public_path().'/bd_logo.png'}}" style="height: 60px; width: 60px"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; font-size: 13px;">
                                Government of the People's Republic of Bangladesh <br>
                                Ministry of Health and Family Welfare
                            </td>
                        </tr>
                        <tr style="background: green;">
                            <td colspan="2" style="color: white; font-size: 20px; text-align: center">
                                <span><b>COVID-19</b>
                                    <br>
                                    Vaccination Certificate
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                Certificate No: {{$member->certificate_no}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <img src="{{public_path('/')}}code/{{$path}}" style="height: 100px; width: 100px"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;font-weight: bold;font-size: 17px;color: black">
                                {{$member->name}}
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                NID No
                            </td>
                            <td style="text-align: left;color: white">
                                {{!empty($member->nid) ? $member->nid : "N/A"}}
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Passport No
                            </td>
                            <td style="text-align: left;color: white">
                                {{!empty($member->passport) ? $member->passport : "N/A"}}
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Nationality
                            </td>
                            <td style="text-align: left;color: white">{{$member->nationality}}</td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">Vaccine Name</td>
                            <td style="text-align: left;color: white">
                                @if(!empty($member->name_of_dose_1))
                                    @if($member->name_of_dose_1 == \App\Models\Member::VACCINE_NAME_1)
                                        Pfizer (Pfizer- <br>
                                        BioNTech)
                                    @else
                                    {{$member->name_of_dose_1}}
                                    @endif

                                @endif
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Total Dose
                            </td>
                            <td style="text-align: left;color: white">{{$member->total_dose}}</td>
                        </tr>
                    </table>
                </td>
                <td width="3%"></td>
                <td style="border-left: 1px solid green;width: 49%">
                    <table width="100%" style="padding: 1px; border: none" class="certificateInnerTable">
                        <tr>
                            <td colspan="2" style="height: 70px"></td>
                        </tr>
                        <tr style="border: 5px solid greenyellow;">
                            <td colspan="2">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">

                        </tr>
                        <tr style="border-top: 1px solid green;">
                            <td colspan="2" style="text-align: center; font-size: 18px;">
                               To Verify this certificate please <br>
                                visit <b>www.surokkha.gov.bd/verify</b> <br>
                                <span style="font-size: 12px">Or</span> <br>
                                <b>Scan the QR code.</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;font-size: 18px">
                                For any further assistance, please <br>
                                visit www.dghs.gov.bd or
                                email: info@dghs.gov.bd
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">
                            <td colspan="2">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">
                            <td colspan="2" style="text-align: center">
                                <img src="{{public_path().'/certificate_footer.PNG'}}" style="height: 50px; width: 150px;" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 30px"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
