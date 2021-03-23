<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Catering;
use App\Order;
use App\Dish;
use App\Menu;
use App\Employee;
use Carbon\Carbon;
use Auth;
use App\OrderDish;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $date = Carbon::now();
        $catering = Catering::all();
        return view('orders.index')->with('caterings', $catering)->with('date', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sum_price=0;
        $cart = $request->session()->get('key', []);
        $orders=[];

        foreach ($cart as $cart_item) {
            $tmp=Dish::find($cart_item);
            $orders[]=$tmp;
            $sum_price+=$tmp->Cena;
        }
        return view('orders.create', compact('orders', 'sum_price'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Carbon::now();
        $dishes = DB::table('dishes')->where('Menu_id', $id)->get();

        return view('orders.show')->with('dishes', $dishes);
    }

    public function storeOrder(Request $request, $id)
    {
      $order = new Order;
      $order->Pracownik_id = auth()->user()->id;
      $order->save();
      foreach ($request->session()->get('key', []) as $order_dish) {
          $order_dishes = new OrderDish;
          $order_dishes->Potrawa_id = $order_dish;
          $order_dishes->Zamowienie_id = $order->id;
          $order_dishes->save();
      }
      $deductFunds = Employee::find(auth()->user()->id);
      $deductFunds->Pozostała_kwota-=$id;
      $deductFunds->save();
      OrdersController::removeAll($request);
      return redirect('/order/showForEmployee')->with('success', 'Zamówienie zostało dodane');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request, $id)
    {
        $order=$request->session()->get('key', []);
        $order[]= $id;
        $request->session()->put('key', $order);
    }

    public function removeFromCart(Request $request, $id)
    {
        $orders=$request->session()->get('key', []);
        foreach ($orders as $key => $order) {
            if ($order == $id) {
                unset($orders[$key]);
                break;
            }
        }
        $request->session()->put('key', $orders);
    }

    public function removeAll(Request $request)
    {
      $orders=$request->session()->get('key', []);
      foreach ($orders as $key => $order) {
              unset($orders[$key]);
          }
      $request->session()->put('key', $orders);
    }

    public function showForEmployee()
    {
      if(Auth::user()->Uprawnienia==3)
      {
      $orders = OrderDish::all();
      $tempOrders=[];
      foreach ($orders as $order)
      {
        if($order->orders->Pracownik_id==Auth::user()->id)
        {
          $tempOrders[]=$order;
        }
      }
      return view('orders.showForEmployee')->with('orders', $tempOrders);
      }
    else
    {
    return redirect("/home")->with('error', 'Nie masz uprawnień do przeglądania tej strony');
    }
  }


    public function showForAdmin()
    {
      if(Auth::user()->Uprawnienia==1)
      {
      $orders = OrderDish::all();
      return view('orders.showForAdmin')->with('orders', $orders);
      }else
      {
      return redirect("/home")->with('error', 'Nie masz uprawnień do przeglądania tej strony');
      }
    }

    public function showForCatering()
    {
      if(Auth::user()->Uprawnienia==2){
      $orders = OrderDish::whereDate('created_at', DB::raw('CURDATE()'))->get();
      $tempOrders=[];
      foreach ($orders as $order)
      {
        $getMenuId=$order->dishes->menu->catering->id;
        if($getMenuId==Auth::user()->catering->id)
        {
          $tempOrders[]=$order;
        }
      }

      return view('orders.showForCatering')->with('orders', $tempOrders);
    }else{
      return redirect("/home")->with('error', 'Nie masz uprawnień do przeglądania tej strony');
    }
}}
