<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\RoomMasiRent;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExpenseExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\ExpensesMail;
use Illuminate\Support\Facades\Mail;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $greeting = $this->getGreeting();

        // Default to current month and year if not selected
        $month = $request->query('month', now()->format('F'));
        $year = $request->query('year', now()->format('Y'));

        $monthNumber = Carbon::parse($month)->format('m');

        $expenses = Expense::where('is_deleted', 0)
            ->whereYear('date', $year)
            ->whereMonth('date', $monthNumber)
            ->with(['creator', 'editor'])
            ->orderBy('updated_at', 'desc') // order by last updated
            ->get();

        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        return view('expenses.index', compact('expenses', 'greeting', 'months'));
    }


    public function store(Request $request)
{
    try {
    $validated = $request->validate([
        'date' => 'required|date',
        'meal_expense' => 'nullable|string|max:255',
        'meal_expense_rupees' => 'nullable|numeric',
        'extra_expense' => 'nullable|string|max:255',
        'extra_expense_rupees' => 'nullable|numeric',
        'water_expense' => 'nullable|numeric',
        'list_of_meal' => 'nullable|numeric',
    ]);

    $userId = Auth::id();
    $date = $validated['date'];

    // Check if an entry already exists for this user on the given date (and not soft-deleted)
    $existingExpense = Expense::where('date', $date)
        ->where('created_by', $userId)
        ->where('is_deleted', 0)
        ->first();

    if ($existingExpense) {
        return redirect()->back()->with('error', 'Expense for this date already exists!');
    }

    $validated['created_by'] = $userId;
    $validated['is_deleted'] = 0;

    Expense::create($validated);

    return redirect()->back()->with('success', 'Expense Added Successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'meal_expense' => 'nullable|string|max:255',
            'meal_expense_rupees' => 'nullable|numeric',
            'extra_expense' => 'nullable|string|max:255',
            'extra_expense_rupees' => 'nullable|numeric',
            'water_expense' => 'nullable|numeric',
            'list_of_meal' => 'nullable|numeric',
        ]);

        $expense = Expense::findOrFail($id);
        $validated['deleted_by'] = Auth::id(); // updating creator info

        $expense->update($validated);

        return redirect()->back()->with('success', 'Expense Updated Successfully!');
    }

    // public function destroy($id)
    // {
    //     $expense = Expense::findOrFail($id);
    //     $expense->is_deleted = 1;
    //     $expense->deleted_by = Auth::id(); // track who deleted
    //     $expense->save();
    //     return redirect()->back()->with('success', 'Expense Deleted Successfully!');
    // }

    private function getGreeting()
    {
        $hour = date('H');
        if ($hour < 12) return 'Good Morning';
        elseif ($hour < 18) return 'Good Evening';
        else return 'Good Night';
    }

    public function eventUsers()
    {
        $users = User::where('is_deleted', 0)->get();
        return response()->json($users);
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->update([
                'name' => $request->name,
                'city' => $request->city,
                'district' => $request->district,
                'pin' => $request->pin,
            ]);
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->is_deleted = 1;
            $user->deleted = Carbon::now(); // Save current date and time
            $user->save();
            return response()->json(['status' => 'deleted']);
        }
        return response()->json(['status' => 'failed']);
    }

//////////////////////////16.04.2025//////////////////////////////////////

// public function after()
// {
//     $users = User::where('is_deleted', 0)
//         ->select('id', 'name')
//         ->get();

//     foreach ($users as $user) {
//         $summary = DB::table('expenses')
//             ->select(
//                 DB::raw('SUM(meal_expense_rupees) as total_meal_expense'),
//                 DB::raw('SUM(water_expense) as total_water_expense'),
//                 DB::raw('SUM(extra_expense_rupees) as total_extra_expense'),
//                 DB::raw('SUM(list_of_meal) as total_meal')
//             )
//             ->where('created_by', $user->id)
//             ->first();

//         $user->summary = $summary; // attach summary as a custom property
//     }

