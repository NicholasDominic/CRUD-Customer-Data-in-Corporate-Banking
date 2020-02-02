<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Select2Controller extends Controller
{
    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table('customer_table')
                ->leftJoin('pic_table', 'customer_table.pic_id', '=', 'pic_table.pic_id')
                ->select('customer_id', 'customer_name')
                ->where('customer_name', 'LIKE', '%'.$search.'%')
                ->orWhere('customer_category', 'LIKE', '%'.$search.'%')
                ->orWhere('pic_code', 'LIKE', '%'.$search.'%')->get();
            return response()->json($data);
        }
    }
}
