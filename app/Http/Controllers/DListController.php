<?php

namespace App\Http\Controllers;
use App\Models\DonateList;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class DListController extends Controller
{
    public function index(){
        $listing = DonateList::latest();
        if(request('search')){
            $listing->where('name','like','%' . request('search') . '%')
                    ->orWhere('desc','like','%'.request('search').'%');
        }
        return view('listing',[
            'listing'=>$listing->paginate(3)
        ]);
    }
    public function show(DonateList $dlists){
        return view('list',[
            'lists' => $dlists
        ]);
    }

    public function dboard(){
        $listing = DonateList::latest();
        return view('dashboard',[
            'lists'=>$listing->get()
        ]);
    }
}
