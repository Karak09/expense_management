<?php
namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'date', 
        'meal_expense', 
        'meal_expense_rupees', 
        'extra_expense', 
        'extra_expense_rupees', 
        'water_expense', 
        'list_of_meal' ,
        'is_deleted' ,
        'created_by',
        'deleted_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}







// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Expense extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'date',
//         'meal_expense',
//         'extra_expense',
//         'water_expense',
//         'meal_count',
//     ];
// }







// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Expense extends Model
// {
//     //
// }
