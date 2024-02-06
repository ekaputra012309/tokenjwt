<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add any necessary CSS or JavaScript files -->
</head>

<body>
    <h1>Welcome to the Dashboard</h1>
    <p>This is the dashboard page. You can add your content here.</p>
    <button id="logoutButton">Logout</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#logoutButton').click(function() {
                // Retrieve JWT token from localStorage
                var jwtToken = localStorage.getItem('jwtToken');

                // Check if JWT token exists
                if (jwtToken) {
                    $.ajax({
                        url: "{{ url('/api/logout') }}", // Assuming your logout endpoint is at /api/logout
                        type: "POST", // Logout typically involves sending a POST request
                        headers: {
                            // Include authorization header with JWT token
                            'Authorization': 'Bearer ' + jwtToken
                        },
                        success: function(response) {
                            // Handle successful logout
                            window.location.href = "/"; // Redirect to login page
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(error);
                        }
                    });
                } else {
                    // Handle case where JWT token is not found in localStorage
                    console.error('JWT token not found in localStorage.');
                }
            });
        });
    </script>
</body>

</html>
