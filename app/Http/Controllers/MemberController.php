<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MemberController extends Controller
{
    public function showMemberForm(){
        return view('welcome');
    }
    public function submitMemberForm(Request $request){
        $this->validate($request,[
            'certificate_no'=>'required',
            'name' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
        ],[
            'certificate_no.required' => 'Certificate no field is required',
            'name.required' => 'Name field is required',
            'dob.required' => 'Date of Birth field is required',
            'nationality.required' => 'Nationality field is required',
            'gender.required' => 'Gender field is required',
        ]);
        DB::beginTransaction();
        try {
            $member = new Member();
            $member->code = time();
            $member->certificate_no = $request->certificate_no;
            $member->nid = $request->nid;
            $member->passport = $request->passport;
            $member->nationality = $request->nationality;
            $member->name = $request->name;
            $member->dob = date('d-m-Y',strtotime($request->dob));
            $member->gender = $request->gender;
            $member->date_of_dose_1 = date('d-m-Y',strtotime($request->date_of_dose_1));
            $member->name_of_dose_1 = $request->name_of_dose_1;
            $member->date_of_dose_2 = date('d-m-Y',strtotime($request->date_of_dose_2));
            $member->name_of_dose_2 = $request->name_of_dose_2;
            $member->vaccination_center = $request->vaccination_center;
            $member->vaccinated_by = $request->vaccinated_by;
            $member->total_dose = $request->total_dose;
            $member->save();
            DB::commit();
            return redirect()->route('get-member-data',[$member->code]);
        }
        catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again letter');
            return redirect()->back();
        }

    }
    public function getMemberDataByCode($code){
        $member = Member::where('code',$code)->first();
        return view('show',compact('member'));
    }
    public function printPdf($code){
        $member = Member::where('code',$code)->first();
        $qrcode = base64_encode(QrCode::format('svg')->size(225)->errorCorrection('H')->generate(route('get-member-data',[$member->code])));
        $data = [
            'path' => $qrcode,
            'member' =>$member
        ];
        $pdf = PDF::loadView('download', $data);
        return $pdf->download($member->name.'.pdf');
    }

    public function generateBase64Image($img){
        $path = asset("/".$img);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return base64_encode($data);
    }
}
