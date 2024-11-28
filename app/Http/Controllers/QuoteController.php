<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QuoteController extends Controller
{

   
    public function index()
    {

    $quote_info = DB::table('quotes')
    ->leftJoin('customers', 'quotes.customerId', '=', 'customers.id')
    ->select('quotes.id', 'quotes.quoteName', 'customers.customerName', 'customers.serialNo', 'customers.planNo', 'quotes.warantyTerms', 'quotes.warantyHrs') 
    ->get();

        return api_response($quote_info, '201');       
    }
    

    public function createQuote(Request $request)
    {

        if($request->custid != "")
        {
            $validated = $request->validate([
                'quotename' => 'required|string|max:30',
                'custname' => 'required|string|max:20'
            ]);

            $quote = new Quote;
            $quote->quoteName = $request->quotename;
            $quote->customerName = $request->custname;
            $quote->customerType = "k";            
            $quote->serialNo = $request->serialno;
            $quote->planNo = $request->planno;
            $quote->warantyTerms = $request->warantyterms;
            $quote->warantyHrs = $request->warantyhrs;
            $quote->customerId = $request->custid;

            $quote->save();
            return api_response('Quote Information Added', '201');
        }
        else
        {
            $customer = new customer;
           
            $customer->customerName = $request->custname;
            $customer->serialNo = $request->serialno;
            $customer->planNo = $request->planno;

            $customer->save();

            $insertedId = $customer->id;


            $quote = new Quote;
            $quote->quoteName = $request->quotename;
            $quote->customerName = $request->custname;
            $quote->customerType = "k";
            $quote->serialNo = $request->serialno;
            $quote->planNo = $request->planno;
            $quote->warantyTerms = $request->warantyterms;
            $quote->warantyHrs = $request->warantyhrs;
            $quote->customerId = $insertedId;


            $quote->save();
            return api_response('Quote Information Added', '201');
        }


            


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
