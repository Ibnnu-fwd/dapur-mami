<?php

namespace App\Interfaces;

interface DeliveryOrderInterface {
    public function getByUserId($userId);
    public function store($data);
}
