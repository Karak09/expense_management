<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Include Font Awesome from a different CDN without integrity attribute -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <style>
        /* html, body {
            margin: 0;
            padding: 0;
        } */

        .heading-bar {
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
            background: linear-gradient(90deg, #7b2ff7, #f107a3);
            color: white;
            padding: 15px 20px;
            font-size: 22px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color:rgb(72, 19, 158); /* A light grey-blue for clean look */
        }
        .month-selection {
            background-color: #6f42c1; /* Bootstrap's purple shade */
            padding: 140px;
            border-radius: 5px;
            color: white;
            margin-bottom: 20px;
        }


        .month-selection form select,
        .month-selection form button {
            margin-right: 0px;
        }

        .month-selection form select {
            background-color: white;
            color: black;
        }

        .heading-bar {
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
            background-color: purple;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(222, 48, 48, 0.1);
        }

        .container {
            text-align: left;
            width: 80%;
            position: relative;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .user-logo {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }
        .user-logo img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .profile-actions {
            display: none;
            flex-direction: column;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            right: 0;
            top: 120px;
        }
        .profile-actions.show {
            display: flex;
        }
        .menu-icon {
            cursor: pointer;
            font-size: 24px;
            margin-left: 10px;
        }
        .dropdown-menu {
            position: absolute;
            top: 40px;
            right: 0;
            display: none;
        }
        .custom-table-container {
    width: 100%;
    max-width: 100%;
    padding: 20px;
    margin: 40px auto;
    overflow-x: auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
}

.custom-table {
    width: 80%;
    min-width: 1200px; /* Makes it large */
    border-collapse: collapse;
    font-size: 1.05rem;
}

.custom-table thead {
    background-color: #a73a73;
    color: white;
    text-align: center;
}

.custom-table th,
.custom-table td {
    padding: 14px;
    border: 1px solid #ddd;
    text-align: center;
}

.custom-table tbody tr:hover {
    background-color: #f9f9f9;
}

.custom-table tfoot {
    background-color: #f3f3f3;
    font-weight: bold;
}
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-add {
            margin-top: 20px;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 35px;
            left: 0;
            background-color: white;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.15);
            padding: 10px;
            z-index: 999;
        }
        .dropdown-menu.show {
            display: block;
        }
        /* Overall modal background */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #fefefe,rgb(94, 163, 243));
            transition: all 0.3s ease;
        }

        /* Modal header */
        .modal-header {
            background: linear-gradient(90deg,rgb(82, 212, 162), #f107a3);
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        /* Modal title */
        .modal-title {
            font-weight: 600;
            font-size: 1.4rem;
        }

        /* Close button styling */
        .btn-close {
            filter: brightness(0) invert(1);
        }

        /* Form inputs */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #ccc;
            transition: 0.3s ease-in-out;
        }

        .form-control:focus, .form-select:focus {
            border-color: #7b2ff7;
            box-shadow: 0 0 0 0.2rem rgba(123, 47, 247, 0.25);
        }

        /* Labels */
        .form-label {
            font-weight: 500;
            color: #444;
        }

        /* Submit button */
        .btn-success {
            background: linear-gradient(90deg, #00c9ff, #92fe9d);
            border: none;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 12px;
            transition: all 0.3s ease;
            color: black;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #7b2ff7, #f107a3);
            color: black;
        }

        .profile-container {
    max-width: 500px;
    margin: 30px auto;
    padding: 5px 30px;
    background-color:rgb(107, 226, 234);
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    text-align: center;
    transition: all 0.3s ease-in-out;
}

.greeting-text {
    font-size: 2rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
}

.section-title {
    font-size: 1.6rem;
    font-weight: bold;
    color: #a73a73;
    border-bottom: 2px solid #a73a73;
    padding-bottom: 10px;
    display: inline-block;
}




    </style>
</head>
<body>

<!-- Heading Bar with Home + Menu Icons on Left -->
<div class="heading-bar d-flex align-items-center" id="centeredText" style="gap: 10px;">
    <!-- Home Icon -->
    <a href="{{ route('expenses.index') }}">
        <svg width="30px" height="30px" id="homeIcon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;">
            <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z" fill="#000000"></path>
        </svg>
    </a>

    <!-- Menu Icon + Dropdown -->
    <div class="position-relative">
        <svg width="30px" height="30px" id="menuIcon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;">
            <path d="M4 6H20M4 12H14M4 18H9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>

        <!-- Dropdown Menu -->
        <div class="dropdown-menu" id="dropdownMenu">
            <button type="button" class="dropdown-item" id="showEventModalBtn">Users</button>
            <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                @csrf
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
        </div>
    </div>

    <!-- Title -->
    <h2 class="mb-0 ms-2">Calculate Expense Of B-15</h2>
</div>

<div class="container profile-container">
    <div class="header">
        <div class="user-logo" id="userLogo">
            <!-- User logo can go here -->
        </div>
    </div>

    <div class="profile-actions" id="profileActions">
        <label for="profilePicture" class="btn btn-primary btn-sm">Upload Profile Picture</label>
        <input type="file" id="profilePicture" style="display:none;">
        <button class="btn btn-danger btn-sm" id="removePicture">Remove Profile Picture</button>
    </div>
    
    @if(Auth::check())
        <h2 class="greeting-text">{{ $greeting }}, {{ Auth::user()->name }}</h2>
    @else
        <script>
            window.location.href = "{{ route('login') }}";
        </script>
    @endif

    <h3 class="section-title">
        List Of Expense <span id="current-month">{{ now()->format('F') }}</span>
    </h3>
</div>

</div>
<div class="month-selection">
    <!-- Centered Title -->
    <form action="{{ route('expenses.index') }}" method="GET" class="d-flex align-items-left gap-2 mb-4">
    <select name="month" class="form-select" required style="width: 150px;">
        <option value="">Select Month</option>
        @foreach ($months as $month)
            <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                {{ $month }}
            </option>
        @endforeach
    </select>

    <select name="year" class="form-select" required style="width: 120px;">
        <option value="">Select Year</option>
        @for ($y = date('Y'); $y >= 2020; $y--)
            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                {{ $y }}
            </option>
        @endfor
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="custom-table-container">
        <table class="table custom-table table-bordered w-100" style="font-size: 1.1rem;">
            <!-- <table id="tabela" class="table table-striped datatable" style="width:100%; border-spacing: 0 20px;"> -->
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Meal Expense</th>
                        <th>Extra Expense</th>
                        <th>Water Expense</th>
                        <th>Meal</th>
                        <th>Created By</th>
                        <th>Action</th>
                        <th>Edited By</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalMealExpense = 0;
                        $totalExtraExpense = 0;
                        $totalWaterExpense = 0;
                        $totalMealCount = 0;
                    @endphp
                    @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->date }}</td>
                        <td>{{ $expense->meal_expense ?: 'N/A' }} ({{ $expense->meal_expense_rupees ?: 'N/A' }})</td>
                        <td>{{ $expense->extra_expense ?: 'N/A' }} ({{ $expense->extra_expense_rupees ?: 'N/A' }})</td>
                        <td>{{ $expense->water_expense ?: 'N/A' }}</td>
                        <td>{{ $expense->list_of_meal ?: 'N/A' }}</td>
                        <td>{{ optional($expense->creator)->name ?? 'N/A' }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editExpenseModal{{ $expense->id }}">Edit</button>
                        </td>
                        <td>{{ optional($expense->editor)->name ?? 'N/A' }}</td>
                    </tr>
                    @php
                        $totalMealExpense += $expense->meal_expense_rupees ?? 0;
                        $totalExtraExpense += $expense->extra_expense_rupees ?? 0;
                        $totalWaterExpense += $expense->water_expense ?? 0;
                        $totalMealCount += $expense->list_of_meal ?? 0;
                    @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td>{{ $totalMealExpense }}</td>
                        <td>{{ $totalExtraExpense }}</td>
                        <td>{{ $totalWaterExpense }}</td>
                        <td>{{ $totalMealCount }}</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </tfoot>
        </table>
    </div>
</div>
<button type="button" class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#addExpenseModal">Add Expense
</button>
</div>

    <!-- Add Expense Modal -->
    <div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExpenseModalLabel">Add Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('expenses.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <select class="form-select" name="date" id="date">
                                <option>{{ date('Y-m-d') }}</option>
                                <option>{{ date('Y-m-d', strtotime('-1 day')) }}</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="meal_expense" class="form-label">Meal Item</label>
                                    <input type="text" class="form-control" name="meal_expense" id="meal_expense" placeholder="Meal Item">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="meal_expense_rupees" class="form-label">Rupees</label>
                                    <input type="number" class="form-control" name="meal_expense_rupees" id="meal_expense_rupees" placeholder="Rupees">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="extra_expense" class="form-label">Extra Item</label>
                                    <input type="text" class="form-control" name="extra_expense" id="extra_expense" placeholder="Extra Item">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="extra_expense_rupees" class="form-label">Rupees</label>
                                    <input type="number" class="form-control" name="extra_expense_rupees" id="extra_expense_rupees" placeholder="Rupees">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="water_expense" class="form-label">Water</label>
                                    <input type="number" class="form-control" name="water_expense" id="water_expense" placeholder="Water">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="list_of_meal" class="form-label">Meal Count</label>
                                    <input type="number" class="form-control" name="list_of_meal" id="list_of_meal" placeholder="Meal Count">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 text-end mt-4">
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Expense Modal -->
    @foreach($expenses as $expense)
    <div class="modal fade" id="editExpenseModal{{ $expense->id }}" tabindex="-1" aria-labelledby="editExpenseModalLabel{{ $expense->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExpenseModalLabel{{ $expense->id }}">Edit Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <select class="form-select" name="date" id="date">
                                <option {{ $expense->date == date('Y-m-d') ? 'selected' : '' }}>{{ date('Y-m-d') }}</option>
                                <option {{ $expense->date == date('Y-m-d', strtotime('-1 day')) ? 'selected' : '' }}>{{ date('Y-m-d', strtotime('-1 day')) }}</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="meal_expense" class="form-label">Meal Item</label>
                                    <input type="text" class="form-control" name="meal_expense" id="meal_expense" value="{{ $expense->meal_expense }}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="meal_expense_rupees" class="form-label">Rupees</label>
                                    <input type="number" class="form-control" name="meal_expense_rupees" id="meal_expense_rupees" value="{{ $expense->meal_expense_rupees }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="extra_expense" class="form-label">Extra Item</label>
                                    <input type="text" class="form-control" name="extra_expense" id="extra_expense" value="{{ $expense->extra_expense }}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="extra_expense_rupees" class="form-label">Rupees</label>
                                    <input type="number" class="form-control" name="extra_expense_rupees" id="extra_expense_rupees" value="{{ $expense->extra_expense_rupees }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="water_expense" class="form-label">Water</label>
                                    <input type="number" class="form-control" name="water_expense" id="water_expense" value="{{ $expense->water_expense }}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="list_of_meal" class="form-label">Meal Count</label>
                                    <input type="number" class="form-control" name="list_of_meal" id="list_of_meal" value="{{ $expense->list_of_meal }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 text-end mt-4">
                            <button type="submit" class="btn btn-success">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Event User Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registered Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Pin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editUserForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="editUserId" name="id">
                        <div class="mb-2">
                            <input type="text" class="form-control" id="editUserName" name="name" placeholder="Name" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" id="editUserMobile" name="mobile" placeholder="Mobile" readonly>
                        </div>

                        <div class="mb-2">
                            <input type="text" class="form-control" id="editUserCity" name="city" placeholder="City">
                        </div>

                        <div class="mb-2">
                            <input type="text" class="form-control" id="editUserDistrict" name="district" placeholder="District">
                        </div>

                        <div class="mb-2">
                            <input type="text" class="form-control" id="editUserPin" name="pin" placeholder="Pin">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- //////////////////////////16.04.2025/////////////////////////////// -->


    <div class="mt-3">
        <a href="{{ route('expenses.previous') }}" class="btn btn-warning">See Previous Months Bill</a>
        <a href="{{ route('expenses.after.alt') }}" class="btn btn-success">Generate Current Months Bill</a>
    </div>
    <br>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const selectedMonth = urlParams.get('month');
            if (selectedMonth) {
                document.getElementById('current-month').textContent = selectedMonth;
            }

            const userLogo = document.getElementById('userLogo');
            const profileActions = document.getElementById('profileActions');
            const profileImage = document.getElementById('profileImage');
            const menuIcon = document.getElementById('menuIcon');
            const dropdownMenu = document.getElementById('dropdownMenu');

            userLogo.addEventListener('click', function () {
                profileActions.classList.toggle('show');
            });

            document.getElementById('removePicture').addEventListener('click', function () {
                // Add logic to remove the profile picture
                profileImage.src = 'https://via.placeholder.com/100';
                profileActions.classList.remove('show');
            });

            document.getElementById('profilePicture').addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        profileImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    profileActions.classList.remove('show');
                }
            });

            menuIcon.addEventListener('click', function () {
                dropdownMenu.classList.toggle('show');
            });

            window.addEventListener('click', function (event) {
                if (!userLogo.contains(event.target) && !profileActions.contains(event.target)) {
                    profileActions.classList.remove('show');
                }
                if (!menuIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });

        //all user show in model
        document.getElementById('showEventModalBtn').addEventListener('click', function () {
            fetch('{{ route("event.users") }}')
                .then(response => response.json())
                .then(users => {
                    let tbody = '';
                    users.forEach((user, index) => {
                    tbody += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${user.name}</td>
                            <td>${user.mobile || ''}</td>
                            <td>${user.city || ''}</td>
                            <td>${user.district || ''}</td>
                            <td>${user.pin || ''}</td>
                            <td>
                                <button class="btn btn-sm btn-info edit-btn"
                                    data-id="${user.id}"
                                    data-name="${user.name}"
                                    data-mobile="${user.mobile || ''}"
                                    data-city="${user.city || ''}"
                                    data-district="${user.district || ''}"
                                    data-pin="${user.pin || ''}">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteUser(${user.id})">Delete</button>
                            </td>
                        </tr>`;
                    });

                    document.getElementById('userTableBody').innerHTML = tbody;

                    // Bind edit button click handlers here, AFTER table is populated
                    document.querySelectorAll('.edit-btn').forEach(button => {
                        button.addEventListener('click', function () {
                            document.getElementById('editUserId').value = this.dataset.id;
                            document.getElementById('editUserName').value = this.dataset.name;
                            document.getElementById('editUserMobile').value = this.dataset.mobile;
                            document.getElementById('editUserCity').value = this.dataset.city;
                            document.getElementById('editUserDistrict').value = this.dataset.district;
                            document.getElementById('editUserPin').value = this.dataset.pin;
                            new bootstrap.Modal(document.getElementById('editUserModal')).show();
                        });
                    });

                    let modal = new bootstrap.Modal(document.getElementById('eventModal'));
                    modal.show();
                });
        });

        document.getElementById('editUserForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('{{ route("event.users.update") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            })
            .then(response => response.json())
            .then(res => {
                if (res.status === 'success') {
                    alert('User updated');
                    location.reload();
                }
            });
        });

        function deleteUser(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                fetch('{{ route("event.users.delete") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(res => {
                    if (res.status === 'deleted') {
                        alert('User deleted');
                        location.reload();
                    }
                });
            }
        }

    </script>
    
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            showConfirmButton: true
        });
    @endif
</script>

</body>
</html>
