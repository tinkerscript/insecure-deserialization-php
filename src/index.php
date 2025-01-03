<?php
function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}

set_error_handler("exception_error_handler");

class User {
        public $name, $is_admin;
}

class UnsafeClass {
        public $payload;

        public function __wakeup() {
                echo $this->payload;
        }
}

$insecure = null;
$caption = "Result";
$output = "";

if (isset($_POST["data"])) {
        try {
                $insecure = unserialize($_POST["data"]);
                $output = print_r($insecure, true);
        } catch (Exception $e) {
                $caption = "Error";
                $output = $e->getMessage();
        }
}
?>

Example:
<pre>O:4:"User":2:{s:4:"name";s:4:"John";s:8:"is_admin";b:1;}</pre><br/>
<form action="/insec-d.php" method="POST">
        <textarea name="data" rows="10" cols="50"><?php echo $_POST["data"] ?? ""; ?></textarea><br/>
        <button>Submit</button>
</form>
<br/><br/>

<?php echo $caption;  ?>:<br/>
<textarea rows="10" cols="50" readonly><?php echo $output; ?></textarea>
