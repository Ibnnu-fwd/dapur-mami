<?php

namespace App\Interfaces;

interface CatalogManagementInterface {
    public function get();
    public function store($data) :bool;
    public function destroy($id) :bool;
}
