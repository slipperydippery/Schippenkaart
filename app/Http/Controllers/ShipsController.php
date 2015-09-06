<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\ShipRequest;
use App\Opening;
use App\Ship;
use Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ShipsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $ships = Ship::orderBy('name', 'ASC')->get();

        return view ('ships.index', compact('ships'));
    }

    public function show ($id)
    {
        $ship = Ship::findOrFail($id);
        return view ('ships.ship', compact('ship'));

    }

    public function create ()
    {
        return view ('ships.create');
    }

    public function store (ShipRequest $request)
    {

        $ship = Ship::create($request->all());
        //$ship->name = $request->name;
        //$ship->owner_first = $request->owner_first;
        //$ship->strippen_total = $request->strippen_total;
        //$ship->save();
        //return $ship;
        //return $request->all();
        return redirect('ships');
    }

    public function edit ($id)
    {
        $ship = Ship::findOrFail($id);
        return view('ships.edit', compact('ship'));
    }

    public function update ($id, ShipRequest $request)
    {
        $ship = Ship::findOrFail($id);
        $ship->update($request->all());
        return redirect ('ships');
    }

    public function purchace($id)
    {
        $ship = Ship::findOrFail($id);
        return view('ships.purchase', compact('ship'));
    }

    public function purchased(PurchaseRequest $request)
    {
        //return $request->purchase;
        $ship = Ship::findOrFail($request->ship_id);
        $strippen = $ship->strippen_total;
        $strippen += $request->purchase;
        $ship->strippen_total = $strippen;
        $ship->save();
        return redirect('ships');
    }

}
