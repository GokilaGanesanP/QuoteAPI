<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller
{
    public function customerInfo(Request $request)
    {
      $custName = '';
        $query = customer::query();
        if ($request->has('customer')) {
            $custName = $request->input('customer');
        }
        $query->where('customerName', $custName);
        $quote_info = $query->get();

        return api_response($quote_info, '201');       
    }
    
}


