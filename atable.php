<?php
    require "db.php";

    $q = "SELECT * FROM `person`";
    // $q = "SELECT * FROM person WHERE name LIKE '%renz%' OR name LIKE '%king%'";

    // $search = 'k';
    // $q = "SELECT * FROM person WHERE name LIKE '%".$search."%' OR age LIKE '%".$search."%'";

    $list = $con->query($q);
    $fetch = $list->fetch_assoc();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <table class='table text-center'>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($list->num_rows){ ?>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $fetch['id'] ?></td>
                        <td><?php echo $fetch['name'] ?></td>
                        <td><?php echo $fetch['age'] ?></td>
                        <td>
                            <button class='btn btn-primary'>EDIT</button>
                            <button class='btn btn-danger' id='deleteBtn' value='<?php echo $fetch['id'] ?>'>DELETE</button>
                            
                        </td>
                    </tr>
                <?php }while($fetch = $list->fetch_assoc()) ?>
            <?php }else{ ?>
                <tr>
                    <td colspan='4' >No data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
