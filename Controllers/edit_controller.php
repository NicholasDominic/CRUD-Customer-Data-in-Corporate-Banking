<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class edit_controller extends Controller
{
    function edit(Request $req) {
        $data = $req->except('_token', 'category', 'Pic');
        $kat = $req->input('category');
        $pic = $req->input('Pic');

        if(empty($data)) { }
        else {
            foreach($data as $array)
            foreach($array as $id) {
                if(is_nan((int)$id)) { }
                else {
                    $item = Customer::findorfail($id);

                    if(!empty($kat))
                    $item->customer_category = $kat;

                    if(!empty($pic))
                    $item->pic_id = $pic;

                    $item->save();
                }
            }
        }
        return redirect('/');
    }
}
