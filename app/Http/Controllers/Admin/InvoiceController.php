<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\InvoiceInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Adapter\PDFLib;
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

    public function search(Request $request)
    {
        return view('admin.invoice.component.invoice-item', [
            'invoices' => $this->invoice->search($request->search) ?? []
        ])->render();
    }

    public function print($id)
    {
        $invoice = $this->invoice->show($id);
        return Pdf::loadView('admin.invoice.component.print', [
            'invoice' => $invoice,
            'totalItemOrder' => $invoice->transactionDetails->sum('quantity'),
        ])->setOption('page-size', 'B5')->setOption('margin-top', 0)->setOption('margin-bottom', 0)->setOption('margin-left', 0)->setOption('margin-right', 0)->stream('invoice-' . $invoice->transaction_code . '.pdf');
    }

    public function detail($id) {
        return $this->invoice->show($id);
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $this->invoice->updateStatus($id, $request->status);
            return response()->json([
                'status' => true,
                'message' => 'Status berhasil diubah'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
