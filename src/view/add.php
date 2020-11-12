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
    Student: <select name="studentId" id="">
        <?php foreach ($students as $student):?>
        <option value="<?php echo $student->getId() ?>"><?php echo $student->getStudentName() ?></option>
        <?php endforeach; ?>
    </select>
    Borrow Date: <input type="date" name="borrowDate" placeholder="Borrow Date">
    Return Date: <input type="date" name="returnDate" placeholder="Return Date">
    <input class="btn btn-success" type="submit" value="ADD">
</form>
</body>
</html>