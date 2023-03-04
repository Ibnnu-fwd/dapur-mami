<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\InvoiceInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    private $invoice;

    public function __construct(InvoiceInterface $invoice)
    {
        $this->invoice = $invoice;
    }

    public function index()
    {
        return view('admin.invoice.index', [
            'invoices' => $this->invoice->get()->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->invoice->store($request->all());
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $invoice = $this->invoice->show($id);
        return view('admin.invoice.component.detail-order', [
            'invoice' => $invoice,
            'totalItemOrder' => $invoice->transactionDetails->sum('quantity'),
        ])->render();
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

    // Custom function

    public function period(Request $request)
    {
        return view('admin.invoice.component.invoice-item', [
            'invoices' => $this->invoice->period($request->period) ?? []
        ])->render();
    }

    public function search(Request $request) {
        return view('admin.invoice.component.invoice-item', [
            'invoices' => $this->invoice->search($request->search) ?? []
        ])->render();
    }
}
