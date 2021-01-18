<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')
            ->select('companies.*')
            ->where('valid' , '=' , 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('companies', [
            'companies' => $companies,
            'name' => 'segev'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCompanies', ['company' => []]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        $this->validate($request, [
            'comapnyName' => 'required',
            'email' => 'required|email:rfc,dns',
            'website' => 'required',
            'logo' => 'image'
        ]);
        $path = '';
        if($request->file('logoImg')){
            $path = $request->file('logoImg')->store('public/logos');
        }
        DB::table('companies')->insert(
            [
                'valid' => 1,
                'name' => $request->input('comapnyName'),
                'logo' => ($path ? $path : ''),
                'email' => $request->input('email'),
                'website' => $request->input('website')
            ]
        );

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = DB::table('companies')
            ->where('companies.id', '=', $id)
            ->first();
        $employees = DB::table('employees')
            ->where('company', '=', $id)
            ->where('valid', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('company', ['company' => $company, 'employees' => $employees, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = DB::table('companies')
            ->where('id', '=', $id)
            ->first();
        return view('createCompanies', ['company' => ($company ? $company : '')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comapnyName' => 'required',
            'email' => 'required',
            'website' => 'required'
        ]);

        $update = DB::table('companies')
            ->where('id', $id)
            ->update(['name' => $request->input('comapnyName'), 'email' => $request->input('email'), 'website' => $request->input('website')]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('companies')
            ->where('id', $id)
            ->update(['valid' => '0']);

        return redirect()->route('home');
    }
}
