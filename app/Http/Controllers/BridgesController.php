<?php

namespace App\Http\Controllers;

use App\Bridge;
use App\Opening;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BridgesController extends Controller
{
    public function index() {
        $bridges = Bridge::latest()->get();

        return view ('bridges.index', compact('bridges'));
    }

    public function show($bridge_id)
    {
        $bridge = Bridge::findOrFail($bridge_id);
        $openings = Opening::latest()->where('bridge_id', $bridge_id)->get();
        $user = Auth::user();
        return view ('openings.bridgelist', compact('openings', 'bridge', 'user'));
    }

    public function delete($opening_id){
        $opening = Opening::findOrFail($opening_id);
        $bridge = Bridge::findOrFail($opening->bridge_id);
        $bridge->openings_total -= 1;
        $bridge->save();
        $opening->delete();

        return redirect ('bridges/' . $bridge->id);

    }
}
