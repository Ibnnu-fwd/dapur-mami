<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DeliveryOrderInterface;
use Illuminate\Http\Request;

class DeliveryOrderController extends Controller
{
    private $deliveryOrder;

    public function __construct(DeliveryOrderInterface $deliveryOrder)
    {
        $this->deliveryOrder = $deliveryOrder;
    }

    public function index()
    {
        return view('user.delivery-order.index', [
            'transactions' => $this->deliveryOrder->getByUserId(auth()->user()->id)
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice'           => ['required'],
            'customer_name'     => ['required'],
            'payment_method'    => ['required'],
            'total_payment'     => ['required'],
            'sub_total'         => ['required'],
            'delivery_address'  => ['required'],
            'delivery_note'     => ['required'],
            'delivery_phone'    => ['required']
        ]);

        try {
            $this->deliveryOrder->store($request->all());
            return response()->json([
                'status'    => 'success',
                'message'   => 'Pemesanan berhasil dilakukan!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
