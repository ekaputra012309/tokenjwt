<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Basic styling for demonstration purposes */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        input[type="text"],
        input[type="password"],
        button {
            width: 80%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                var formData = $(this).serialize(); // Serialize form data
                $.ajax({
                    url: "{{ route('login') }}", // Login endpoint
                    type: "POST", // HTTP method
                    data: formData, // Form data
                    dataType: "json", // Expected data type
                    success: function(response) {
                        // If login is successful, redirect or perform any other action
                        localStorage.setItem('jwtToken', response.authorisation.token);
                        window.location.href = "/dashboard"; // Redirect to dashboard page
                    },
                    error: function(xhr, status, error) {
                        // If login fails, display error message
                        alert("Invalid credentials");
                    }
                });
            });
        });
    </script>
</body>

</html>
