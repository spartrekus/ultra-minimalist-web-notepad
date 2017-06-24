
<?php
// Disable caching.
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
if (isset($_POST['t'])) {
    // Update file.
    file_put_contents('test.txt', $_POST['t']);
    die();
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'curl') === 0) 
{
    // Output raw file if client is curl.
    print file_get_contents($path);
    die();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="styles.css" rel="stylesheet" />
</head>


<body>
    <div class="container">
     <h2>Minimalist Notepad</h2>
     <a href="test.txt">Visit our the text file</a>
      <textarea id="content"><?php if (file_exists('test.txt')) { print htmlspecialchars(file_get_contents('test.txt'), ENT_QUOTES, 'UTF-8'); } ?></textarea>
    <pre id="printable"></pre>
    </div>
    <script src="script.js"></script>
</body>
</html>




