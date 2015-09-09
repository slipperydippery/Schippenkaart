<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\ShipRequest;
use App\Opening;
use App\Ship;
use Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $favships = Ship::wherehas('userFavorite', function($q) use($user)
        {
            $q->where('id', $user->id);
        })->orderBy('name', 'ASC')->get();
        $allships = Ship::orderBy('name', 'ASC')->get();
        $ships= $allships->diff($favships);

        return view ('ships.index', compact('favships', 'ships', 'user'));
    }

    public function favorite ()
    {
        if(null !== Request::input('standard_ship_id'))
        {
            Auth::user()->favoriteShips()->attach(Request::input('standard_ship_id'));
        }
        elseif (null !== Request::input('favorite_ship_id'))
        {
            Auth::user()->favoriteShips()->detach(Request::input('favorite_ship_id'));
        }
        return redirect ('ships');
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
