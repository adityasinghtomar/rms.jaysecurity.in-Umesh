<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Branch, Client_company};
class DropdownController extends Controller
{
    public function index()
    {
        $data['branches'] = Branch::get(["name", "id"]);
        return view('welcome', $data);
    }
    public function fetchCompany(Request $request)
    {
        $data['company'] = Client_company::where("branch_id",$request->branch_id)->get(["name", "id"]);
        return response()->json($data);
    }
  
}