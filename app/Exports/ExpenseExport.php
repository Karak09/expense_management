<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public static function getUserSummaries()
    {
        // Replace with your actual data retrieval logic
        return [
            ['id' => 1, 'name' => 'User 1', 'meal_expense' => 100, 'water_expense' => 50, 'extra_expense' => 20, 'total_meal' => 5, 'grand_total' => 170],
            ['id' => 2, 'name' => 'User 2', 'meal_expense' => 200, 'water_expense' => 100, 'extra_expense' => 40, 'total_meal' => 10, 'grand_total' => 340],
            // Add more data as needed
        ];
    }
}
