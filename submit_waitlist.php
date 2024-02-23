<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the submitted wallet address
    $walletAddress = filter_input(INPUT_POST, 'walletAddress', FILTER_SANITIZE_STRING);

    // Validate the wallet address format (customize this based on your needs)
    if (preg_match("/^[a-zA-Z0-9]{40}$/", $walletAddress)) {
        // Save the wallet address to a file or database (replace 'waitlist.txt' with your preferred storage method)
        file_put_contents('waitlist.txt', $walletAddress . PHP_EOL, FILE_APPEND);

        echo "You've successfully joined the waitlist! Thank you.";
    } else {
        echo "Invalid wallet address. Please check and try again.";
    }
} else {
    // Redirect to the waitlist page if accessed directly
    header("Location: waitlist.html");
    exit();
}
?>