//     return view('expenses.after', compact('users'));
// }

    public function previous(Request $request)
    {
        $selectedMonth = $request->input('month', now()->subMonth()->month);
        $selectedYear = $request->input('year', now()->subMonth()->year);
        $selectedMonthName = date('F', mktime(0, 0, 0, $selectedMonth, 1));
        

        $selectedDate = Carbon::createFromDate($selectedYear, $selectedMonth, 1);

        // Get users who were active in the selected month
        $users = User::where(function ($query) use ($selectedDate) {
                $query->whereNull('deleted') // still active
                    ->orWhereDate('deleted', '>=', $selectedDate->startOfMonth());
            })
            ->whereDate('created_at', '<=', $selectedDate->endOfMonth())
            ->with(['expenses' => function ($query) use ($selectedMonth, $selectedYear) {
                $query->where('is_deleted', 0)
                    ->whereMonth('created_at', $selectedMonth)
                    ->whereYear('created_at', $selectedYear);
            }])
            ->get();

        $totalMealExpense = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->sum('meal_expense_rupees');

        $totalMeals = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->sum('list_of_meal');

        $totalWater = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->sum('water_expense');

        $totalExtra = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->sum('extra_expense_rupees');

        $roomMasiRents = DB::table('rent')
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->get();

        $totalRent = $roomMasiRents->sum('r_rent');
        $totalMasi = $roomMasiRents->sum('masi_rent');
        $totalElectric = $roomMasiRents->sum('e_bill');

        $totalUsers = $users->count();
        $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
        $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;
        $totalBill = $totalUsers > 0 ? ($totalRent + $totalMasi + $totalElectric) / $totalUsers : 0;
        $perHeadRoomRent = $totalUsers > 0 ? ($totalRent + $totalMasi + $totalElectric) / $totalUsers : 0;
        // dd($totalBill);
        $userSummaries = $users->map(function ($user) use ($perMeal, $netAndOthers) {
            $mealExpense = $user->expenses->sum('meal_expense_rupees');
            $waterExpense = $user->expenses->sum('water_expense');
            $extraExpense = $user->expenses->sum('extra_expense_rupees');
            $totalMeal = $user->expenses->sum('list_of_meal');
            $grandTotal = $mealExpense + $waterExpense + $extraExpense;

            $givetack = $grandTotal - (($totalMeal * $perMeal) + $netAndOthers);

            return [
                'name' => $user->name,
                'meal_expense' => $mealExpense,
                'water_expense' => $waterExpense,
                'extra_expense' => $extraExpense,
                'total_meal' => $totalMeal,
                'grand_total' => $grandTotal,
                'givetack' => $givetack
            ];
        });
dd($userSummaries);
        return view('expenses.previous', compact(
            'users', 'perMeal', 'netAndOthers', 'totalMealExpense', 'totalMeals',
            'userSummaries', 'roomMasiRents', 'totalRent', 'totalMasi', 'totalElectric', 'totalBill', 'selectedMonthName','perHeadRoomRent'
        ));
        
    }

//////////////////////////20.04.2025/////////////////////////

    public function storeRoomMasi(Request $request)
    {
        RoomMasiRent::create([
            'r_rent' => $request->r_rent,
            'masi_rent' => $request->masi_rent,
            'e_bill' => $request->e_bill,
            'total_e_bill' => $request->total_e_bill,
            'edit_by' => Auth::id(),
            'created_at' => now(), // Ensure the created_at timestamp is set
        ]);

        return redirect()->back()->with('success', 'Room & Masi expenses added!');
    }

    public function checkSubmission()
    {
        $lastSubmission = RoomMasiRent::orderBy('created_at', 'desc')->first();

        if ($lastSubmission) {
            $lastSubmissionMonth = $lastSubmission->created_at->format('Y-m');
            $currentMonth = now()->format('Y-m');

            return response()->json(['canSubmit' => $lastSubmissionMonth !== $currentMonth]);
        }

        return response()->json(['canSubmit' => true]);
    }

    public function updateRoomMasi(Request $request, $id)
    {
        $request->validate([
            'r_rent' => 'required|numeric',
            'masi_rent' => 'required|numeric',
            'e_bill' => 'required|numeric',
            'total_e_bill' => 'required|numeric',
        ]);

        $record = RoomMasiRent::findOrFail($id);
        $record->update([
            'r_rent' => $request->r_rent,
            'masi_rent' => $request->masi_rent,
            'e_bill' => $request->e_bill,
            'total_e_bill' => $request->total_e_bill,
        ]);

        return redirect()->back()->with('success', 'Updated successfully!');
    }

