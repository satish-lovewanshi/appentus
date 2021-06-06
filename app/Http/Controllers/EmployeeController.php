<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Validator;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = employee::paginate(10);
        
        return view('employee/employeeList',["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee/create');
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
            'firstName'=>['required','string', 'max:255'],
            'lastName'=>['required','string', 'max:255'],
            'company_id'=>['required'],
            'email'=>['required','string', 'email', 'max:255', ],
            'phone'=>['required','min:10'],
        ]);

        if($validate->fails()){
            return back()->withError($validate)->withInput();
        }else{
           
            
            $new = new employee();
            $new->firstName = $request->firstName;
            $new->lastName = $request->lastName;
            $new->company_id = $request->company_id;
            $new->email = $request->email;
            $new->phone = $request->phone;
           
            $result = $new->save();
            if($result){
                return redirect('employee')->with('message', 'New Employee Record Stored !');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        return view('employee/update',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $new = employee::find($employee)->first();
        $new->firstName = $request->firstName;
        $new->lastName = $request->lastName;
        $new->company_id = $request->company_id;
        $new->email = $request->email;
        $new->phone = $request->phone;
        $result = $new->save();
        if($result){
            return redirect('employee')->with('message', 'Employee Record Updated !');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        $employee = $employee::find($employee)->first();
        $result = $employee->delete();
        if($result){
            return redirect()->back()->with('message', 'One employee Record Deleted !');
        }
    }
}
