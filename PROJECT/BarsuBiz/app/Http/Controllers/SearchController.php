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

class SearchController extends Controller
{
    public function search()
    {

        $type = request('type');
        $search = request('searchItem');
        $sort = request('sort');
        if($type=='search'){
        if(Auth::user()->Role=="User"){
            if (empty($search)) {
                $molInics = MolInic::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
                $barsunirs = BarsuNir::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
                $hundredideas= HudredIdeas::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
                $gpnis=Gpni::select('name','created_at','id','owner')->where('user_id', auth()->id());
                $grant=Grant::select('name','created_at','id','owner')->where('user_id', auth()->id());
                $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->orderBy('created_at', 'desc')->union($grant)->paginate(7)->withQueryString();
                $notifications = auth()->user()->unreadNotifications;
   
            }
            else{
            $molInics = MolInic::select('name', 'created_at','id','owner')->where('user_id', auth()->id())->where('nameProject', 'like', '%' . $search . '%');
            $barsunirs = BarsuNir::select('name', 'created_at','id','owner')->where('user_id', auth()->id())->where('workTheme', 'like', '%' . $search . '%');
            $hundredideas= HudredIdeas::select('name', 'created_at','id','owner')->where('user_id', auth()->id())->where('name_project', 'like', '%' . $search . '%');
            $gpnis=Gpni::select('name','created_at','id','owner')->where('user_id', auth()->id())->where('namePr', 'like', '%' . $search . '%');
            $grant=Grant::select('name','created_at','id','owner')->where('user_id', auth()->id())->where('workName', 'like', '%' . $search . '%');;
            $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->orderBy('created_at', 'desc')->union($grant)->paginate(7)->withQueryString();
            $notifications = auth()->user()->unreadNotifications;
          
            }
        }
        if(Auth::user()->Role=="Admin"){
            if (empty($search)) {
                $molInics = MolInic::select('name', 'created_at','id','owner');
                $barsunirs = BarsuNir::select('name', 'created_at','id','owner');
                $hundredideas= HudredIdeas::select('name', 'created_at','id','owner');
                $gpnis=Gpni::select('name','created_at','id','owner');
                $grant=Grant::select('name','created_at','id','owner');
                $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->orderBy('created_at', 'desc')->union($grant)->paginate(7)->withQueryString();
                $notifications = auth()->user()->unreadNotifications;
            
            }
            else{
            $molInics = MolInic::select('name', 'created_at','id','owner')->where('nameProject', 'like', '%' . $search . '%');
            $barsunirs = BarsuNir::select('name', 'created_at','id','owner')->where('workTheme', 'like', '%' . $search . '%');
            $hundredideas= HudredIdeas::select('name', 'created_at','id','owner')->where('name_project', 'like', '%' . $search . '%');
            $gpnis=Gpni::select('name','created_at','id','owner')->where('namePr', 'like', '%' . $search . '%');
            $grant=Grant::select('name','created_at','id','owner')->where('workName', 'like', '%' . $search . '%');;
            $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->orderBy('created_at', 'desc')->union($grant)->paginate(7)->withQueryString();
            $notifications = auth()->user()->unreadNotifications;
           
            }
        }
    }
    if($type=="sort"){
        if(Auth::user()->Role=="User"){
            $molInics = MolInic::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
            $barsunirs = BarsuNir::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
            $hundredideas= HudredIdeas::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
            $gpnis=Gpni::select('name','created_at','id','owner')->where('user_id', auth()->id());
            $grant=Grant::select('name','created_at','id','owner')->where('user_id', auth()->id());
            
            $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->union($grant)->orderBy('created_at', $sort === 'old' ? 'asc' : 'desc')->paginate(7)->withQueryString();
            $notifications = auth()->user()->unreadNotifications;
           
    }
    if(Auth::user()->Role=="Admin"){
   
        $molInics = MolInic::select('name', 'created_at','id','owner');
        $barsunirs = BarsuNir::select('name', 'created_at','id','owner');
        $hundredideas= HudredIdeas::select('name', 'created_at','id','owner');
        $gpnis=Gpni::select('name','created_at','id','owner');
        $grant=Grant::select('name','created_at','id','owner');
        $items = $molInics->concat($barsunirs)->concat($hundredideas)->concat($gpnis)->concat($grant)->orderBy('created_at', $sort === 'old' ? 'asc' : 'desc')->paginate(7)->withQueryString();
        $notifications = auth()->user()->unreadNotifications;
      
    }
    }
    return view('cabinet', compact('items','sort','search'), ['notifications' => $notifications]);

    }
}
