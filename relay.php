<?php
// Discord Webhook URL
$webhook_url = "https://discord.com/api/webhooks/1319154562728202240/_AuT2X35Udww7Edrm0OOI6b6hNU6-3uancYL_ncX7Aa3yroDPGEMRVwenfHldv_HlLH4";

// Get the JSON data sent to this script
$data = file_get_contents("php://input");

// Forward the data to Discord
$options = [
    "http" => [
        "header"  => "Content-Type: application/json",
        "method"  => "POST",
        "content" => $data,
    ],
];
$context  = stream_context_create($options);
$response = file_get_contents($webhook_url, false, $context);

// Respond to the client
if ($response === FALSE) {
    http_response_code(500);
    echo "Error forwarding to Discord webhook.";
} else {
    http_response_code(200);
    echo "Data sent to Discord webhook successfully!";
}
?>