///////////////////////21.04.2025////////////////////
    public function afterAlt()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Fetch users with their expenses
        // $users = User::where('is_deleted', 0)->with(['expenses' => function ($query) {
        //     $query->where('is_deleted', 0);
        // }])->get();

        $users = User::where('is_deleted', 0)->with(['expenses' => function ($query) use ($currentMonth, $currentYear) {
            $query->where('is_deleted', 0)
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear);
        }])->get();

        // Totals for overall expenses
        $totalMealExpense = DB::table('expenses')->where('is_deleted', 0)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('meal_expense_rupees');

        $totalMeals = DB::table('expenses')->where('is_deleted', 0)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('list_of_meal');

        $totalWater = DB::table('expenses')->where('is_deleted', 0)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('water_expense');

        $totalExtra = DB::table('expenses')->where('is_deleted', 0)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('extra_expense_rupees');

        $rentData = DB::table('rent')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->first();
        
        
            

        $totalUsers = $users->count();
        $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
        $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;
        $perHeadRoomRent = $totalUsers > 0 && $rentData ? (($rentData->r_rent + $rentData->masi_rent + $rentData->e_bill) / $totalUsers) : 0;
        // dd($perHeadRoomRent);
        // User-wise summary, calculating individual user expenses and their grand total
        $userSummaries = $users->map(function ($user) use ($perMeal, $netAndOthers) {
            $mealExpense = $user->expenses->sum('meal_expense_rupees');
            $waterExpense = $user->expenses->sum('water_expense');
            $extraExpense = $user->expenses->sum('extra_expense_rupees');
            $totalMeal = $user->expenses->sum('list_of_meal');
            $grandTotal = $mealExpense + $waterExpense + $extraExpense;
            // $deoaache = $mealExpense + $extraExpense;
            // dd($grandTotal);
            // Calculate givetack for each user
            $givetack = $grandTotal - (($totalMeal * $perMeal) + $netAndOthers);
            // dd($mealExpense);

            return [
                'name' => $user->name,
                'meal_expense' => $mealExpense,
                'water_expense' => $waterExpense,
                'extra_expense' => $extraExpense,
                'total_meal' => $totalMeal,
                'grand_total' => $grandTotal,
                'givetack' => $givetack // Store the result for the user
            ];
        });

        
        return view('expenses.after', compact(
            'users', 'perMeal', 'netAndOthers', 'totalMealExpense', 'totalMeals',
            'userSummaries', 'totalWater', 'totalExtra', 'totalUsers', 'perHeadRoomRent'
        ));
    }

    public function exportPdf()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
    
        // Fetch users with current month's expenses
        $users = User::where('is_deleted', 0)
            ->with(['expenses' => function ($query) use ($currentMonth, $currentYear) {
                $query->where('is_deleted', 0)
                      ->whereMonth('date', $currentMonth)
                      ->whereYear('date', $currentYear);
            }])
            ->get();
    
        // Totals for overall expenses (current month only)
        $totalMealExpense = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('meal_expense_rupees');
    
        $totalMeals = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('list_of_meal');
    
        $totalWater = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('water_expense');
    
        $totalExtra = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('extra_expense_rupees');
    
        $totalUsers = $users->count();
        $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
        $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;
    
        $userSummaries = $users->map(function ($user) use ($perMeal, $netAndOthers) {
            $mealExpense = $user->expenses->sum('meal_expense_rupees');
            $waterExpense = $user->expenses->sum('water_expense');
            $extraExpense = $user->expenses->sum('extra_expense_rupees');
            $totalMeal = $user->expenses->sum('list_of_meal');
            $grandTotal = $mealExpense + $waterExpense + $extraExpense;
    
            return [
                'name' => $user->name,
                'meal_expense' => $mealExpense,
                'water_expense' => $waterExpense,
                'extra_expense' => $extraExpense,
                'total_meal' => $totalMeal,
                'grand_total' => $grandTotal,
            ];
        });
    
        // Give/Take logic
        $giveMoneyData = [];
        $receivedMoneyData = [];
        foreach ($userSummaries as $summary) {
            $difference = $summary['grand_total'] - (($summary['total_meal'] * $perMeal) + $netAndOthers);
            $give = $difference < 0 ? abs($difference) : 0;
            $receive = $difference > 0 ? $difference : 0;
    
            $giveMoneyData[$summary['name']] = $give;
            $receivedMoneyData[$summary['name']] = $receive;
        }
    
        // Filter Room & Masi for current month/year
        $roomMasiData = RoomMasiRent::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();
    
        $totalRent = DB::table('rent')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('r_rent');
    
        $totalMasi = DB::table('rent')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('masi_rent');
    
        $totalElectric = DB::table('rent')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('e_bill');
    
        $totalBill = $totalUsers > 0 ? ($totalRent + $totalMasi + $totalElectric) / $totalUsers : 0;
    
        $pdf = PDF::loadView('expenses.export-pdf', compact(
            'userSummaries',
            'totalMealExpense',
            'totalMeals',
            'perMeal',
            'netAndOthers',
            'giveMoneyData',
            'receivedMoneyData',
            'roomMasiData',
            'totalBill'
        ));
    
        return $pdf->download('expense_report_' . date('F_Y') . '.pdf');
    }

    public function downloadPreviousMonthPDF()
    {
        $previousMonth = now()->subMonth()->month;
        $previousYear = now()->subMonth()->year;
        $previousMonthName = now()->subMonth()->format('F'); // Get the previous month's name

        $users = User::where('is_deleted', 0)->with(['expenses' => function ($query) use ($previousMonth, $previousYear) {
            $query->where('is_deleted', 0)
                ->whereMonth('created_at', $previousMonth)
                ->whereYear('created_at', $previousYear);
        }])->get();

        // Totals for overall expenses for the previous month
        $totalMealExpense = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('meal_expense_rupees');

        $totalMeals = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('list_of_meal');

        $totalWater = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('water_expense');

        $totalExtra = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('extra_expense_rupees');

        $totalUsers = $users->count();
        $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
        $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;

        // User-wise summary, calculating individual user expenses and their grand total
        $userSummaries = $users->map(function ($user) use ($perMeal, $netAndOthers) {
            $mealExpense = $user->expenses->sum('meal_expense_rupees');
            $waterExpense = $user->expenses->sum('water_expense');
            $extraExpense = $user->expenses->sum('extra_expense_rupees');
            $totalMeal = $user->expenses->sum('list_of_meal');
            $grandTotal = $mealExpense + $waterExpense + $extraExpense;

            return [
                'name' => $user->name,
                'meal_expense' => $mealExpense,
                'water_expense' => $waterExpense,
                'extra_expense' => $extraExpense,
                'total_meal' => $totalMeal,
                'grand_total' => $grandTotal,
            ];
        });

        // Calculate give and receive data
        $giveMoneyData = [];
        $receivedMoneyData = [];
        foreach ($userSummaries as $summary) {
            $difference = $summary['grand_total'] - (($summary['total_meal'] * $perMeal) + $netAndOthers);
            $give = $difference < 0 ? abs($difference) : 0;
            $receive = $difference > 0 ? $difference : 0;

            $giveMoneyData[$summary['name']] = $give;
            $receivedMoneyData[$summary['name']] = $receive;
        }

        // Fetch Room & Masi data for the previous month
        $roomMasiData = DB::table('rent')
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->get();

        // Calculate total bill for the previous month
        $totalRent = $roomMasiData->sum('r_rent');
        $totalMasi = $roomMasiData->sum('masi_rent');
        $totalElectric = $roomMasiData->sum('e_bill');
        $totalBill = $totalUsers > 0 ? ($totalRent + $totalMasi + $totalElectric) / $totalUsers : 0;

        // Pass the data to the PDF view, including the previous month's name
        $pdf = PDF::loadView('expenses.export-pdf', compact('userSummaries', 'totalMealExpense', 'totalMeals', 'perMeal', 'netAndOthers', 'giveMoneyData', 'receivedMoneyData', 'roomMasiData', 'totalBill', 'previousMonthName'));

        // Download the PDF
        return $pdf->download('expense_report.pdf');
    }

    public function showPreBill()
    {
        // Just show the dropdown page initially
        return view('expenses.pre_bill');
    }

    public function fetchPreBill(Request $request)
    {
        $previousMonth = now()->subMonth()->month;
        $previousYear = now()->subMonth()->year;
    
        $users = User::where('is_deleted', 0)->with(['expenses' => function ($query) use ($previousMonth, $previousYear) {
            $query->where('is_deleted', 0)
                  ->whereMonth('created_at', $previousMonth)
                  ->whereYear('created_at', $previousYear);
        }])->get();
    
        $totalMealExpense = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('meal_expense_rupees');
    
        $totalMeals = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('list_of_meal');
    
        $totalWater = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('water_expense');
    
        $totalExtra = DB::table('expenses')
            ->where('is_deleted', 0)
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('extra_expense_rupees');
    
        // 💥 NEW - Get Room & Masi Rent only for previous month
        $roomMasiRents = DB::table('rent')
            ->whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->get();
    
        $totalRent = $roomMasiRents->sum('r_rent');
        $totalMasi = $roomMasiRents->sum('masi_rent');
        $totalElectric = $roomMasiRents->sum('e_bill');
    
        $totalUsers = $users->count();
        $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
        $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;
        $totalBill = $totalUsers > 0 ? ($totalRent + $totalMasi + $totalElectric) / $totalUsers : 0;
    
        $userSummaries = $users->map(function ($user) use ($perMeal, $netAndOthers) {
            $mealExpense = $user->expenses->sum('meal_expense_rupees');
            $waterExpense = $user->expenses->sum('water_expense');
            $extraExpense = $user->expenses->sum('extra_expense_rupees');
            $totalMeal = $user->expenses->sum('list_of_meal');
            $grandTotal = $mealExpense + $waterExpense + $extraExpense;
    
            $givetack = $grandTotal - (($totalMeal * $perMeal) + $netAndOthers);
    
            return [
                'name' => $user->name,
                'meal_expense' => $mealExpense,
                'water_expense' => $waterExpense,
                'extra_expense' => $extraExpense,
                'total_meal' => $totalMeal,
                'grand_total' => $grandTotal,
                'givetack' => $givetack
            ];
        });
    
        return view('expenses.previous', compact(
            'users', 'perMeal', 'netAndOthers', 'totalMealExpense', 'totalMeals',
            'userSummaries', 'roomMasiRents', 'totalRent', 'totalMasi', 'totalElectric', 'totalBill'
        ));
    }


    

    ////////////////////////// 03.05.2025 //////////////////
    // public function sendmail()
    // {
    //     $month = now()->subMonth()->month;
    //     $year = now()->subMonth()->year;
    //     $monthName = Carbon::create()->month($month)->format('F');

    //     $users = User::where('is_deleted', 0)->get();

    //     // same calculations from your previous() method:
    //     $expenses = DB::table('expenses')
    //         ->where('is_deleted', 0)
    //         ->whereMonth('created_at', $month)
    //         ->whereYear('created_at', $year);

    //     $roomMasiRents = DB::table('rent')
    //         ->whereMonth('created_at', $month)
    //         ->whereYear('created_at', $year)
    //         ->get();

    //     $totalMealExpense = $expenses->sum('meal_expense_rupees');
    //     $totalMeals = $expenses->sum('list_of_meal');
    //     $totalWater = $expenses->sum('water_expense');
    //     $totalExtra = $expenses->sum('extra_expense_rupees');
    //     $totalRent = $roomMasiRents->sum('r_rent');
    //     $totalMasi = $roomMasiRents->sum('masi_rent');
    //     $totalElectric = $roomMasiRents->sum('e_bill');

    //     $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
    //     $totalUsers = $users->count();
    //     $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;
    //     $perHeadRoomRent = $totalUsers > 0 ? ($totalRent + $totalMasi + $totalElectric) / $totalUsers : 0;

    //     foreach ($users as $user) {
    //         $userExpenses = $user->expenses()
    //             ->where('is_deleted', 0)
    //             ->whereMonth('created_at', $month)
    //             ->whereYear('created_at', $year)
    //             ->get();

    //         $mealExpense = $userExpenses->sum('meal_expense_rupees');
    //         $waterExpense = $userExpenses->sum('water_expense');
    //         $extraExpense = $userExpenses->sum('extra_expense_rupees');
    //         $totalMeal = $userExpenses->sum('list_of_meal');
    //         $grandTotal = $mealExpense + $waterExpense + $extraExpense;

    //         $givetack = $grandTotal - (($totalMeal * $perMeal) + $netAndOthers);

    //         $summary = [
    //             'name' => $user->name,
    //             'meal_expense' => $mealExpense,
    //             'water_expense' => $waterExpense,
    //             'extra_expense' => $extraExpense,
    //             'total_meal' => $totalMeal,
    //             'grand_total' => $grandTotal,
    //             'givetack' => $givetack,
    //             'month_name' => $monthName,
    //         ];

    //         $pdf = PDF::loadView('expenses.pdf', compact('summary'));

    //         $pdfPath = storage_path("app/public/{$user->id}_summary_{$monthName}.pdf");
    //         $pdf->save($pdfPath);

    //         $subject = "{$monthName} Expense";
    //         $msg = "Below the attached PDF, you will find how much amount you give or get.";

    //         Mail::to($user->mail)->send(new ExpensesMail($msg, $subject, $pdfPath));
    //     }

    //     return "Monthly emails sent successfully.";
    // }



}

