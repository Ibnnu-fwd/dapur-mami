<?php

namespace App\Interfaces;

interface SettingInterface
{
    public function update(array $data, string $id): bool;
}
