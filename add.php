<?php
if(!empty($_POST["add_record"])) {
    require_once("db.php");
    $sql = "INSERT INTO posts ( post_title, description, post_at ) VALUES ( :post_title, :description, :post_at )";
    $pdo_statement = $pdo_conn->prepare( $sql );

    $result = $pdo_statement->execute( array( ':post_title'=>$_POST['post_title'], ':description'=>$_POST['description'], ':post_at'=>$_POST['post_at'] ) );
    if (!empty($result) ){
        header('location:index.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD NEW RECORD</title>

    <!--    Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


</head>
<body>
    <div class="container">
        <div class="pt-4">
            <!--    button home    -->
            <a href="index.php" class="btn btn-danger">BACK TO LIST</a>
        </div>
        <div class="pt-5 d-flex flex-column">
            <!-- title -->
            <h4>ADD NEW RECORD</h4>
            <!-- form add record -->
            <form action="" method="post" class="w-50">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="post_title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label><br>
                    <textarea name="description" id="description" cols="86" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" name="post_at">
                </div>
                <input type="submit" name="add_record" class="btn btn-info" value="ADD">
            </form>
        </div>

    </div>
</body>
</html>
