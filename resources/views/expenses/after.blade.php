<style>
    body {
        background: linear-gradient(to right,rgb(134, 153, 189),rgb(91, 131, 188));
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 20px;
        color: #333;
        margin: 0;
    }

    #centeredText {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

    h4, h5 {
        font-weight: 600;
        color:rgb(99, 35, 41);
    }

    .table {
        background: rgba(255, 255, 255, 0.75);
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
        border: 1px solidrgb(222, 133, 31);
        background: rgb(244, 8, 8);
        padding: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(255, 0, 0, 0.1);
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
        color:rgb(209, 16, 16);
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
        background: rgb(255, 255, 0);
        border-radius: 15px;
        padding: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .table-card{
        background: rgb(255, 0, 0);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .big-card{
        background: rgb(167, 58, 115);
        border-radius: 15px;
        padding: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .summary-box {
    width: 24%; /* Adjust as needed, e.g., 30%, 400px, etc. */
    margin: 0 auto; /* Centers the box horizontally */
    margin-left: 1px
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

    .summary-card {
    background:rgb(174, 217, 227);
    border-radius: 12px;
    padding: 25px 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin: 20px;
    max-width: 1300px;
    border-left: 6px solid #a73a73;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.section-title {
    margin-top: 20px;
    font-size: 1.2rem;
    font-weight: 600;
    color: #a73a73;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 5px;
}

.summary-line {
    font-size: 1rem;
    color: #333;
    margin: 8px 0;
}

.highlight {
    color: #a73a73;
    font-weight: bold;
}

/* Stylish table */
.styled-table {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    font-size: 0.95rem;
    background: #fff;
}

.styled-table th,
.styled-table td {
    vertical-align: middle;
    text-align: center;
    padding: 12px;
}

.styled-table thead {
    background-color: #a73a73;
    color: white;
    font-weight: 600;
}

/* Modal design */
.modal-styled {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

.modal-styled .modal-header {
    background-color: #a73a73;
    color: white;
    padding: 15px 20px;
}

.modal-styled .modal-body {
    padding: 20px;
    background:rgb(227, 175, 175);
}

.modal-styled .modal-footer {
    background: #f1f1f1;
    padding: 15px;
}

.modal-styled .form-label {
    font-weight: 600;
    color: #444;
}

.modal-styled input.form-control {
    border-radius: 6px;
}

/* Buttons */
.btn-outline-primary {
    border-color: #a73a73;
    color: #a73a73;
}

.btn-outline-primary:hover {
    background-color: #a73a73;
    color: white;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.expense-header {
    text-align: center;
    padding: 30px 10px;
    background: linear-gradient(to right,rgb(132, 74, 104),rgb(211, 109, 148));
    color: white;
    border-radius: 10px;
    margin: 20px auto;
    max-width: 600px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.expense-header h2 {
    font-size: 2rem;
    font-weight: 500;
    margin: 0;
    letter-spacing: 1px;
}

</style>

<div id="centeredText" class="expense-header">
    <h2>{{ date('F') }} Month Expense Report</h2>
</div>





<div class="summary-box">
    <h4 class="mt-5 big-card mb-3">User Expense Summary</h4>
</div>
<div class="glassy-card">
    <table class="table table-bordered table-card">
        <thead class="table-card">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Meal Expense (₹)</th>
                <th>Water Expense (₹)</th>
                <th>Extra Expense (₹)</th>
                <th>Total Meals</th>
                <th>Total Amount (₹)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userSummaries as $index => $summary)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $summary['name'] }}</td>
                    <td>₹{{ number_format($summary['meal_expense'], 2) }}</td>
                    <td>₹{{ number_format($summary['water_expense'], 2) }}</td>
                    <td>₹{{ number_format($summary['extra_expense'], 2) }}</td>
                    <td>{{ $summary['total_meal'] }}</td>
                    <td><strong>₹{{ number_format($summary['grand_total'], 2) }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!--                  21.04.2025                     -->

<div class="summary-card">
    <h5 class="section-title">Per Meal Amount</h5>
    <p class="summary-line">
        Per Meal Amount : ₹{{ number_format($totalMealExpense, 2) }} (Total Meal Amount) / ₹{{ $totalMeals }} (Total Meals) = 
        <strong class="highlight">₹{{ number_format($perMeal, 2) }}</strong>
    </p>

    <h5 class="section-title">Per Head Meal Amount</h5>
    @foreach ($userSummaries as $user)
        <p class="summary-line">
            {{ $user['name'] }}: {{ $user['total_meal'] }} × ₹{{ number_format($perMeal, 2) }} = 
            <strong class="highlight">₹{{ number_format($user['total_meal'] * $perMeal, 2) }}</strong>
        </p>
    @endforeach

    <h5 class="section-title">Per Head Net & Water Amount</h5>
    <p class="summary-line">
        Per Head Net & Water Amount: Total Water Amount:  
        <strong class="highlight">₹{{ number_format($netAndOthers, 2) }}</strong> per head
    </p>
</div>



<div class="summary-box">
    <h4 class="mt-5 big-card mb-3">Individual Meal Expense</h4>
</div>
<div class="glassy-card">
    <table class="table table-bordered table-card">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Give Money (₹)</th>
                <th>Receive Money (₹)</th>
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

{{-- ✅ Grand Total Section --}}
@php
    $totalUsers = count($userSummaries);
    $totalRent = DB::table('rent')->sum('r_rent');
    $totalMasi = DB::table('rent')->sum('masi_rent');
    $totalElectric = DB::table('rent')->sum('e_bill');
    $totalBill = $totalUsers > 0 ? ($totalRent + $totalMasi + ($totalElectric * 10)) / $totalUsers : 0;
@endphp

<!--Room & Masi Modal -->

<div class="mb-3 mt-5">
    <button id="roomMasiButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roomMasiModal">Add Room & Masi</button>
</div>
<!-- Add Room & Masi Modal -->
<!-- Room & Masi Modal -->
<div class="modal fade" id="roomMasiModal" tabindex="-1" aria-labelledby="roomMasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('room.masi.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Room & Masi Rent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Room Rent</label>
                        <input type="number" name="r_rent" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Masi Rent</label>
                        <input type="number" name="masi_rent" class="form-control" required>
                    </div>

                    <label>Electric Bill</label>
                    <div class="row mb-2">
                        <div class="col">
                            <input type="number" step="any" id="electric_units" class="form-control" placeholder="Units" required>
                        </div>
                        <div class="col">
                            <input type="number" step="any" id="electric_rate" class="form-control" placeholder="Rate per Unit" required>
                        </div>
                        <div class="col">
                            <input type="number" step="any" id="total_electric_bill_calculated" class="form-control" placeholder="Total" readonly>
                        </div>
                    </div>

                    <input type="hidden" name="e_bill" id="e_bill">
                    <div class="mb-2">
                        <label>Total Electric Bill</label>
                        <input type="number" name="total_e_bill" id="total_e_bill" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Edit Room & Masi Modal -->
<div class="summary-box">
    <h4 class="mt-5 big-card mb-3">Room & Masi Summary</h4>
</div>
<div class="lassy-card">
    <table class="table table-bordered mt-3 table-card styled-table">
        <thead class="table-header">
            <tr>
                <th>ID</th>
                <th>Room Rent</th>
                <th>Masi Rent</th>
                <th>Electric Bill</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php
            $currentMonth = now()->format('Y-m');
            $records = App\Models\RoomMasiRent::whereRaw("TO_CHAR(created_at, 'YYYY-MM') = ?", [$currentMonth])->get();
        @endphp
        @foreach($records as $index => $record)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>₹{{ $record->r_rent }}</td>
        <td>₹{{ $record->masi_rent }}</td>
        <td>₹{{ $record->e_bill }} <small class="text-muted">({{ $record->total_e_bill }})</small></td>
        <td>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $record->id }}">
                ✏️ Edit
            </button>
        </td>
    </tr>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $record->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('roommasi.update', $record->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Room & Masi Rent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Room Rent</label>
                            <input type="number" name="r_rent" class="form-control" value="{{ $record->r_rent }}" required>
                        </div>

                        <div class="mb-2">
                            <label>Masi Rent</label>
                            <input type="number" name="masi_rent" class="form-control" value="{{ $record->masi_rent }}" required>
                        </div>

                        <label>Electric Bill</label>
                        <div class="row mb-2">
                            <div class="col">
                                <input type="number" step="any" id="edit_units_{{ $record->id }}" class="form-control" placeholder="Units"
                                       value="{{ old('electric_units', $record->e_bill / $record->total_e_bill) }}" required>
                            </div>
                            <div class="col">
                                <input type="number" step="any" id="edit_rate_{{ $record->id }}" class="form-control" placeholder="Rate/Unit"
                                       value="{{ old('electric_rate', $record->total_e_bill) }}" required>
                            </div>
                            <div class="col">
                                <input type="number" step="any" id="edit_total_{{ $record->id }}" name="e_bill" class="form-control" placeholder="Total"
                                       value="{{ number_format($record->e_bill, 2) }}" readonly>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label>Total Electric Bill</label>
                            <input type="number" name="total_e_bill" class="form-control" value="{{ $record->total_e_bill }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">✅ Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach

        </tbody>
    </table>
</div>




<div class="summary-box">
    <h4 class="mt-5 big-card mb-3">Final Calculation</h4>
</div>
<div class="glassy-card">
    <table class="table table-bordered table-card">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Per Head Room & Masi</th>
                <th>Final Amount (₹)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userSummaries as $index => $summary)
                @php
                    $give = $giveMoneyData[$summary['name']];
                    $receive = $receivedMoneyData[$summary['name']];
                    
                    $roomMasiTotal = 0;
                    if ($give > 0) {
                        $roomMasiTotal = $perHeadRoomRent + $give;
                    } elseif ($receive > 0) {
                        $roomMasiTotal = $perHeadRoomRent - $receive;
                    } else {
                        $roomMasiTotal = $perHeadRoomRent;
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
    <button class="btn btn-primary" onclick="toggleDownloadOptions()">Print the total bill?</button>
    
    <div id="downloadOptions" class="mt-3 d-none">
    <!-- <a href="{{ route('export.excel') }}" class="btn btn-success">Excel Download</a> -->
    <a href="{{ route('export.pdf') }}" class="btn btn-warning">
    PDF Download
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


<!-- Bootstrap CSS (in <head>) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (before closing </body>) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- For Excel Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

<!-- For PDF Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
    function toggleDownloadOptions() {
        const options = document.getElementById('downloadOptions');
        options.classList.toggle('d-none');
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.addEventListener('shown.bs.modal', function (event) {
                let input = modal.querySelector('input');
                if (input) input.focus();
            });
        });
    });

    function toggleDownloadOptions() {
        const options = document.getElementById('downloadOptions');
        options.classList.toggle('d-none');
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($records as $record)
            const unitsInput{{ $record->id }} = document.getElementById('edit_units_{{ $record->id }}');
            const rateInput{{ $record->id }} = document.getElementById('edit_rate_{{ $record->id }}');
            const totalField{{ $record->id }} = document.getElementById('edit_total_{{ $record->id }}');

            function updateEditBill{{ $record->id }}() {
                const units = parseFloat(unitsInput{{ $record->id }}.value) || 0;
                const rate = parseFloat(rateInput{{ $record->id }}.value) || 0;
                const total = (units * rate).toFixed(2);
                totalField{{ $record->id }}.value = total;
            }

            unitsInput{{ $record->id }}.addEventListener('input', updateEditBill{{ $record->id }});
            rateInput{{ $record->id }}.addEventListener('input', updateEditBill{{ $record->id }});
        @endforeach
    });
</script>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roomMasiButton = document.getElementById('roomMasiButton');

        // Fetch the submission status from the server
        fetch('{{ route('check.submission') }}')
            .then(response => response.json())
            .then(data => {
                if (!data.canSubmit) {
                    roomMasiButton.disabled = true;
                    roomMasiButton.textContent = 'Room & Masi (Disabled for this month)';
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<div class="col-lg-12 text-end mb-3">
        <button type="button" class="btn btn-info" onclick="window.history.back()">
            <i class="fa fa-arrow-circle-left" style="font-size:20px; padding-right: 8px;"></i> Back
        </button>
</div>