/////////////// woring fine for previous month bill generate //////////////////

// public function downloadPreviousMonthPDF()
// {
//     $previousMonth = now()->subMonth()->month;
//     $previousYear = now()->subMonth()->year;
//     $previousMonthName = now()->subMonth()->format('F');

//     $users = User::where('is_deleted', 0)->with(['expenses' => function ($query) use ($previousMonth, $previousYear) {
//         $query->where('is_deleted', 0)
//               ->whereMonth('created_at', $previousMonth)
//               ->whereYear('created_at', $previousYear);
//     }])->get();

//     // Totals for overall expenses for the previous month
//     $totalMealExpense = DB::table('expenses')
//         ->where('is_deleted', 0)
//         ->whereMonth('created_at', $previousMonth)
//         ->whereYear('created_at', $previousYear)
//         ->sum('meal_expense_rupees');

//     $totalMeals = DB::table('expenses')
//         ->where('is_deleted', 0)
//         ->whereMonth('created_at', $previousMonth)
//         ->whereYear('created_at', $previousYear)
//         ->sum('list_of_meal');

//     $totalWater = DB::table('expenses')
//         ->where('is_deleted', 0)
//         ->whereMonth('created_at', $previousMonth)
//         ->whereYear('created_at', $previousYear)
//         ->sum('water_expense');

