<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingsController extends Controller
{
    //

    public function billing()
    {
        return view('litigation_management.billings.billings.billing_lists');
    }

}
