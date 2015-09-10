<?php

namespace App\Http\Controllers;

use App\Bridge;
use App\Opening;
use App\Ship;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OpeningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return ('openings index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($ship_id)
    {
        return('create opening');
        $ship = Ship::findOrFail($ship_id);
        return($ship);
        //return view ('openings.create', compact('ship'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $ship_id = $request->ship_id;
        $ship = Ship::findOrFail($ship_id);

        $items = $request->all();
        foreach ( $items as $key => $value ) {
            if($value == 'open')
            {
                $bridge = Bridge::findOrFail($key);
                $bridge->openings_total += 1;
                $bridge->save();

                $ship->strippen_total -= 1;
                $opening = new Opening([
                    'ship_id' => $ship_id,
                    'ship_name' => $ship->name,
                    'bridge_id' => $key,
                    'bridge_name' => Bridge::findOrFail($key)->name
                ]);

                $opening->user_name = \Auth::user()->name;
                \Auth::user()->openings()->save($opening);
            }

        }
        $ship->save();
        return redirect('ships');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showtype($type, $id)
    {
        //return($type);
        //return($id);
        $user = Auth::user();
        if($type == 'ship')
        {
            $object = Ship::findOrFail($id);
            $openings = Opening::latest()->where('ship_id', $id)->get();
            $opening_type = 'ship';
            return view('openings.list', compact('openings', 'object', 'user', 'opening_type'));
        }
        elseif($type == 'bridge')
        {
            //return($type . ' yes');
            $object = Bridge::findOrFail($id);
            $openings = Opening::latest()->where('bridge_id', $id)->get();
            $opening_type = 'bridge';
            return view ('openings.list', compact('openings', 'object', 'user', 'opening_type'));
        }
        elseif($type == 'user')
        {
            $user = User::find($id);
            $object = $user;
            $openings = Opening::latest()->where('user_id', $user->id)->get();
            $opening_type = 'user';
            return view('openings.list', compact('openings', 'object', 'user', 'opening_type'));
        }

    }

    public function delete($type, $opening_id){
        $opening = Opening::findOrFail($opening_id);
        $bridge = Bridge::findOrFail($opening->bridge_id);
        $bridge->openings_total -= 1;
        $ship = Ship::findOrFail($opening->ship_id);
        $ship->strippen_total += 1;

        $bridge->save();
        $ship->save();
        $opening->delete();

        if($type == 'ship')
        {
            return redirect ('openings/showtype/ship/' . $ship->id);
        }
        if($type == 'bridge')
        {
            return redirect ('openings/showtype/bridge/' . $bridge->id);
        }
        if($type == 'user')
        {
            return redirect ('openings/showtype/user/1');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