//     $totalExtra = DB::table('expenses')
//         ->where('is_deleted', 0)
//         ->whereMonth('created_at', $previousMonth)
//         ->whereYear('created_at', $previousYear)
//         ->sum('extra_expense_rupees');

//     $totalUsers = $users->count();
//     $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
//     $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;

//     // User-wise summary, calculating individual user expenses and their grand total
//     $userSummaries = $users->map(function ($user) use ($perMeal, $netAndOthers) {
//         $mealExpense = $user->expenses->sum('meal_expense_rupees');
//         $waterExpense = $user->expenses->sum('water_expense');
//         $extraExpense = $user->expenses->sum('extra_expense_rupees');
//         $totalMeal = $user->expenses->sum('list_of_meal');
//         $grandTotal = $mealExpense + $waterExpense + $extraExpense;

//         return [
//             'name' => $user->name,
//             'meal_expense' => $mealExpense,
//             'water_expense' => $waterExpense,
//             'extra_expense' => $extraExpense,
//             'total_meal' => $totalMeal,
//             'grand_total' => $grandTotal,
//         ];
//     });

//     // Calculate give and receive data
//     $giveMoneyData = [];
//     $receivedMoneyData = [];
//     foreach ($userSummaries as $summary) {
//         $difference = $summary['grand_total'] - (($summary['total_meal'] * $perMeal) + $netAndOthers);
//         $give = $difference < 0 ? abs($difference) : 0;
//         $receive = $difference > 0 ? $difference : 0;

