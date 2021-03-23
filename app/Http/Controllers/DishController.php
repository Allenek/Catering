<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('cateringemployee:handle');
    }

    public function index()
    {
        $dishes = auth()->user()->catering->menu->dishes;

        return view('dishes.index')->with('dishes', $dishes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dishes.create');
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
      'Nazwa' => 'required|max:40',
      'Cena(PLN)' => 'required|numeric|digits_between:1,3',
      'Kaloryczność(KCAL)' => 'required|numeric|digits_between:1,4',
      ];
      $messages = [
      'required'    => 'Parametr :attribute jest wymagany.',
      'digits_between' => 'Maksymalna długość parametru :attribute to :max',
      'numeric' => 'Parametr :attribute musi być cyfrą',
      ];

        $this->validate($request, $rules, $messages);
        $dish = new Dish;
        $dish->Nazwa = $request->input('Nazwa');
        $dish->Cena = $request->input('Cena(PLN)');
        $dish->Kalorycznosc = $request->input('Kaloryczność(KCAL)');
        $dish->Menu_id = auth()->user()->catering->menu->id;
        $dish->save();
        return redirect('/dishes')->with('success', 'Danie zostało dodane');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        return view('dishes.show')->with('dish', $dish);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        return view('dishes.edit')->with('dish', $dish);
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
        'Nazwa' => 'required|max:40',
        'Cena(PLN)' => 'required|numeric|digits_between:1,3',
        'Kaloryczność(KCAL)' => 'required|numeric|digits_between:1,4',
      ];
        $messages = [
      'required'    => 'Parametr :attribute jest wymagany.',
      'digits_between' => 'Długość parametru :attribute musi być pomiędzy :digits_between',
      'max' => 'Maksymalna długość parametru :attribute to :max',
      'numeric' => 'Parametr :attribute musi być cyfrą',
      ];
        $this->validate($request, $rules, $messages);
        $dish = Dish::find($id);
        $dish->Nazwa = $request->input('Nazwa');
        $dish->Cena = $request->input('Cena(PLN)');
        $dish->Kalorycznosc = $request->input('Kaloryczność(KCAL)');
        $dish->save();

        return redirect('/dishes')->with('success', 'Danie zostało zaktualizowane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();

        return redirect('/dishes')->with('success', 'Danie zostało usunięte');
    }
}
