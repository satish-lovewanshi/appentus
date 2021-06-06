<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = company::get();
        
        return view('company/companyList',["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>['required'],
            'email'=>['required'],
            'logo'=>['required'],
            'website'=>['required'],
        ]);

        if($validate->fails()){
            return back()->withError($validate)->withInput();
        }else{
           
            
            $newCompany = new company();
            $newCompany->name = $request->name;
            $newCompany->email = $request->email;
            $newCompany->logo = $request->logo;
            $newCompany->website = $request->website;
            $result = $newCompany->save();
            if($result){
                return redirect('company')->with('message', 'New Company Record Stored !');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {   
        return view('company/update',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        $updateCompany = company::find($company)->first();
        $updateCompany->name = $request->name;
        $updateCompany->email = $request->email;
        $updateCompany->logo = $request->logo;
        $updateCompany->website = $request->website;
        $result = $updateCompany->save();
        if($result){
            return redirect()->back()->with('message', 'Company Record Updated !');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        $Company = company::find($company)->first();
        $result = $Company->delete();
        if($result){
            return redirect()->back()->with('message', 'One Company Record Deleted !');
        }
    }
}
