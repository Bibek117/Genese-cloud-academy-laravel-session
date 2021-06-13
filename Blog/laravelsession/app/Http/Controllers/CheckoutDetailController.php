<?php

namespace App\Http\Controllers;

use App\Models\CheckoutDetail;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutDeatilRequest;
use Illuminate\Support\Facades\Auth;

class CheckoutDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutDeatilRequest $request)
    {
        $detail = new CheckoutDetail();
        $detail->name = $request['name'];
        $detail->user_id = Auth::user()->id;
        $detail->email =$request['email'];
        $detail->phone_number = $request['phone_number'];
        $detail->province = $request['province'];
        $detail->district =$request['district'];
        $detail->address= $request['address'];
        $detail->save();
        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CheckoutDetail $checkoutDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckoutDetail $checkoutDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function update(CheckoutDeatilRequest $request, CheckoutDetail $checkoutDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckoutDetail $checkoutDetail)
    {
        //
    }
}
