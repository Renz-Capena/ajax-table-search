<?php
    require "db.php";

    $q = "SELECT * FROM `person`";

    $list = $con->query("SELECT * FROM `person`");
    $fetch = $list->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- <input id='searchField' type="text" placeholder='Search...'> -->
    <div class='container mt-5'>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="searchField" placeholder="name@example.com">
            <label>Search</label>
        </div>
    
        <div id='tableWrapper'>
            <?php require "atable.php" ?>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $('#searchField').keyup(function(){
                const search = $('#searchField').val();

                $.ajax({
                    method : 'POST',
                    url : "table_search.php",
                    data : {
                        search : search
                    },
                    success(data){
                        $("#tableWrapper").html(data)
                    }
                })
            })

            $("#tableWrapper").on('click','#deleteBtn',function(){
                const id = $(this).val();

                if(confirm(`Are you sure to delete id : ${id}`)){
                    $.ajax({
                        url: "delete.php",
                        method: "post",
                        data:{
                            id : id
                        },
                        success(){
                            $("#tableWrapper").load('atable.php')
                        }
                    })
                }
            })

        })
    </script>
</body>
</html>