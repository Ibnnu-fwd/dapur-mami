<?php

namespace App\Repositories;

use App\Interfaces\CatalogManagementInterface;
use App\Models\Menu;

class CatalogManagementRepository implements CatalogManagementInterface
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function get()
    {
        return $this->menu->get();
    }

    public function store($data): bool
    {
        if (isset($data['image'])) {
            $filename = $data['image']->getClientOriginalName();
            $data['image']->move(public_path('images/menu'), $filename);
            $data['image'] = 'images/menu/' . $filename;
        }

        $this->menu->create([
            'name'        => $data['name'],
            'price'       => $data['price'],
            'category'    => $data['category'],
            'weight'      => $data['weight'],
            'image'       => isset($data['image']) ? $data['image'] : null,
            'description' => $data['description'],
            'status'      => $this->menu::ACTIVE_STATUS
        ]);

        return true;
    }

    public function destroy($id): bool
    {
        $menu = $this->menu->find($id);
        if ($menu->image !== null) {
            unlink(public_path($menu->image));
        }
        $menu->delete();
        return true;
    }
}
