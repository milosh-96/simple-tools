<?php

namespace App\Models\ItemLists;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    use HasFactory;

    protected $fillable = ["name","original_input","original_separator","json_list"];
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
