<?php

namespace App\Repositories;

use App\Interfaces\InvoiceInterface;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class InvoiceRepository implements InvoiceInterface
{
    private $transaction;
    private $transactionDetail;

    public function __construct(Transaction $transaction, TransactionDetail $transactionDetail)
    {
        $this->transaction = $transaction;
        $this->transactionDetail = $transactionDetail;
    }


    public function store($data)
    {
        DB::beginTransaction();

        // Store to transactions table
        try {
            $transaction = $this->transaction->create([
                'users_id'         => auth()->user()->id,
                'discounts_id'     => isset($data['discounts_id']) ? $data['discounts_id'] : null,
                'transaction_code' => $this->transaction->generateTransactionCode(),
                'customer_name'    => $data['customer_name'],
                'payment_method'   => Transaction::PAYMENT_METHOD_CASH,
                'total_payment'    => $data['total'],
                'status'           => Transaction::PENDING_STATUS,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }

        try {
            // Store to transaction_details table
            foreach ($data['cart'] as $cart) {
                $this->transactionDetail->create([
                    'transactions_id' => $transaction->id,
                    'discounts_id'    => isset($cart['discounts_id']) ? $cart['discounts_id'] : null,
                    'menus_id'        => $cart['id'],
                    'quantity'        => $cart['quantity'],
                    'price'           => $cart['price'],
                    'total'           => $cart['total'],
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }

        DB::commit();
    }
}
