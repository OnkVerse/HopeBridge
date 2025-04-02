<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charity Login</title>
    <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "charity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, name, password FROM admin WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $admin_name, $db_password);
        $stmt->fetch();

        if ($password == $db_password) {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            header("Location: view.php");
            exit();
        } else {
            echo "<script>alert('Invalid email or password!');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }

    $stmt->close();
}
$conn->close();
?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg,rgb(255, 153, 44) 0%, #dcfce7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .background-image {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }

        .background-image img {
            position: absolute;
            top: 0;
            right: -2.5rem;
            width: 66.666667%;
            height: 100%;
            object-fit: cover;
            opacity: 0.1;
        }

        .container {
            position: relative;
            background-color: rgba(223, 255, 225, 0.95);
            backdrop-filter: blur(8px);
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 28rem;
            padding: 2rem;
            z-index: 1;
        }

        .logo {
            width: 4rem;
            height: 4rem;
            background-color: #dcfce7;
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo svg {
            width: 2rem;
            height: 2rem;
            color: #16a34a;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #4b5563;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .input-group {
            position: relative;
        }

        .input-group svg {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1.25rem;
            height: 1.25rem;
            color: #9ca3af;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            outline: none;
            transition: all 0.2s;
        }

        .input-group input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }

        .remember-forgot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .remember input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            accent-color: #16a34a;
        }

        .remember span {
            font-size: 0.875rem;
            color: #4b5563;
        }

        .forgot-link {
            font-size: 0.875rem;
            color: #16a34a;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #15803d;
        }

        .submit-btn {
            width: 100%;
            padding: 0.75rem;
            background-color:rgb(41, 129, 0);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background-color:rgb(46, 46, 46);
        }

        .signup {
            margin-top: 1.5rem;
            text-align: center;
            color: #4b5563;
        }

        .signup a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .signup a:hover {
            color: #15803d;
        }

        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background-color: #dcfce7;
            opacity: 0.5;
            z-index: 0;
        }

        .circle-1 {
            width: 6rem;
            height: 6rem;
            bottom: -1.5rem;
            right: -1.5rem;
        }

        .circle-2 {
            width: 4rem;
            height: 4rem;
            top: -1.5rem;
            left: -1.5rem;
        }

        @media (max-width: 640px) {
            .container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="background-image">
        <img src="https://images.unsplash.com/photo-1470058869958-2a77ade41c02?auto=format&fit=crop&w=2000" alt="">
    </div>

    <div class="container">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2 22c1.25-.987 2.27-1.975 3.5-2.962 1.89-1.436 2.31-3.038 2.5-5.538.46-5.64-4.38-11.75-3-13C8.57 2.008 18.56 5.575 19 15.5c.12 3.907-.162 6.27-3 8.5 1.684-1.32 2.548-2.096 3-3C21.39 17.5 21.7 7.498 15 5c-2.143-.797-6.887 1.85-5.5 10.5.413 2.562.723 4.106 0 6.5-1.092.896-1.955 1.792-3 3l-2-2h-2.5z"/>
            </svg>
        </div>
        
        <div class="header">
            <h1>Welcome Admin !</h1>
            <p>Login to your premium admin account</p>
        </div>

        <form method="POST" action="adminlogin.php">
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2"/>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                    </svg>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input type="password" id="password" placeholder="Enter your password" name="password" required>
                </div>
            </div>

            <div class="remember-forgot">
                <label class="remember">
                    <input type="checkbox">
                    <span>Remember me</span>
                </label>
                <a href="#" class="forgot-link">Forgot password?</a>
            </div>

            <button type="submit" class="submit-btn">Sign In</button>
        </form>

        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>
    </div>
</body>
</html>