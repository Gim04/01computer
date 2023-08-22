<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;
    protected $table = 'keyboards';
    protected $primaryKey= 'id';
    protected $fillable = [
        'bool_position',
        'position_id',
        'manufacturer_id',
        'inventory_number',
        'serial_number',
        'year',
        'model',
        'layout',
        'switch',
        'description',
    ];
    public function shelves(){
        return $this->belongsTo(shelf::class, 'position_id', 'id');
    }
    public function containers(){
        return $this->belongTo(container::class, 'position_id', 'id');
    }
    
    public function manufacturers(){
        return $this->belongsTo(manufacturer::class, 'manufaturer_id', 'id');
    }

    public function images(){
        return $this->hasMany(image::class, 'item_id', 'id');
    }

    public function issues(){
        return $this->hasMany(issue::class, 'item_id', 'id');
    }

    public function boxes(){
        return $this->hasOne(box::class, 'item_id', 'id');
    }
}
