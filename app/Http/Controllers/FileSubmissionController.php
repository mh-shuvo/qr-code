<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
class FileSubmissionController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = Member::orderBy('id','desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at',function ($row){
                    return date('d M y',strtotime($row->created_at));
                })
                ->addColumn('gender',function ($row){
                    return ucfirst($row->gender);
                })
                ->addColumn('created_by',function ($row){
                    $user = User::find($row->created_by);
                    return !empty($user) ? $user->name : 'N/A';
                })
                ->addColumn('action',function ($row){
                    return "<a class='btn btn-sm btn-primary' href='".route('member_edit',[$row->code])."'>View/Edit</a> <a class='btn btn-sm btn-info text-white' href='".route('print',[$row->code])."'>Download</a>";
                })
                ->make(true);
        }else{
            return view('admin.file_submission_list');
        }
    }
}
