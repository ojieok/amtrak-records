<?php
if (isset($_GET['query'])) {
    $query = strtolower(trim($_GET['query'])); // GET and sanitize input
    $csv_files = [
        "accounting.php" => ["file" => "data/accounting.csv", "name" => "Accounting"],
        "audit.php" => ["file" => "data/audit.csv", "name" => "Audit"],
        "compliance.php" => ["file" => "data/compliance.csv", "name" => "Compliance"],
        "corporate.php" => ["file" => "data/corporate.csv", "name" => "Corporate"],
        "customerservice.php" => ["file" => "data/customerservice.csv", "name" => "Customer Service"],
        "healthsafety.php" => ["file" => "data/healthsafety.csv", "name" => "Health & Safety"],
        "hr.php" => ["file" => "data/hr.csv", "name" => "Human Resources"],
        "is.php" => ["file" => "data/is.csv", "name" => "Information Systems"],
        "law.php" => ["file" => "data/law.csv", "name" => "Law"],
        "marketing.php" => ["file" => "data/marketing.csv", "name" => "Marketing"],
        "ops.php" => ["file" => "data/ops.csv", "name" => "Operations"],
        "purchases.php" => ["file" => "data/purchases.csv", "name" => "Purchases & Materials"],
        "risk.php" => ["file" => "data/risk.csv", "name" => "Risk Management/Security"]
    ]; // a lot of linking and condensing

    $results = []; // initialize array
    
    foreach ($csv_files as $php_page => $info) {
        $csv_file = $info["file"];
        $department = $info["name"];
        
        if (($handle = fopen($csv_file, "r")) !== FALSE) {
            $firstRow = true;
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // SKIP FIRST ROW OF EACH CSV HEADER, IMPORTANT!
                if ($firstRow) {
                    $firstRow = false;
                    continue;
                }
                
                if (count($row) > 1) { // ensure row is valid
                    $record_code = strtolower($row[0]);
                    $title = strtolower($row[1]);
                    $description = strtolower($row[2]);

                    // check if query is in EITHER record code, title, or desc
                    if (
                        strpos($record_code, $query) !== false ||
                        strpos($title, $query) !== false ||
                        strpos($description, $query) !== false
                    ) {
                        $results[] = [
                            "title" => strtoupper($department) . " | " . strtoupper($record_code),
                            "page" => $php_page
                        ];
                    }
                }
            }
            fclose($handle);
        }
    }

    // RETURN between 0 and 5 results (pending) as JSON
    header('Content-Type: application/json');
    echo json_encode(array_slice($results, 0, 5));
}