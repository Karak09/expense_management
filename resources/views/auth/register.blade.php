<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(to right,rgb(7, 31, 77), #cfdef3);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
    background: rgba(215, 210, 117, 0.9);
    border-radius: 25px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 600px;
    margin: 20px;
}

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .error-messages {
        background: rgba(255, 0, 0, 0.1);
        border: 1px solid #ff0000;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 20px;
        color: #ff0000;
    }

    .error-messages ul {
        list-style-type: none;
        padding: 0;
    }

    .error-messages ul li {
        margin-bottom: 5px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 500;
        color: #34495e;
    }

    input[type="text"],
    input[type="number"],
    input[type="password"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    input[type="text"],
    input[type="number"],
    input[type="password"],
    input[type="email"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    input:focus {
            border-color: #007bff;
            outline: none;
        }
    .register-heading {
        text-align: center;
        color:rgb(21, 94, 79);
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 25px;
        text-shadow: 1px 1px 2px #ccc;
    }

</style>

</head>
<body>
    <div class="container">
    <h2 class="register-heading">Create Your Account</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Name: <span>*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required><br>

            <label for="address">Address: <span>*</span></label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" required><br>

            <label for="mobile">Mobile No: <span>*</span></label>
            <input type="number" id="mobile" name="mobile" value="{{ old('mobile') }}" required><br>

            <label for="gmail">Gmail Id: <span>*</span></label>
            <input type="email" id="gmail" name="gmail" value="{{ old('gmail') }}" required><br>

            <label for="city">City: <span>*</span></label>
            <input type="text" id="city" name="city" value="{{ old('city') }}" required><br>

            <label for="district">District: <span>*</span></label>
            <input type="text" id="district" name="district" value="{{ old('district') }}" required><br>

            <label for="pin">Pin: <span>*</span></label>
            <input type="number" id="pin" name="pin" value="{{ old('pin') }}" required><br>

            <label for="password">Password: <span>*</span></label>
            <input type="password" id="password" name="password" required><br>

            <label for="password_confirmation">Re-enter Password: <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br>

            <button type="submit">Submit</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const submitButton = form.querySelector('button[type="submit"]');

        submitButton.addEventListener('click', function (event) {
            const requiredFields = form.querySelectorAll('input[required]');
            let allFilled = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    allFilled = false;
                }
            });

            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;

            if (!allFilled) {
                event.preventDefault();
                Swal.fire('Error', 'Please fill in all required fields.', 'error');
                return;
            }

            if (password !== passwordConfirmation) {
                event.preventDefault();
                Swal.fire('Error', 'Passwords do not match.', 'error');
                return;
            }
        });

        @if ($errors->any())
            let errorMessages = `{!! implode('<br>', $errors->all()) !!}`;
            Swal.fire({
                icon: 'error',
                title: 'Somthings Went Wrong !',
                html: errorMessages
            });
        @endif

        @if (session('success'))
            Swal.fire('Success!', '{{ session('success') }}', 'success');
        @endif
    });
</script>



</body>
</html>





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        .register-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        .form-label {
            font-weight: 600;
            margin-top: 10px;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-submit {
            background-color: #6a11cb;
            color: white;
            font-weight: bold;
            margin-top: 20px;
            width: 100%;
            transition: 0.3s;
            border-radius: 8px;
        }
        .btn-submit:hover {
            background-color: #2575fc;
        }
        .error-msg {
            color: red;
            background: #ffe5e5;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="register-form">
    <h2>Register</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="error-msg">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile No:</label>
            <input type="number" id="mobile" name="mobile" value="{{ old('mobile') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City:</label>
            <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="district" class="form-label">District:</label>
            <input type="text" id="district" name="district" value="{{ old('district') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pin" class="form-label">Pin:</label>
            <input type="number" id="pin" name="pin" value="{{ old('pin') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Re-enter Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-submit">Submit</button>
    </form>
</div>

<script>
    // Example small effect: Focus input background change
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.style.backgroundColor = '#f0f8ff';
        });
        input.addEventListener('blur', () => {
            input.style.backgroundColor = 'white';
        });
    });
</script>

</body>
</html> -->
