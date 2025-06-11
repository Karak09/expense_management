<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
            background: linear-gradient(to right,rgb(154, 168, 194),rgb(104, 148, 210));
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            color: #333;
            margin: 0;
        }

        #centeredText {
            text-align: center;
        }

        h4, h5 {
            font-weight: 600;
            color: #2c3e50;
        }

        .table {
            background: rgba(225, 52, 13, 0.75);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 12px;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 10px;
        }

        .table-bordered {
            border: none;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .btn-primary, .btn-success, .btn-danger, .btn-secondary {
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(8px);
        }

        label {
            font-weight: 500;
            color: #34495e;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            border-radius: 15px;
            padding: 15px;
            background: linear-gradient(135deg, #a8e063 0%, #56ab2f 100%);
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
            transition: background-color 0.3s ease;
        }

        .mt-5, .mt-4 {
            margin-top: 2.5rem !important;
        }

        .glassy-card {
            background: rgba(213, 45, 45, 0.77);
            border-radius: 15px;
            padding: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .download-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .download-buttons a {
            text-decoration: none;
            color: white;
        }

        .big-card{
            background: rgb(239, 225, 29);
            border-radius: 15px;
            padding: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .summary-box {
            width: 24%; /* Adjust as needed, e.g., 30%, 400px, etc. */
            margin: 0 auto; /* Centers the box horizontally */
            margin-left: 500px
        }

        .meal-summary-box {
            background: #f9f1f5;
            border-left: 6px solid #a73a73;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            max-width: 1400px;
            color: #333;
        }

        .meal-summary-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #a73a73;
            margin-bottom: 10px;
        }

        .meal-summary-text {
            font-size: 1rem;
            line-height: 1.5;
        }

        .highlighted-amount {
            color: #a73a73;
            font-weight: bold;
        }

        .month-year-selector {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            margin: 30px auto;
            font-family: 'Segoe UI', sans-serif;
        }

        .selector-title {
            text-align: center;
            color: #a73a73;
            font-weight: 600;
            font-size: 1.8rem;
        }

        .form-row {
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            min-width: 200px;
        }

        .custom-select {
            border-radius: 6px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .custom-select:focus {
            border-color: #a73a73;
            box-shadow: 0 0 0 0.2rem rgba(167, 58, 115, 0.25);
        }

        .submit-btn {
            margin-top: 32px;
            padding: 10px 20px;
            font-weight: 500;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #8a2c61;
            border-color: #8a2c61;
        }

        /* Expense Header Reuse */
        .expense-header {
            text-align: center;
            padding: 25px 15px;
            background: linear-gradient(to right, #a73a73, #d85f8d);
            color: white;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
<div id="centeredText">
    <h2 class="selector-title">📅 Select Month and Year to View Bill</h2>

    <form action="{{ route('expenses.previous') }}" method="POST" class="selector-form mt-4">
        @csrf
        <div class="form-row d-flex justify-content-center align-items-end gap-3 flex-wrap">
            <div class="form-group">
                <label for="month" class="form-label">Select Month</label>
                <select class="form-select custom-select" id="month" name="month" required>
                    <option value="" selected disabled>Choose Month</option>
                    @for ($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}" {{ (request('month') == $m) ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="year" class="form-label">Select Year</label>
                <select class="form-select custom-select" id="year" name="year" required>
                    <option value="" selected disabled>Choose Year</option>
                    @for ($y = date('Y'); $y >= 2000; $y--)
                        <option value="{{ $y }}" {{ (request('year') == $y) ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary submit-btn">🔍 Submit</button>
            </div>
        </div>
    </form>

    @if(isset($selectedMonthName))
        <div class="expense-header mt-5">
            <h2>{{ $selectedMonthName }} Month Expense Report</h2>
        </div>


        <!-- <h4 class="mt-5">User Expense Summary</h4> -->
        <div class="summary-box">
            <h4 class="mt-5 big-card mb-3">User Expense Summary</h4>
        </div>
        <div class="glassy-card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Meal Expense (₹)</th>
                        <th>Water Expense (₹)</th>
                        <th>Extra Expense (₹)</th>
                        <th>Total Meals</th>
                        <th>Grand Total Amount (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userSummaries as $index => $summary)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $summary['name'] }}</td>
                            <td>{{ number_format($summary['meal_expense'], 2) }}</td>
                            <td>{{ number_format($summary['water_expense'], 2) }}</td>
                            <td>{{ number_format($summary['extra_expense'], 2) }}</td>
                            <td>{{ $summary['total_meal'] }}</td>
                            <td><strong>₹{{ number_format($summary['grand_total'], 2) }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="meal-summary-box">
            <h5 class="meal-summary-title">Per Meal Amount</h5>
            <p class="meal-summary-text">
                Total Meal Expense: ₹{{ number_format($totalMealExpense, 2) }} / Total Meals: {{ $totalMeals }} =
                <strong class="highlighted-amount">₹{{ number_format($perMeal, 2) }}</strong> per meal
            </p>
        </div>

        <div class="summary-box">
            <h4 class="mt-5 big-card mb-3">Individual Meal Expense</h4>
        </div>
        <div class="glassy-card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Give Money (₹)</th>
                        <th>Received Money (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $giveMoneyData = [];
                        $receivedMoneyData = [];
                    @endphp
                    @foreach($userSummaries as $index => $summary)
                        @php
                            $difference = $summary['grand_total'] - (($summary['total_meal'] * $perMeal) + $netAndOthers);
                            $isEqual = abs($difference) < 0.01;
                            $give = $difference < 0 ? abs($difference) : 0;
                            $receive = $difference > 0 ? $difference : 0;

                            $giveMoneyData[$summary['name']] = $give;
                            $receivedMoneyData[$summary['name']] = $receive;
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $summary['name'] }}</td>
                            <td class="text-danger">{{ $give > 0 ? '₹' . number_format($give, 2) : '-' }}</td>
                            <td class="text-success">{{ $receive > 0 ? '₹' . number_format($receive, 2) : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ✅ Message if no dues --}}
        @if($give == 0 && $receive == 0)
            <div class="alert alert-success mt-3">
                You have no due this month.
            </div>
        @endif

        <div class="summary-box">
            <h4 class="mt-5 big-card mb-3">Room & Masi Summary</h4>
        </div>
        <div class="">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Room Rent</th>
                        <th>Masi Rent</th>
                        <th>Electric Bill</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomMasiRents as $index => $record)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $record->r_rent }}</td>
                            <td>{{ $record->masi_rent }}</td>
                            <td>{{ $record->e_bill }} ({{ $record->total_e_bill }})</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="summary-box">
            <h4 class="mt-5 big-card mb-3">Final Calculation</h4>
        </div>
<div class="glassy-card">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grand Total (₹)</th> {{-- Per head room rent --}}
                <th>Room & Masi total (₹)</th> {{-- Adjusted per user --}}
            </tr>
        </thead>
        <tbody>
            @foreach($userSummaries as $index => $summary)
                @php
                    $give = $giveMoneyData[$summary['name']];
                    $receive = $receivedMoneyData[$summary['name']];
                    $roomMasiTotal = $perHeadRoomRent + $give;

                    if ($receive > 0) {
                        $roomMasiTotal = $perHeadRoomRent - $receive;
                    }
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $summary['name'] }}</td>
                    <td>₹{{ number_format($perHeadRoomRent, 2) }}</td>
                    <td>₹{{ number_format($roomMasiTotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


        <div class="mt-5 text-center">
            <button class="btn btn-primary" onclick="toggleDownloadOptions()">Can you want to print the total bill?</button>

            <div id="downloadOptions" class="mt-3 d-none">
            <a href="{{ route('expenses.download.previous') }}" class="btn btn-warning">
                Download PDF
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-left: 8px;">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M5.25589 16C3.8899 15.0291 3 13.4422 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.0582 20.206 15.4339 19 16.2417M12 21V11M12 21L9 18M12 21L15 18" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </a>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleDownloadOptions() {
            const options = document.getElementById('downloadOptions');
            options.classList.toggle('d-none');
        }
    </script>
</body>
</html>


<div class="col-lg-12 text-end mb-3">
        <button type="button" class="btn btn-info" onclick="window.history.back()">
            <i class="fa fa-arrow-circle-left" style="font-size:20px; padding-right: 8px;"></i> Back
        </button>
</div>