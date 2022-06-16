<?php
namespace App\Services;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employ;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class YajraDataTableService
{
public static function CompanyTable()
{

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
}





?>