//         $giveMoneyData[$summary['name']] = $give;
//         $receivedMoneyData[$summary['name']] = $receive;
//     }

//     // Fetch Room & Masi data for the previous month
//     $roomMasiData = DB::table('rent')
//         ->whereMonth('created_at', $previousMonth)
//         ->whereYear('created_at', $previousYear)
//         ->get();

//     // Calculate total bill for the previous month
//     $totalRent = $roomMasiData->sum('r_rent');
//     $totalMasi = $roomMasiData->sum('masi_rent');
//     $totalElectric = $roomMasiData->sum('e_bill');
//     $totalBill = $totalUsers > 0 ? ($totalRent + $totalMasi + ($totalElectric * 10)) / $totalUsers : 0;

//     // Pass the data to the PDF view
//     $pdf = PDF::loadView('expenses.export-pdf', compact('userSummaries', 'totalMealExpense', 'totalMeals', 'perMeal', 'netAndOthers', 'giveMoneyData', 'receivedMoneyData', 'roomMasiData', 'totalBill', 'previousMonthName'));

//     // Download the PDF
//     return $pdf->download("expense_report_${previousMonthName}_${previousYear}.pdf");
// }



// public function exportExcel()
// {
//     // Fetch users with their expenses
//     $users = User::where('is_deleted', 0)->with(['expenses' => function ($query) {
//         $query->where('is_deleted', 0);
//     }])->get();

