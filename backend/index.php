<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- style start -->
    <?php
        include_once __DIR__.'/layouts/styles.php'
    ?>
    <!-- style end -->
</head>

<body>
    <?php
        include_once __DIR__.'/dbconnect.php';
    ?>
    <div class="container-fluid">
       <?php 
            include_once __DIR__.'/layouts/partials/header.php';
       ?>

        <div class="row">
            <!-- start sidebar -->
            <?php 
            include_once __DIR__.'/layouts/partials/sidebar.php';
       ?>
            <!-- end sidebar -->

            <!-- start content -->
            <div class="col-md-9">
            <?php
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
       

        // 2. Chuẩn bị câu truy vấn $sql
        $stt = 1;
        $sql = "select * from `loaisanpham`";

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);

        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $ds_loaisanpham = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $ds_loaisanpham[] = array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
            'lsp_mota' => $row['lsp_mota'],
          );
        }
        ?>
         <table class="table table-bordered table-hover mt-2">
          <thead class="thead-dark">
            <tr>
              <th>Mã loại sản phẩm</th>
              <th>Tên loại sản phẩm</th>
              <th>Mô tả loại sản phẩm</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ds_loaisanpham as $loaisanpham) : ?>
              <tr>
                <td><?= $loaisanpham['lsp_ma'] ?></td>
                <td><?= $loaisanpham['lsp_ten'] ?></td>
                <td><?= $loaisanpham['lsp_mota'] ?></td>
                <td>
                  <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `lsp_ma` -->
                  <a href="edit.php?lsp_ma=<?= $loaisanpham['lsp_ma'] ?>" class="btn btn-warning">
                    <span data-feather="edit"></span> Sửa
                  </a>

                  <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `lsp_ma` -->
                  <a href="delete.php?lsp_ma=<?= $loaisanpham['lsp_ma'] ?>" class="btn btn-danger">
                    <span data-feather="delete"></span> Xóa
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

            </div>
        </div>
        <!-- end content -->

        <div class="row">
            <!-- start footer -->
            <?php 
            include_once __DIR__.'/layouts/partials/footer.php';
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