<?php

namespace App\Http\Controllers;

use App\Models\BarsuNir;
use App\Models\HudredIdeas;
use App\Models\BarsuNirDop;
use App\Models\Gpni;
use App\Models\Grant;
use App\Models\GpniDop;
use Illuminate\Support\Facades\Auth;
use App\Models\MolInic;
use App\Models\Molindic;
use App\Notifications\Delete;
use App\Models\User;
use App\Notifications\Edit;
use Illuminate\Http\Request;

class SortController extends Controller
{
   public function sort(Request $request)
   {
       $sort = $request->input('sort');
       $search = request('searchItem');
       if(Auth::user()->Role=="User"){
            $molInics = MolInic::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
            $barsunirs = BarsuNir::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
            $hundredideas= HudredIdeas::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
            $gpnis=Gpni::select('name','created_at','id','owner')->where('user_id', auth()->id());
            $grant=Grant::select('name','created_at','id','owner')->where('user_id', auth()->id());
            
            $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->union($grant)->orderBy('created_at', $sort === 'old' ? 'asc' : 'desc')->paginate(7)->withQueryString();
            $notifications = auth()->user()->unreadNotifications;
            return view('cabinet', compact('items','sort','search'), ['notifications' => $notifications]);
    }
    if(Auth::user()->Role=="Admin"){
   
        $molInics = MolInic::select('name', 'created_at','id','owner');
        $barsunirs = BarsuNir::select('name', 'created_at','id','owner');
        $hundredideas= HudredIdeas::select('name', 'created_at','id','owner');
        $gpnis=Gpni::select('name','created_at','id','owner');
        $grant=Grant::select('name','created_at','id','owner');
        $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->union($grant)->orderBy('created_at', $sort === 'old' ? 'asc' : 'desc')->paginate(7)->withQueryString();
        $notifications = auth()->user()->unreadNotifications;
        return view('cabinet', compact('items','sort','search'), ['notifications' => $notifications]);
    }
   }
}
