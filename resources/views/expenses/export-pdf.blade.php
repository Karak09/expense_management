<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        h1, h4, h5 {
            text-align: center;
        }
        .text-danger {
            color: red;
        }
        .text-success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Expense Report Of {{ date('F') }}</h1>

    <h4>All Users Expense Summary</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Meal Expense</th>
                <th>Water Expense</th>
                <th>Extra Expense</th>
                <th>Total Meals</th>
                <th>Total Amount Given</th>
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
                    <td><strong>{{ number_format($summary['grand_total'], 2) }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Per Head Meal</h5><strong>{{ number_format($perMeal, 2) }}</strong>Rupees Per Meal</p>

    <h4>Rupees Give/Take</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Give Money</th>
                <th>Received Money</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userSummaries as $index => $summary)
                @php
                    $give = $giveMoneyData[$summary['name']];
                    $receive = $receivedMoneyData[$summary['name']];
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $summary['name'] }}</td>
                    <td class="text-danger">{{ $give > 0 ? '' . number_format($give, 2) : '-' }}</td>
                    <td class="text-success">{{ $receive > 0 ? '' . number_format($receive, 2) : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Room & Masi Summary</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Rent</th>
                <th>Masi Rent</th>
                <th>Electric Bill</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roomMasiData as $index => $record)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $record->r_rent }}</td>
                    <td>{{ $record->masi_rent }}</td>
                    <td>{{ $record->e_bill }} ({{ $record->total_e_bill }})</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Final Amount Give/Take</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userSummaries as $index => $summary)
                @php
                    $give = $giveMoneyData[$summary['name']];
                    $receive = $receivedMoneyData[$summary['name']];
                    $grandTotal = $give > 0 ? $give + $totalBill : ($totalBill - $receive);
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $summary['name'] }}</td>
                    <td>{{ number_format($grandTotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
