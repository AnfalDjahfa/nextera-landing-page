<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    if (!empty($fullname) && !empty($message)) {
        $data = "..New message..\n";
        $data .= "Name" . $fullname . "\n";
        $data .= "The message" . $message . "\n";
        $data .= "The date" . date("Y-m-d H:i:s") . "\n\n";

        
        if (file_put_contents('messages.txt', $data, FILE_APPEND)) {
            echo "Message sent!";
        } else {
            echo "error!";
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>