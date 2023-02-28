<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CatalogManagementInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $catalogMenu;

    public function __construct(CatalogManagementInterface $catalogMenu)
    {
        $this->catalogMenu = $catalogMenu;
    }

    public function index()
    {
        return view('admin.booking.index');
    }

    public function create()
    {
        return view('admin.booking.create', [
            'menus' => $this->catalogMenu->get()
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
}
