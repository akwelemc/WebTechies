<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/role.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Page</title>
</head>
<body>
    <div class="outer">
        <div class="role">
            <h1>Choose your role</h1>
        </div>

        <div class='buttons'>
            <button onclick="redirectToDriverPage()">Driver</button>
            <button onclick="redirectToPassengerPage()">Passenger</button>
        </div>
    </div>

    <script>
        function redirectToDriverPage() {
            window.location.href = "../Login/driver_registration.php";
        }

        function redirectToPassengerPage() {
            window.location.href = "../Login/register.php"; 
        }
    </script>
</body>
</html>
