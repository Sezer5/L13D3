<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name', 'slug'])]
class Keywords extends Model
{
    public function getRouteKeyName()
    {
        return "slug";
    }
}
