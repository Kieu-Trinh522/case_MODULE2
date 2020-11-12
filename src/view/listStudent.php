<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TRINH HANDSOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=view-student">List Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=view-book">List Book</a>
            </li>
        </ul>

    </div>
</nav>
<a data-toggle="modal" data-target="#exampleModal" class="btn btn-success" href="index.php?page=addStudent">ADD</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php?page=addStudent">
                    <table>
                        <tr>
                            <td>Student Name:</td>
                            <td><input class="form-control" type="text" name="studentName" placeholder="Student Name" required></td>
                        </tr>
                        <tr>
                            <td>Class:</td>
                            <td><input class="form-control" type="text" name="class" placeholder="Class" required></td>
                        </tr>
                        <tr>
                            <td>Mail:</td>
                            <td><input class="form-control" type="text" name="mail" placeholder="Mail" required></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input class="form-control" type="number" name="phone" placeholder="Phone" required></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><input class="form-control" type="text" name="gender" placeholder="Gender" required></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><input class="form-control" type="text" name="address" placeholder="Address" required></td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>

        </div>
    </div>
</div>
<table class="table">

    <tr style="background: #1c7430">
        <th STYLE="color: #dbe4e8">STT</th>
        <th STYLE="color: #dbe4e8">NAME</th>
        <th STYLE="color: #dbe4e8">CLASS</th>
        <th STYLE="color: #dbe4e8">MAIL</th>
        <th STYLE="color: #dbe4e8">PHONE</th>
        <th STYLE="color: #dbe4e8">GENDER</th>
        <th STYLE="color: #dbe4e8">ADDRESS</th>
        <th STYLE="color: #dbe4e8">ACTION</th>
    </tr>
    <?php foreach ($students as $key => $student): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $student->getStudentName() ?></td>
            <td><?php echo $student->getClass() ?></td>
            <td><?php echo $student->getMail() ?></td>
            <td><?php echo $student->getPhone() ?></td>
            <td><?php echo $student->getGender() ?></td>
            <td><?php echo $student->getAddress() ?></td>
            <td>
                <a class="btn btn-success" href="index.php?page=editStudent&id=<?php echo $student->getId() ?>">Edit</a>
                <a class="btn btn-danger"
                   href="index.php?page=deleteStudent&id=<?php echo $student->getId() ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>