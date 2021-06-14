<?php
require ("db.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP PDO CRUD</title>

    <!--    Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Font Awesome   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php
    $pdo_statement = $pdo_conn->prepare("SELECT * FROM posts ORDER BY id ASC");
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();
?>
    <div class="pt-5 container">
        <div class="div pb-5">
            <a href="add.php" class="btn btn-danger"><i class="fas fa-plus"></i> CREATE</a>
        </div>

        <table class="table  table-bordered">
            <thead class="table-primary" style="text-align: center">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="20%">Title</th>
                    <th scope="col" width="40%">Description</th>
                    <th scope="col" width="8%">Date</th>
                    <th scope="col" width="8%">Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
            <?php
                if(!empty($result)){
                    foreach ($result as $row) {
            ?>
                <tr>
                    <th scope="row" style="text-align: center"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['post_title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['post_at'] ?></td>
                    <td class="d-flex justify-content-around">
                        <a  title="edit" href="edit.php?id=<?php echo $row['id'];?>"><i style="color: deepskyblue;font-size:20px;" class="far fa-edit"></i></a>
                        <a  title="delete" href="delete.php?id=<?php echo $row['id'];?>"><i style="color: crimson;font-size:20px;" class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
