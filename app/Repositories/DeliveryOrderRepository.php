<?php

namespace App\Repositories;

use App\Interfaces\DeliveryOrderInterface;
use App\Models\DeliveryOrder;
use App\Models\DetailDeliveryOrder;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class DeliveryOrderRepository implements DeliveryOrderInterface
{
    private $deliveryOrder;
    private $detailDeliveryOrder;

    public function __construct(DeliveryOrder $deliveryOrder, DetailDeliveryOrder $detailDeliveryOrder) {
        $this->deliveryOrder          = $deliveryOrder;
        $this->detailDeliveryOrder    = $detailDeliveryOrder;
    }

    public function store($data)
    {
        $delivery_time = Carbon::now()->toTimeString();
        $delivery_date = date('Y-m-d');

        DB::beginTransaction();

        // insert to delivery_orders table
        try {
            $deliveryOrder = $this->deliveryOrder->create([
                'users_id'          => auth()->user()->id,
                'invoice'           => $data['invoice'],
                'customer_name'     => $data['customer_name'],
                'payment_method'    => $data['payment_method'],
                'total_payment'     => $data['total_payment'],
                'sub_total'         => $data['sub_total'],
                'delivery_time'     => $delivery_time,
                'delivery_date'     => $delivery_date,
                'delivery_address'  => $data['delivery_address'],
                'delivery_phone'    => $data['delivery_phone'],
                'delivery_note'     => $data['delivery_note']
            ]);
        } catch (Exception $e) {
            throw $e;
            DB::rollback();
        }

        // insert to detail_delivery_orders table
        try {
            foreach($data['cart'] as $cart) {
                $this->detailDeliveryOrder->create([
                    'delivery_orders_id'    => $deliveryOrder->id,
                    'menu_id'               => $cart['id'],
                    'price'                 => $cart['price'],
                    'quantity'              => $cart['quantity'],
                    'total'                 => $cart['total']
                ]);
            }
        } catch (Exception $e) {
            throw $e;
            DB::rollback();
        }

        DB::commit();
    }

    public function getByUserId($userId)
    {
        return $this->deliveryOrder->with(['detailDeliveryOrders', 'user'])->where('users_id', $userId)->get();
    }
}
