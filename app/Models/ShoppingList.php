<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'name', 'description', 'category_id', 'price', 'checked',
    ];
	
	public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
