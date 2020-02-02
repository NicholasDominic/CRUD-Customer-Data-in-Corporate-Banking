<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class delete_controller extends Controller
{
    function delete_data(Request $req)
    {
        $data = $req->except('_token', 'category', 'Pic');

        if (empty($data)) { }
        else {
                foreach ($data as $id) {
                    if (is_nan((int)$id)) { }
                    else Customer::destroy($id);
                }
        }
        return redirect('/');
    }
}
