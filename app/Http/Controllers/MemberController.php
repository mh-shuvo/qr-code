<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Mpdf\QrCode\QrCode as QrCode2;
use Mpdf\QrCode\Output;

class MemberController extends Controller
{
    public function showMemberForm(){
        return view('welcome');
    }
    public function submitMemberForm(Request $request){
        $this->validate($request,[
            'birth_certificate_no'=>'required',
            'name' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
        ],[
            'birth_certificate_no.required' => 'Birth Certificate no field is required',
            'name.required' => 'Name field is required',
            'dob.required' => 'Date of Birth field is required',
            'nationality.required' => 'Nationality field is required',
            'gender.required' => 'Gender field is required',
        ]);
        DB::beginTransaction();
        try {
           $code = $this->generateCode();
            $member = new Member();
            $member->code = $code;
            $member->certificate_no = 'BD'.Str::random(10);
            $member->birth_certificate_no = $request->birth_certificate_no;
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
            $member->created_by = Auth::id();
            $member->save();
            DB::commit();
            Session::flash('success','File Submission Successfull.');
            return redirect()->back();
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

        $this->deleteAllFilesofByPath('code/');

        $member = Member::where('code',$code)->first();
        $qrCode = new QrCode2(route('scan',[$member->code]));
        $output = new Output\Png();
        $data = $output->output($qrCode, 300, [255, 255, 255], [0, 0, 0]);
        $qr_filename = time().'.png';
        file_put_contents('code/'.$qr_filename, $data);


//        $qrcode = base64_encode(QrCode::format('svg')->size(300)->errorCorrection('H')->generate(route('scan',[$member->code])));
        $qrcode = $qr_filename;
        $data = [
            'path' => $qrcode,
            'member' =>$member,
            'file' => "1646067064"
        ];
//        echo $html;
//        exit;
        $pdf = PDF::loadView('download', $data);

        $pdfName = date('y_m_d',strtotime($member->created_at)).'-'.date('y_m_d',time());
        return $pdf->download($pdfName.'.pdf');
    }

    // function to delete all files and subfolders from folder
    private function deleteAllFilesofByPath($dir, $remove = false) {
        $structure = glob(rtrim($dir, "/").'/*');
        if (is_array($structure)) {
            foreach($structure as $file) {
                if (is_dir($file))
                    deleteAll($file,true);
                else if(is_file($file))
                    unlink($file);
            }
        }
        if($remove)
            rmdir($dir);
    }

    public function scanResult($code){
        $member = Member::where('code',$code)->first();
        $page = 'result';
        return view('show',compact('member','page'));
    }
    public function memberEdit($code){
        $member = Member::where('code',$code)->first();
        return view('admin.member_edit',compact('member'));
    }
    public function memberUpdate(Request $request){
        $this->validate($request,[
            'birth_certificate_no'=>'required',
            'name' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
        ],[
            'birth_certificate_no.required' => 'Birth Certificate no field is required',
            'name.required' => 'Name field is required',
            'dob.required' => 'Date of Birth field is required',
            'nationality.required' => 'Nationality field is required',
            'gender.required' => 'Gender field is required',
        ]);
        DB::beginTransaction();
        try {
            $member = Member::find($request->id);
            $member->birth_certificate_no = $request->birth_certificate_no;
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
            Session::flash('success','Successfully Updated');
            return redirect()->back();
        }
        catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again letter');
            return redirect()->back();
        }
    }
    private function generateCode(){
        $url_length = strlen(route('login'));
        $codeLength = 255-$url_length;
        $code = str_replace("/","",Str::random($codeLength));
        return $code;
    }
}
