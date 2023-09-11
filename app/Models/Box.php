<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $table = 'boxes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'item_id',
        'condition'
    ];

    public function computers(){
        return $this->belongsTo(computer::class, 'item_id', 'id');
    }
    public function keyboards() {
        return $this->belongsTo(keyboard::class, 'item_id', 'id');
    }
    public function joysticks() {
        return $this->belongsTo(joystick::class, 'item_id', 'id');
    }
    public function monitors() {
        return $this->belongsTo(monitor::class, 'item_id', 'id');
    }
    public function categories(){
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
