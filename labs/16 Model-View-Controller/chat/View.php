<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>
<h1>Chat</h1>
<?php
if (empty($this->messages)) {
    echo "There is no messages in chat...";
} else {
    foreach ($this->messages as $message) {
        echo htmlspecialchars($message) . "<br>";
    }
}
?>
<h2>New message</h2>
<form action="?action=send" method="post">
    <input type="text" name="nickname" value="<?php if (array_key_exists('nickname', $_COOKIE)) {echo $_COOKIE['nickname'];} ?>"/>
    <input type="text" name="message" />
    <input type="submit" value="Send" />
</form>
</body>
</html>