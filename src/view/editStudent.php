<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    Student Name: <input type="text" name="studentName" value="<?php echo $student->getStudentName()?>" >
    Class: <input type="text" name="class" value="<?php echo $student->getClass()?>">
    Mail: <input type="text" name="mail" value="<?php echo $student->getMail()?>" >
    Phone: <input type="number" name="phone" value="<?php echo $student->getPhone()?>" >
    Gender: <input type="text" name="gender" value="<?php echo $student->getGender()?>" >
    Address: <input type="text" name="address" value="<?php echo $student->getAddress()?>" >
    <input type="submit" value="Edit">
</form>
</body>
</html>