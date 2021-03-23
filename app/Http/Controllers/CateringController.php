<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catering;
use App\Menu;

class CateringController extends Controller
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
        $caterings = Catering::all();
        return view('caterings.index')->with('caterings', $caterings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caterings.create');
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
        'Godzina_realizacji' => 'required|regex:/[0-1][0-9]:[0-5][0-9]/',
      ];
        $messages = [
      'required'    => 'Parametr :attribute jest wymagany.',
      'regex' => 'Godzina realizacji musi być w formacie xx:xx np. 13:24 oraz musi być prawidłowa',
      'max' => 'Maksymalna długość :attribute to :max',
      ];
        $this->validate($request, $rules, $messages);
        $catering = new Catering;
        $catering->Nazwa = $request->input('Nazwa');
        $catering->Godzina_realizacji = $request->input('Godzina_realizacji');
        $catering->save();
        $menu = new Menu;
        $menu->Nazwa = $request->input('Nazwa');
        $menu->Catering_id = $catering->id;
        $menu->save();

        return redirect('/catering')->with('success', 'Catering został dodany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catering = Catering::find($id);
        return view('caterings.show')->with('catering', $catering);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catering = Catering::find($id);
        return view('caterings.edit')->with('catering', $catering);
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
        'Godzina_realizacji' => 'required|regex:/[0-1][0-9]:[0-5][0-9]/',
      ];
        $messages = [
      'required'    => 'Parametr :attribute jest wymagany.',
      'regex' => 'Godzina realizacji musi być w formacie xx:xx np. 13:24 oraz musi być prawidłowa',
      'max' => 'Maksymalna długość :attribute to :max',
      ];
        $this->validate($request, $rules, $messages);
        $catering = Catering::find($id);
        $catering->Nazwa = $request->input('Nazwa');
        $catering->Godzina_realizacji = $request->input('Godzina_realizacji');


        $catering->save();

        return redirect('/catering')->with('success', 'Catering został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catering = Catering::find($id);
        $catering->delete();

        return redirect('/catering')->with('success', 'Catering został usunięty');
    }
}
