<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Catering;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
        $this->middleware('admin:handle');
     }

    public function index()
    {
      $employees = Employee::all();
      return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catering = Catering::pluck('Nazwa', 'id');
        return view('employees.create')->with('catering', $catering);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'Imię' => 'required|max:80|',
        'Nazwisko' => 'required|max:200',
        'Pesel' => 'required|digits:11',
        'Email' => 'required',
        'Haslo' => 'required|min:4',
        'Stanowisko' => 'required',
        'Uprawnienia' => 'required|regex:/[0-3]/',
        'Kwota_dofinansowania' => 'required|digits_between:1,3',
      ];
      $messages = [
      'required'    => 'Parametr :attribute jest wymagany.',
      'digits_between' => 'Długość parametru :attribute musi byc między :min a :max oraz musi być cyfrą' ,
      'regex' => 'Parametr :attribute musi być prawidłowym numerem(wartość między 1 a 3)',
      'max' => 'Maksymalna długość :attribute to :max',
      'min' => 'Minimalna długość :attribute to :min',
      'digits' => 'Parametr :attribute musi wynosić :digits cyfr',
      ];
      $this->validate($request,$rules,$messages);
      $employee = new Employee;
      $employee->Imie = $request->input('Imię');
      $employee->Nazwisko = $request->input('Nazwisko');
      $employee->Pesel = $request->input('Pesel');
      $employee->Email = $request->input('Email');
      $employee->password = bcrypt($request->input('Haslo'));
      $employee->Stanowisko = $request->input('Stanowisko');
      $employee->Kwota_dofinansowania = $request->input('Kwota_dofinansowania');
      $employee->Pozostała_kwota = $request->input('Kwota_dofinansowania');
      $employee->Uprawnienia = $request->input('Uprawnienia');
      $employee->Catering_id = $request->input('Catering');
      $employee->save();

      return redirect('/employees')->with('success', 'Pracownik został dodany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employee::find($id);
      return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $catering = Catering::pluck('Nazwa', 'id');
      $employee = Employee::find($id);
      return view('employees.edit')->with('employee', $employee)->with('catering', $catering);
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
      $rules = [
        'Imię' => 'required|max:80|',
        'Nazwisko' => 'required|max:200',
        'Pesel' => 'required|digits:11',
        'Email' => 'required',
        'Haslo' => 'required|min:4',
        'Stanowisko' => 'required',
        'Uprawnienia' => 'required|regex:/[0-3]/',
        'Kwota_dofinansowania' => 'required|digits_between:1,3',
      ];
      $messages = [
      'required'    => 'Parametr :attribute jest wymagany.',
      'digits_between' => 'Długość parametru :attribute musi byc między :min a :max oraz musi być cyfrą' ,
      'regex' => 'Parametr :attribute musi być prawidłowym numerem(wartość między 1 a 3)',
      'max' => 'Maksymalna długość :attribute to :max',
      'min' => 'Minimalna długość :attribute to :min',
      'digits' => 'Parametr :attribute musi wynosić :digits cyfr',
      ];
      $this->validate($request,$rules,$messages);
      $employee = Employee::find($id);
      $employee->Imie = $request->input('Imię');
      $employee->Nazwisko = $request->input('Nazwisko');
      $employee->Pesel = $request->input('Pesel');
      $employee->Email = $request->input('Email');
      $employee->password = bcrypt($request->input('Haslo'));
      $employee->Stanowisko = $request->input('Stanowisko');
      $employee->Kwota_dofinansowania = $request->input('Kwota_dofinansowania');
      $employee->Pozostała_kwota = $request->input('Kwota_dofinansowania');
      $employee->Uprawnienia = $request->input('Uprawnienia');
      $employee->Catering_id = $request->input('Catering');
      $employee->save();

      return redirect('/employees')->with('success', 'Pracownik został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employee = Employee::find($id);
      $employee->delete();

      return redirect('/employees')->with('success', 'Pracownik został usunięty');
    }

    public function refreshFunds(Request $request)
    {
      dump("ziemniaczki");
      exit;
      $employees = Employee::all();
      foreach($employees as $employee)
      {
        $employee->Pozostała_kwota=$employee->Kwota_dofinansowania;
        $employee->save();
      }
      $employees->save();
    }
}
