<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Retention Schedule</title>
    <link rel="stylesheet" href="styles.css">
    <script src="search.js" defer></script> <!-- JavaScript for live search -->
</head>
<body>

    <!-- Top Blue Bar -->
    <header class="top-bar">
        <div class="logo">
            <img src="amtrak-logo.png" alt="Amtrak Logo">
            <span>All Aboard</span>
        </div>

        <nav class="top-nav">
            <a href="#">ALERTS & NOTIFICATIONS</a>
            <div class="profile">
                <img src="user-icon.png" alt="User Icon">
                <span class='name'>TESTUSER <span class="thin-dropdown"></span></span>
            </div>
            <a href="#" class="applications">
                <img src="apps-icon.png" alt="Apps Icon" class="apps-icon"> APPLICATIONS
            </a>
        </nav>
    </header>

    <!-- Dark Blue Navigation -->
    <nav class="main-nav">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">STAYING SAFE <span class="thin-dropdown"></span></a></li>
            <li><a href="#">CAREER & BENEFITS <span class="thin-dropdown"></span></a></li>
            <li><a href="#">RESOURCES <span class="thin-dropdown"></span></a></li>
            <li><a href="#">ABOUT AMTRAK <span class="thin-dropdown"></span></a></li>
            <li><a href="#">HELP <span class="thin-dropdown"></span></a></li>
        </ul>
    </nav>

    <!-- Records Retention Schedule Section -->
    <div class="container">
        <h1>RECORDS RETENTION SCHEDULE</h1>

        <section class="departments">
            <div class="department-header">
                <div class="department-text">
                    <h2>Departments</h2>
                    <p>View Records By Department</p>
                </div>

                <!-- Search Bar 2 with Dropdown -->
                <div class="search-bar2-container">
                    <div class="search-bar2">
                        <input type="text" id="search-bar" placeholder="Enter search (min. 3 chars.)" onkeyup="fetchSearchResults()">
                        <button>🔍</button>
                    </div>
                    <div id="search-results" class="dropdown"></div> <!-- Dropdown results -->
                </div>
            </div>

            <div class="department-grid">
                <a href="accounting.php" class="department-card">ACCOUNTING/<br>FINANCE</a>
                <a href="audit.php" class="department-card">AUDIT</a>
                <a href="compliance.php" class="department-card">COMPLIANCE</a>
                <a href="corporate.php" class="department-card">CORPORATE AND GENERAL</a>
                <a href="customerservice.php" class="department-card">CUSTOMER SERVICE</a>
                <a href="healthsafety.php" class="department-card">HEALTH AND SAFETY</a>
                <a href="hr.php" class="department-card">HUMAN RESOURCES</a>
                <a href="is.php" class="department-card">INFORMATION SYSTEMS</a>
                <a href="law.php" class="department-card">LAW</a>
                <a href="marketing.php" class="department-card">MARKETING</a>
                <a href="ops.php" class="department-card">OPERATIONS</a>
                <a href="purchases.php" class="department-card">PURCHASES AND MATERIALS</a>
                <a href="risk.php" class="department-card">RISK MANAGEMENT/<br>SECURITY</a>
            </div>
        </section>

        <section class="more">
            <h2>More</h2>
            <a href="submitrequest.html"><button class="more-button">Submit Request</button></a>
            <button class="more-button">Record Portal</button> 
            <!-- Record Portal button to be implemented on back-end -->
            <a href="guidelines.html"><button class="more-button">Guidelines</button></a>
        </section>
    </div>

</body>
</html>
