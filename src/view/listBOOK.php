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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=view-student">List Student</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=view-book">List Book</a>
            </li>
        </ul>
        <form action="index.php?page=search" method="post" class="form-inline my-2 my-lg-0">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<table class="table" >
    <a class="btn btn-success" href="index.php?page=addBook">ADD</a>
    <tr style="background: #1c7430">
        <th style="color: #dbe4e8">STT</th>
        <th style="color: #dbe4e8">CATEGORY</th>
        <th style="color: #dbe4e8">BOOK NAME</th>
        <th style="color: #dbe4e8">AUTHOR</th>
        <th style="color: #dbe4e8">COMMENT</th>
        <th style="color: #dbe4e8">AMOUNT</th>
        <th style="color: #dbe4e8">ACTION</th>

    </tr>
    <?php foreach ($books as $key=>$book):?>
    <tr>
        <td><?php echo ++$key?></td>
        <td><?php echo $book->getCategoryId()?></td>
        <td><?php echo $book->getBookName()?></td>
        <td><?php echo $book->getAuthor()?></td>
        <td><?php echo $book->getComment()?></td>
        <td><?php echo $book->getDescribe()?></td>
        <td>
            <a class="btn btn-success" href="index.php?page=editBook&id=<?php echo $book->getId()?>">Edit</a>
            <a class="btn btn-danger" href="index.php?page=deleteBook&id=<?php echo $book->getId()?>">Delete</a>
        </td>
    </tr>
    <?php endforeach;?>

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