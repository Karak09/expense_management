<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMasiRent extends Model
{
    use HasFactory;

    // ✅ Explicitly tell Laravel to use the `rent` table
    protected $table = 'rent';

    // ✅ Allow mass assignment for these fields
    protected $fillable = [
        'r_rent',
        'masi_rent',
        'e_bill',
        'total_e_bill',
        'edit_by'
    ];
}



// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class RoomMasiRent extends Model
// {
//     //
// }