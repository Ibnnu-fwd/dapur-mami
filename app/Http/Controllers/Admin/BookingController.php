<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\BookingInterface;
use App\Interfaces\CatalogManagementInterface;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class BookingController extends Controller
{
    private $catalogMenu;
    private $booking;

    public function __construct(CatalogManagementInterface $catalogMenu, BookingInterface $booking)
    {
        $this->catalogMenu = $catalogMenu;
        $this->booking = $booking;
    }

    public function index()
    {
        return view('admin.booking.index', [
            'bookings' => $this->booking->get()
        ]);
    }

    public function create()
    {
        return view('admin.booking.create', [
            'menus' => $this->catalogMenu->get()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $this->booking->store($request->all());
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id)
    {
        return $this->booking->find($id);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    // Custom function

    public function addCart($id)
    {
        $menu = $this->catalogMenu->find($id);
        return view('admin.booking.component.menu-item', [
            'menu' => $menu
        ])->render();
    }

    public function detail($id)
    {
        return view('admin.booking.component.detail-order', [
            'booking' => $this->booking->find($id)
        ])->render();
    }

    public function print($id)
    {
    }

    public function period(Request $request)
    {
        return response()->json($this->booking->period($request->period));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $this->booking->updateStatus($id, $request->status);
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

    public function cancel($id) {
        try {
            $this->booking->cancel($id);
            return response()->json([
                'status' => true,
                'message' => 'Booking berhasil dibatalkan'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
