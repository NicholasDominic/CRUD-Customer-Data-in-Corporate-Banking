<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class display extends Controller
{
    function showData(){
        $cust = Customer::sortable()->paginate(3);
        return view('welcome', ['for_each_cust' => $cust], compact($cust));
    }
}
