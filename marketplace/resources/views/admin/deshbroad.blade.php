<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f7fc;
}

.container {
    display: flex;
}

.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    height: 100vh;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar ul {
    list-style: none;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    text-decoration: none;
    color: white;
    font-size: 16px;
    display: block;
    padding: 8px 15px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

.main-content {
    flex-grow: 1;
    padding: 30px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

header h1 {
    font-size: 24px;
    color: #2c3e50;
}

.user-info {
    font-size: 14px;
}

.user-info span {
    margin-left: 15px;
}

.logout {
    color: #e74c3c;
    cursor: pointer;
}

.content {
    display: grid;
   
}
        </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="{{url("/market")}}">Market</a></li>
                <li><a href="{{url("/shop")}}">Shop</a></li>
                <li><a href="{{url("/logout")}}">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Welcome to Your Dashboard</h1>
                <div class="user-info">
                    <span>Hello, User</span>
                    <span class="logout">Logout</span>
                </div>
            </header>

            <div class="content">
                <div class="widget">
                    <h3>Recent Activity</h3>
                    <ul>
                        <li>Activity 1</li>
                        <li>Activity 2</li>
                        <li>Activity 3</li>
                    </ul>
                </div>

                
            </div>
        </div>
    </div>
</body>
</html>
