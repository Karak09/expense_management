<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to right, rgb(201, 154, 26), #cfdef3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background: rgba(45, 177, 82, 0.9);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        h2 {
            color: #ffffff;
            margin-bottom: 25px;
            font-size: 26px;
        }

        label {
            display: block;
            margin: 20px;
            font-weight: 600;
            color: #ffffff;
            text-align: left;
        }

        input[type="number"] {
            width: 60%;
            padding: 16px;
            border: 1px solid #ccc;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: inset 0 2px 4px rgba(190, 46, 46, 0.1);
        }

        .button-container {
            padding: 20px;
            border-radius: 12px;
        }

        button[type="submit"] {
            width: 30%;
            padding: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: red;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Forgot Password</h2>
    <form action="{{ route('forgot-password') }}" method="POST">
        @csrf
        <label for="mobile">Mobile Number:</label>
        <input type="number" id="mobile" name="mobile" required>

        <div class="button-container">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const submitButton = form.querySelector('button[type="submit"]');
        const errorMessage = document.createElement('div');
        errorMessage.className = 'error-message';
        errorMessage.textContent = 'Please enter a valid mobile number.';
        form.appendChild(errorMessage);

        submitButton.addEventListener('click', function (event) {
            const mobile = document.getElementById('mobile').value;
            const mobilePattern = /^[0-9]{10}$/;

            if (!mobilePattern.test(mobile)) {
                event.preventDefault();
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>








<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #74ebd5 0%, #acb6e5 100%);
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.2);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #fff;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 28px;
        }

        label {
            display: block;
            text-align: left;
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.7);
            box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 1);
            box-shadow: 0 0 8px rgba(32, 124, 229, 0.4);
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: #e74c3c;
            font-weight: 600;
            margin-top: 15px;
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Forgot Password</h2>
    <form action="{{ route('forgot-password') }}" method="POST">
        @csrf
        <label for="mobile">Mobile No:</label>
        <input type="text" id="mobile" name="mobile" required>

        <button type="submit">Submit</button>

        <div class="error-message" id="error-message">Please enter a valid mobile number.</div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const submitButton = form.querySelector('button[type="submit"]');
        const errorMessage = document.getElementById('error-message');

        submitButton.addEventListener('click', function (event) {
            const mobile = document.getElementById('mobile').value;
            const mobilePattern = /^[0-9]{10}$/;

            if (!mobilePattern.test(mobile)) {
                event.preventDefault();
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    });
</script>

</body>
</html> -->
