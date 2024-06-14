<?php
// Define the API endpoint and parameters
$nid = '8695315278';
$dob = '1995-12-01';
$apiUrl = "https://103.191.240.89/~rsbdxyz/unkn/info.php?nid=$nid&dob=$dob";

// Fetch the API response
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Skip SSL verification if needed
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Check if data is fetched successfully
if (!$data) {
    die('Error: Unable to fetch data from API');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Data Display</title>
</head>
<body>
    <h1>API Data Display</h1>

    <?php if ($data): ?>
        <table border="1">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <?php foreach ($data as $key => $value): ?>
                <tr>
                    <td><?php echo htmlspecialchars($key); ?></td>
                    <td><?php echo htmlspecialchars($value); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>
</body>
</html>
