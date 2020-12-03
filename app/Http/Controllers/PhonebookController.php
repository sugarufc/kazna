<?php

namespace App\Http\Controllers;

use App\Otdel;
use App\Page;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhonebookController extends Controller
{

    public function index(){
        $otdels = Otdel::all();
        $otdel_name = Otdel::find(98);
        $workers = $otdel_name->workers->sortBy('sort');
        return view('phonebook', compact('workers', 'otdel_name', 'otdels'));
    }

    public function otdel($id){
        $otdels = Otdel::all();
        $otdel_name = Otdel::find($id);
        $workers = $otdel_name->workers->sortBy('sort');
        return view('phonebook', compact( 'workers', 'otdel_name', 'otdels'));

    }
}
