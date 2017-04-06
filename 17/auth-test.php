<?php
/*if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
  } else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
  }*/

 header("Content-type:application/pdf");

// 文件将被称为 downloaded.pdf
header("Content-Disposition:attachment;filename='downloaded.pdf'");

// PDF 源在 original.pdf 中
readfile("original.pdf");
?>
