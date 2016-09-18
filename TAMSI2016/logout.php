<?php
session_start();
echo "<script>alert('Terima Kasih')
location.href='index.php'</script>";
session_destroy();
?>