//     // Totals for overall expenses
//     $totalMealExpense = DB::table('expenses')->where('is_deleted', 0)->sum('meal_expense_rupees');
//     $totalMeals = DB::table('expenses')->where('is_deleted', 0)->sum('list_of_meal');
//     $totalWater = DB::table('expenses')->where('is_deleted', 0)->sum('water_expense');
//     $totalExtra = DB::table('expenses')->where('is_deleted', 0)->sum('extra_expense_rupees');

//     $totalUsers = $users->count();
//     $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
//     $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;

//     // User-wise summary, calculating individual user expenses and their grand total
//     $userSummaries = $users->map(function ($user) use ($perMeal, $netAndOthers) {
//         $mealExpense = $user->expenses->sum('meal_expense_rupees');
//         $waterExpense = $user->expenses->sum('water_expense');
//         $extraExpense = $user->expenses->sum('extra_expense_rupees');
//         $totalMeal = $user->expenses->sum('list_of_meal');
//         $grandTotal = $mealExpense + $waterExpense + $extraExpense;

//         return [
//             'name' => $user->name,
//             'meal_expense' => $mealExpense,
//             'water_expense' => $waterExpense,
//             'extra_expense' => $extraExpense,
//             'total_meal' => $totalMeal,
//             'grand_total' => $grandTotal,
//         ];
//     });

//     // Calculate give and receive data
//     $giveMoneyData = [];
//     $receivedMoneyData = [];
//     foreach ($userSummaries as $summary) {
//         $difference = $summary['grand_total'] - (($summary['total_meal'] * $perMeal) + $netAndOthers);
//         $give = $difference < 0 ? abs($difference) : 0;
//         $receive = $difference > 0 ? $difference : 0;

//         $giveMoneyData[$summary['name']] = $give;
//         $receivedMoneyData[$summary['name']] = $receive;
//     }

//     // Fetch Room & Masi data
//     $roomMasiData = RoomMasiRent::all();

//     // Calculate total bill
//     $totalRent = DB::table('rent')->sum('r_rent');
//     $totalMasi = DB::table('rent')->sum('masi_rent');
//     $totalElectric = DB::table('rent')->sum('e_bill');
//     $totalBill = $totalUsers > 0 ? ($totalRent + $totalMasi + $totalElectric) / $totalUsers : 0;

//     // Prepare the data for Excel
//     $data = [
//         ['AMOUNT', '', '', '', 'MEAL', '', '', '', '', 'Water', '', '', '', 'Net', 'Water', 'Gas', 'Others', 'Total'],
//         ['Date', 'Suman', 'Milon', 'Kutu', 'Ashish', 'Suman', 'Milon', 'Kutu', 'Ashish', 'Suman', 'Milon', 'Kutu', 'Ashish', 'Suman', '570', '45', '25', '615'],
//         ['', 'Milon', '', '', '', '570', '45', '25', '25', '104', '1150', '130', '1394', '2024'],
//         ['', 'Kutu', '', '', '', '570', '45', '25', '25', '104', '1150', '130', '1394', '2024'],
//         ['', 'Ashish', '', '', '', '570', '45', '25', '25', '104', '1150', '130', '1394', '2024'],
//         ['', 'TOTAL', '', '', '', '2024', '', '', '', '', '', '', '', ''],
//         ['', 'Net & Others Total Amount', '', '', '', '', '', '', '', '', '', '', '', '2024'],
//         ['', 'Net & Others Per Head', '', '', '', '', '', '', '', '', '', '', '', '506'],
//         ['', 'TOTAL AMOUNT', '', '', '', '', '', '', '', '', '', '', '', '4106'],
//         ['', 'TOTAL MEAL', '', '', '', '', '', '', '', '', '', '', '', '119'],
//         ['', 'PER MEAL', '', '', '', '', '', '', '', '', '', '', '', '34.5042'],
//         ['', '', '', '', '', 'DEOA AGE', '', '', '', 'DITE HABE', '', '', '', 'For Meal', 'For N&O', 'Total'],
//         ['', '', '', '', '', 'For Meal', '', '', '', 'For Meal', '', '', '', 'For N&O', 'Total'],
//         ['', 'Suman', '1870', '615', '2485', '1276.66', '506', '1782.66', '702'],
//         ['', 'Milon', '0', '0', '0', '1164.17', '506', '1670.17', '-545.17'],
//         ['', 'Kutu', '0', '0', '0', '1164.17', '506', '1670.17', '-506'],
//         ['', 'Ashish', '1197', '1384', '2581', '1725.21', '506', '2231.21', '349.79'],
//         ['', '', '', '', '', '', '', '', '', '', '', '', '', ''],
//         ['', 'TOTAL', '1870', '1039', '0', '1197', '37', '32', '0', '50', ''],
//     ];

