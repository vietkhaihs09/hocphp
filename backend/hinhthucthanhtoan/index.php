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
            <!-- start sidebar -->
            <?php 
            include_once __DIR__.'/../layouts/partials/sidebar.php';
       ?>
            <!-- end sidebar -->

            <!-- start content -->
            <div class="col-md-9">
            <?php
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
       

        // 2. Chuẩn bị câu truy vấn $sql
       
        $sql = "select * from `hinhthucthanhtoan`";

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);

        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $ds = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $ds[] = array(
            'httt_ma'=>$row['httt_ma'],
            'httt_ten'=>$row['httt_ten']
          );
        }
        ?>
        <a href="create.php" class="btn btn-outline-primary">Thêm mới</a>
         <table class="table table-bordered table-hover mt-2">
         
            <tr>
              <th>Hình thức thanh toán mã</th>
              <th>Hình thức thanh toán tên</th>
              
              <th>Hành động</th>
            </tr>
       
          <tbody>
          <tr>
           <?php foreach ($ds as $ht):?>

                <td><?= $ht['httt_ma']?></td>
                <td><?= $ht['httt_ten']?></td>
                <td>
                    <a href="edit.php" class="btn btn-primary">Sửa</a>
                    <a href="delete.php" class="btn btn-danger">Xóa</a>
                </td>

            </tr>
           <?php endforeach?>
          </tbody>
        </table>

            </div>
        </div>
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