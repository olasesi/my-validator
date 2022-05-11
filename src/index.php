<?php
include('../Validator/Validator.php');

if(isset($_POST['submit'])){
    $validator = new Validator($_POST);
    $errors = $validator->validateForm();
}
?>

<html>
    <head>
<title>Validator</title>
    </head>
    <body>
<form action="" method="POST">
<label>username</label>
<input type="text" name="username" value="<?php echo (isset($_POST['username']))?htmlspecialchars($_POST['username']):'';?>" >
<?php echo $errors['username'] ?? ''; ?>
<label>Email</label>
<input type="text" name="email" value = "<?php echo (isset($_POST['email']))?htmlspecialchars($_POST['email']):'';?>">
<?php echo $errors['email'] ?? ''; ?>
<button type="submit" name="submit">Submit</button>
</form>
    </body>
</html>