//     // Create a new instance of the export class
//     $export = new ExpenseExport($data);

//     // Download the Excel file
//     return Excel::download($export, 'expense_report.xlsx');
// }








/////////////                   working fine

// public function afterAlt()
// {
//     // Only non-deleted users
//     $users = User::where('is_deleted', 0)->with('expenses')->get();

//     // Totals
//     $totalMealExpense = DB::table('expenses')->where('is_deleted', 0)->sum('meal_expense_rupees');
//     $totalMeals = DB::table('expenses')->where('is_deleted', 0)->sum('list_of_meal');
//     $totalWater = DB::table('expenses')->where('is_deleted', 0)->sum('water_expense');
//     $totalExtra = DB::table('expenses')->where('is_deleted', 0)->sum('extra_expense_rupees');
//     $totalUsers = $users->count();
//     // dd($totalMealExpense);
//     // per meal calculation
//     $perMeal = $totalMeals > 0 ? $totalMealExpense / $totalMeals : 0;
//     // dd($perMeal);

//     // Net & Others
//     $netAndOthers = $totalUsers > 0 ? ($totalWater + $totalExtra) / $totalUsers : 0;
//     // dd($netAndOthers);

//     //
//     $givetack = $totalUsers > 0 ? (($totalMealExpense + $totalExtra ) - (($totalMeals * $perMeal) + $netAndOthers)) : 0;
//     // dd($givetack);

//     return view('expenses.after', compact(
//         'users', 'perMeal', 'netAndOthers', 'totalMealExpense', 'totalMeals', 'givetack'
//     ));
// }














/////////////////////////////20.04.2025///////////////////////

// public function showExpenseSummary()
// {
//     // Get all users with their expenses
//     $users = User::with('expenses')->get();

//     // Get total expense & total meal
//     $totalExpense = 0;
//     $totalMeal = 0;
//     $totalWaterExpense = 0;
//     $totalExtraExpense = 0;

//     foreach ($users as $user) {
//         $expense = $user->expenses->first();
//         if ($expense) {
//             $totalExpense += $expense->total_meal_expense ?? 0;
//             $totalMeal += $expense->total_meal ?? 0;
//             $totalWaterExpense += $expense->total_water_expense ?? 0;
//             $totalExtraExpense += $expense->total_extra_expense ?? 0;
//         }
//     }

//     // Prevent division by zero
//     $perMeal = $totalMeal > 0 ? $totalExpense / $totalMeal : 0;

//     // Calculate net & others total amount
//     $userCount = $users->count() > 0 ? $users->count() : 1;
//     $netAndOthers = ($totalWaterExpense + $totalExtraExpense) / $userCount;

//     return view('expenses.after', compact(
//         'users',
//         'perMeal',
//         'netAndOthers'
//     ));
// }

// public function afterPage()
// {
//     $users = \App\Models\User::with('expenses')->get();

//     $totalExpense = 0;
//     $totalMeal = 0;
//     $totalWaterExpense = 0;
//     $totalExtraExpense = 0;

//     foreach ($users as $user) {
//         $expense = $user->expenses->first();
//         if ($expense) {
//             $totalExpense += $expense->total_meal_expense ?? 0;
//             $totalMeal += $expense->total_meal ?? 0;
//             $totalWaterExpense += $expense->total_water_expense ?? 0;
//             $totalExtraExpense += $expense->total_extra_expense ?? 0;
//         }
//     }

//     $perMeal = $totalMeal > 0 ? $totalExpense / $totalMeal : 0;
//     $userCount = $users->count() > 0 ? $users->count() : 1;
//     $netAndOthers = ($totalWaterExpense + $totalExtraExpense) / $userCount;

//     return view('expenses.after', compact('users', 'perMeal', 'netAndOthers'));
// }









// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ExpenseController extends Controller
// {
//     //
// }
