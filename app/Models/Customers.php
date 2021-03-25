<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['description', 'social_reason', 'legal_status', 'capital', "capital", "siret_number", "naf_code", "country", "adress", "zip_code", "city"];

    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Projects::class);
    }
}
