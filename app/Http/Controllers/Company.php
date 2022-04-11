<?php

namespace App\Http\Controllers;

use App\Models\Company as ModelsCompany;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;


class Company extends BaseController
{
    public function index()
    {
        $dataCompany = ModelsCompany::get();
        $data = [
            'company' => $dataCompany
        ];
        return view('master.company', $data);
    }
    public function saveCompany(Request $request)
    {
        $rules = [
            'company_short'  => 'required',
            'company_long'    => 'required'
        ];

        $message = [
            'company_short.required'      => 'Short company name tidak boleh kosong',
            'company_long.required'       => 'Long company name tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect('master/company')->withErrors($validator);
        }
        $modelCompany = new ModelsCompany();
        $modelCompany->company_short   = $request->input('company_short');
        $modelCompany->company_long  = $request->input('company_long');
        $modelCompany->save();

        Session::flash('message', 'Company berhasil ditambahkan');
        return redirect('master/company');
    }
    public function delete($id)
    {
        $modelCompany = ModelsCompany::find($id);
        $modelCompany->delete();

        Session::flash('message', 'Company berhasil dihapus');
        return redirect('master/company');
    }
    public function updateCompany(Request $request, $id)
    {
        $rules = [
            'company_short'  => 'required',
            'company_long'    => 'required'
        ];

        $message = [
            'company_short.required'      => 'Short company name tidak boleh kosong',
            'company_long.required'       => 'Long company name tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect('master/company')->withErrors($validator);
        }
        $modelCompany = ModelsCompany::find($id);
        $modelCompany->company_short   = $request->input('company_short');
        $modelCompany->company_long  = $request->input('company_long');
        $modelCompany->save();

        Session::flash('message', 'Company berhasil diupdate');
        return redirect('master/company');
    }
}
