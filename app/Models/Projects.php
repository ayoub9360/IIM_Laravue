<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = ['title', 'description', 'start_date', 'end_date', "finished", "day_sold", "customers_id", "responsable_name", "responsable_surname", "responsable_number"];


    use HasFactory;

    public function customers()
    {
        return $this->hasMany(Customers::class);
    }
}
