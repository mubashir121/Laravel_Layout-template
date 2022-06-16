<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employ;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Services\YajraDataTableService;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

        if ($request->ajax()) {

            $companies_data = Company::withCount('employ')->get();
            
            return Datatables::of($companies_data)

            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                $btn = '
                <div class="btn-group">
                <a href="'. route('company-form-edit' , $row->id) .'" class="edit btn btn-success btn-sm text-left">Edit
                </a>
                <a class="text-right ml-2">
                <form action="'. route('companies.destroy', ['id' => $row->id]) .'" method="post">
                 '.csrf_field().'
                '.method_field("DELETE").'
                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm(\'Are You Sure Want to Delete?\')">DELETE</button>
                </form></a></div>
            ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
            return view('company.table');
    }



    /**
     *
     * @return DataTables
     */
    public function indexData(){
        return YajraDataTableService::CompanyTable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        return view('company.add-form');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'comp_name' => 'required',
            'comp_email' => 'required',
            'comp_phone' => 'required',
            'comp_address' => 'required',
            'emp_name.*' => 'required',
            'email.*' => 'required',
            'phone.*' => 'required',
            'address.*' => 'required',
            'gender'    => 'required|array',
            'gender.*'  => 'required|string',
        ]);

        $comp_add = new Company;
        $comp_add->comp_name = $request->comp_name;
        $comp_add->comp_email = $request->comp_email;
        $comp_add->comp_phone = $request->comp_phone;
        $comp_add->comp_address = $request->comp_address;
        // $id = $comp_add->save();
        // if($id != 0){
        if ($comp_add->save()) {
            $id = $comp_add->id;
            foreach ($request->emp_name as $key => $insert) {
                $saveRecord = [
                    'emp_name' => $request->emp_name[$key],
                    'email' => $request->email[$key],
                    'phone' => $request->phone[$key],
                    'address' => $request->address[$key],
                    'gender' => $request->gender[$key],
                    'company_id' => $id,
                ];
                Employ::insert($saveRecord);
            }
        }

        if ($saveRecord) {

            return back()->with('success', 'Your Data successfully Saved');
        } else {
            return back()->withErrors($request->validate());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_update = Company::find($id);
        return view('company.edit-form',compact('company_update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'comp_name' => 'required',
            'comp_email' => 'required',
            'comp_phone' => 'required',
            'comp_address' => 'required',
            'emp_name.*' => 'required',
            'email.*' => 'required',
            'phone.*' => 'required',
            'address.*' => 'required',
            'gender'    => 'required|array',
            'gender.*'  => 'required|string', 
        ]);

      $company = Company::find($id);
      $company->comp_name = $request->comp_name;
      $company->comp_email = $request->comp_email;
      $company->comp_phone = $request->comp_phone;
      $company->comp_address = $request->comp_address;
      $company->update();
        if ($company->update()) {
            $ids = [];
            foreach ($request->emp_name as $key =>$update) {
                $employ_update = [
                    'emp_name' => $request->emp_name[$key],
                    'email' => $request->email[$key],
                    'phone' => $request->phone[$key],
                    'address' => $request->address[$key],
                    'gender' => $request->gender[$key],
                
                ];
            
                if(!empty($request->id[$key])){

                    $ids[] = $request->id[$key];
                   DB::table('employs')
                   ->where( 'company_id', $company->id)
                   ->where('id', $request->id[$key])
                   ->update($employ_update);     

               } else {
                    $employ_update['company_id'] = $company->id;
                   $emp = Employ::create($employ_update);

                   $ids[] = $emp->id;
               }
           }
            
            $company->employ()->whereNotIn('id', $ids)->delete();

            return back()->with('success','Your Data successfully Updated');        
        } else {
        return back()->with('errors','You have Something Error');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company_data = Company::find($id);  
        $company_data->destroy($id); 
        
        if($company_data) {
            return back()->with('message', 'Your data is Deleted');
        }
        else{
            return back()->with('error', 'something went wrong');
        }
    }
}
