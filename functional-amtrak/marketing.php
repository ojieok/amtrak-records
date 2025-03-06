<?php
session_start(); // Start session for login system

// Check if user is logged in as "testuser"
$is_testuser = isset($_SESSION['username']) && $_SESSION['username'] === "testuser";

// Dynamic department name variable
$department_name = "Marketing";

// CSV file path
$csv_file = 'data/marketing.csv';

// Read CSV file
$records = [];
if (($handle = fopen($csv_file, "r")) !== FALSE) {
    $first_row = true; // First row tracker
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) { // "," is the delimiter
        if ($first_row) {
            $first_row = false; // skip CSV header
            continue;
        }
        $records[] = $row;
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Retention Schedule - <?php echo $department_name; ?></title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function searchRecords() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("table tr");

            rows.forEach((row, index) => {
                if (index === 0) return; // Skip header row
                row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
            });
        }
    </script>
</head>
<body>

    <!-- Top Blue Bar -->
    <header class="top-bar">
        <div class="logo">
            <img src="amtrak-logo.png" alt="Amtrak Logo">
            <span>All Aboard</span>
        </div>
        
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" class="search-bar" placeholder="Search...">
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
            <li><a href="index.php">HOME</a></li>
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
                    <h2><?php echo $department_name; ?></h2>
                    <p>Viewing Records</p>
                </div>
                <div class="search-bar2">
                    <input type="text" id="search" placeholder="Search for a record" onkeyup="searchRecords()">
                    <button>🔍</button>
                </div>
            </div>
        </section>

        <!-- Records Table -->
        <section class="records-table">
            <table border="1">
                <tr>
                    <th>Record Code</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Retention Period</th>
                    <th>Event</th>
                </tr>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <?php foreach ($record as $field): ?>
                            <td><?php echo htmlspecialchars($field); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <!-- More Section -->
        <section class="more">
            <h2>More</h2>
            <button class="more-button">Submit Request</button>
            
            <?php if ($is_testuser): ?>
                <button class="more-button" onclick="document.getElementById('addRecordForm').style.display='block'">Add Record</button>
            <?php endif; ?>

            <button class="more-button">Guidelines</button>
        </section>

        <!-- Add Record Form (Only for testuser) -->
        <?php if ($is_testuser): ?>
        <section id="addRecordForm" style="display:none;">
            <h2>Add New Record</h2>
            <form action="add_record.php" method="post">
                <input type="hidden" name="department" value="accounting">
                <input type="text" name="code" placeholder="Record Code" required>
                <input type="text" name="title" placeholder="Title" required>
                <input type="text" name="description" placeholder="Description" required>
                <input type="text" name="retention" placeholder="Retention Period" required>
                <input type="text" name="event" placeholder="Event" required>
                <button type="submit">Add Record</button>
            </form>
        </section>
        <?php endif; ?>

    </div>

</body>
</html>
