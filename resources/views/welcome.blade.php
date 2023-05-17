<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Online Voting System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-register {
            background-color: #dc3545;
            margin-left: 10px;
        }

        .btn-register:hover {
            background-color: #b30019;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-title">Welcome to the Online Voting System</h2>
            <div>
                <a href="/login" class="btn">Login</a>
                <a href="/registration" class="btn btn-register">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
