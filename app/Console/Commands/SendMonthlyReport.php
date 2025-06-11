<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MonthlyReportMail;
use PDF;
use Carbon\Carbon;

class SendMonthlyReport extends Command
{
    protected $signature = 'email:sendMonthlyReport';
    protected $description = 'Send monthly report to users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('is_delete', 0)->get();
        $previousMonth = Carbon::now()->subMonth()->format('F');
        $currentMonth = Carbon::now()->format('F');
        $pdf = PDF::loadView('reports.monthly', compact('previousMonth'));

        foreach ($users as $user) {
            Mail::to($user->gmail)->send(new MonthlyReportMail($user, $pdf, $currentMonth));
        }

        $this->info('Monthly report emails have been sent successfully.');
    }
}







// namespace App\Console\Commands;

// use Illuminate\Console\Command;

// class SendMonthlyReport extends Command
// {
//     /**
//      * The name and signature of the console command.
//      *
//      * @var string
//      */
//     protected $signature = 'app:send-monthly-report';

//     /**
//      * The console command description.
//      *
//      * @var string
//      */
//     protected $description = 'Command description';

//     /**
//      * Execute the console command.
//      */
//     public function handle()
//     {
//         //
//     }
// }
