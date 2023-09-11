<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cable extends Model
{
    use HasFactory;

    protected $table = 'cables';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bool_position',
        'position_id',
        'manufacturer_id',
        'type',
        'description'
    ];

    public function shelves(){
        return $this->belongsTo(shelf::class, 'position_id', 'id');
    }

    public function containers(){
        return $this->belongTo(container::class, 'position_id', 'id');
    }
    public function manufacturers(){
        return $this->belongsTo(manufacturer::class, 'manufacturer_id', 'id');
    }

    public function images(){
        return $this->hasMany(image::class, 'image_id', 'id');
    }

    public function issues(){
        return $this->hasMany(issue::class, 'issue_id', 'id');
    }
    public function computer(){
        return $this->belongsToMany(Cable::class, 'has', 'belong_id', 'computer_id');
    }
}
