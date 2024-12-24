<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [
        'country_id',
        'city_id',
        'details',
        'phone',
        'email',
        ];
        public function orders(): HasMany
        {
            return $this->hasMany(Order::class,'address_id');
        }

}
