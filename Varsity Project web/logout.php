<script>
    localStorage.removeItem('user');
</script>
<?php
session_start();
session_destroy();
header('location: http://127.0.0.1:8000/index.php?msg=logout')
?>