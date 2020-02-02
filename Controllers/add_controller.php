<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class add_controller extends Controller
{
    function add_customer_data(Request $req) {
        $req->validate([
            'name'=>'required|string|max:100',
            'category'=>'required|in:Nasabah,Debitur',
            'Pic'=>'required',
        ]);

        $new = new Customer;
        $new->customer_name = $req->input('name');
        $new->customer_category = $req->input('category');
        $new->pic_id = $req->input('Pic');
        $new->save();

        return redirect('/');
    }
}
