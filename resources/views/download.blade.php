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
        }
        .container{
            height: auto;
            border: 2px solid #EBEBEB;
        }
        .headerTable tr, .headerTable tr, .headerTable td{
            border: none;
        }
        .p-1{
          font-weight: bold;
            font-size: 20px;
        }
        .p-2{
          font-weight: bold;
            font-size: 18px;
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
        table tr th, table tr td{
            border-collapse: collapse;
            border: 1px;
            border-style: dashed;
            border-color: #EEEEEE;
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
    </style>
</head>
<body>
<div class="container">
    <header>

        <table width="100%" cellspacing="0" class="headerTable">
            <tr>
                <td>
                    <img src="{{public_path().'/bd_logo.png'}}" style="height: 70px; width: 70px"/>
                </td>
                <td style="text-align: center;">
                    <p class="p-1">Government of the People's Republic of Bangladesh</p>
                    <p class="p-2">Ministry of Health and Family Welfare</p>
                </td>
                <td>
                    <img src="{{public_path()."/Mujib_100_Logo.png"}}" style="height: 100px; width: 100px"/>
                </td>
            </tr>
        </table>
        <div class="qr">
            <img src="data:image/png;base64,{{$path}}" alt=".." title=".."/>
        </div>
    </header>


    <main>
        <div class="main-title">
            <h1> Appliciant Member Detail Information</h1>
        </div>
        <table width="100%" cellspacing="0">
            <tr>
                <th colspan="2" class="text-start" width="50%">Beneficiary Details</th>
                <th colspan="2" class="text-end" width="50%">Vaccination Details</th>
            </tr>

            <tr>
                <td width="25%" class="text-end">Certificate No:</td>
                <td width="25%">{{$member->certificate_no}}</td>
                <td width="25%" class="text-end">Date of Vaccination (Dose 1):</td>
                <td width="25%"> {{!empty($member->date_of_dose_1) ? $member->date_of_dose_1 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">NID Number:</td>
                <td width="25%">{{!empty($member->nid) ? $member->nid : "N/A"}}</td>
                <td width="25%" class="text-end">Name of Vaccine (Dose 1):</td>
                <td width="25%"> {{!empty($member->name_of_dose_1) ? $member->name_of_dose_1 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Passport No:</td>
                <td width="25%">  {{!empty($member->nid) ? $member->passport : "N/A"}} </td>
                <td width="25%" class="text-end">Date of Vaccination (Dose 2):</td>
                <td width="25%">{{!empty($member->date_of_dose_2) ? $member->date_of_dose_2 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Country/Nationality:</td>
                <td width="25%"> {{$member->nationality}}</td>
                <td width="25%" class="text-end">Name of Vaccine (Dose 2):</td>
                <td width="25%"> {{!empty($member->name_of_dose_2) ? $member->name_of_dose_2 : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Name:</td>
                <td width="25%">  {{$member->name}}</td>
                <td width="25%" class="text-end" rowspan="2">Vaccination Center:</td>
                <td width="25%" rowspan="2"> {{!empty($member->vaccination_center) ? $member->vaccination_center : "N/A"}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Date of Birth:</td>
                <td width="25%"> {{$member->dob}}</td>
            </tr>

            <tr>
                <td width="25%" class="text-end">Gender:</td>
                <td width="25%">{{ucfirst($member->gender)}}</td>
                <td width="25%" class="text-end">Vaccinated By:</td>
                <td width="25%"> {{!empty($member->vaccinated_by) ? $member->vaccinated_by : "N/A"}}</td>
            </tr>

            <tr>
                <td width="100%" class="text-center" colspan="4">
                    To verify this certificate please visit www.surokkha.gov.bd/verify or scan the QR code.
                </td>
            </tr>

            <tr>
                <td width="100%" class="text-center" colspan="4">
                    For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd
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
</body>
</html>
