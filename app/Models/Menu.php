<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    const FOOD_CATEGORY  = 1;
    const DRINK_CATEGORY = 2;
    const OTHER_CATEGORY = 3;

    const FOOD_CATEGORY_MEANING  = 'Makanan';
    const DRINK_CATEGORY_MEANING = 'Minuman';
    const OTHER_CATEGORY_MEANING = 'Lainnya';

    const CATEGORIES = [
        [
            'id'   => self::FOOD_CATEGORY,
            'name' => self::FOOD_CATEGORY_MEANING
        ],
        [
            'id'   => self::DRINK_CATEGORY,
            'name' => self::DRINK_CATEGORY_MEANING
        ],
        [
            'id'   => self::OTHER_CATEGORY,
            'name' => self::OTHER_CATEGORY_MEANING
        ]
    ];

    const ACTIVE_STATUS   = 1;
    const INACTIVE_STATUS = 2;

    public $table = 'menus';

    protected $fillable = [
        'name',
        'price',
        'category',
        'description',
        'status',
        'weight',
        'image'
    ];
}
