<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hinh thu thanh toan</title>
    <!-- style start -->
    <?php
        include_once __DIR__.'/../layouts/styles.php'
    ?>
    <!-- style end -->
</head>

<body>
    <?php
        include_once __DIR__.'/../dbconnect.php';
    ?>
    <div class="container-fluid">
       <?php 
            include_once __DIR__.'/../layouts/partials/header.php';
       ?>

        <div class="row">
            <div class="col-md-9">
            <!-- start sidebar -->
            <?php 
            include_once __DIR__.'/../layouts/partials/sidebar.php';
       ?>
            <!-- end sidebar -->

            <!-- start content -->
           <form action="" method="post">
           <div class="form-group">
                <label for="nsx_ten">Tên nhà sản xuất</label>
                <input type="text" class="form-control" id="nsx_ten" name="nsx_ten" >
                
            </div>
            <div class="form-group">
                <button name="btnLuu" type="submit" class="btn btn-primary"> Lưu</button>
            </div>
           
           </form>
           </div>
           <?php
                if (isset($_POST['btnLuu'])){
                    $nsx_ten = $_POST['nsx_ten'];
                // 1.tạo kết nối
                include_once __DIR__.'/../dbconnect.php';

                // 2. câu lệnh 
                $sql = <<<EOT
                    INSERT INTO nhasanxuat(nsx_ten) VALUES('$nsx_ten')
EOT;

                // 3.Thuc thi
                mysqli_query($conn,$sql);

                echo "<script>location.href='index.php'</script>";
                }
            ?>
        <!-- end content -->

        <div class="row">
            <!-- start footer -->
            <?php 
            include_once __DIR__.'/../layouts/partials/footer.php';
       ?>
            <!-- end footer -->
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>