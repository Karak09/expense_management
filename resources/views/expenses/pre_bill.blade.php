<div class="container mt-5">
    <h2 class="text-center mb-4">Show your previous bill :~</h2>

    <form action="{{ route('expenses.fetchPrebill') }}" method="POST" class="mb-4">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-3">
                <select name="month" class="form-control" required>
                    <option value="">Select Month</option>
                    @foreach(range(1,12) as $m)
                        <option value="{{ $m }}" {{ (old('month') == $m) ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="year" class="form-control" required>
                    <option value="">Select Year</option>
                    @for($y = date('Y'); $y >= 2000; $y--)
                        <option value="{{ $y }}" {{ (old('year') == $y) ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
    </form>

    @if(isset($bills))
        <h4 class="text-center">Bills for {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ $year }}</h4>

        @if(count($bills) > 0)
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

    <h5>Per Head Meal</h5><strong>{{ number_format($perMeal, 2) }}</strong> Rupees Per Meal</p>

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
        @else
            <p class="text-center">No bills found for this month and year.</p>
        @endif
    @endif
</div>
