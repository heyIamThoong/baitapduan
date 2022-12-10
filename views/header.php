<?php
$conn = pdo_get_connection();
$sql_chart = "SELECT `loai_san_pham` .* , COUNT(san_pham.iddm) AS 'number_product' FROM `san_pham`
INNER JOIN `loai_san_pham` ON san_pham.iddm = loai_san_pham.iddm GROUP BY san_pham.iddm ";
$select_chart = $conn->prepare($sql_chart);
$select_chart->execute();
$data =[];
while($row_chart = $select_chart->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_chart;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="public_admin/img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Libraries Stylesheet -->
    <link href="public_admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="public_admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public_admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="public_admin/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['loai_san_pham' , 'number_product'],
          <?php
          foreach($data as $key){
            echo "['".$key['name']."' , ".$key['number_product']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Thống kê số lượng danh mục và quần áo',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="public_admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <?php if(isset($_SESSION['admin'])){
                            extract($_SESSION['admin']);
                        ?>
                            <h6 class="mb-0"><?=$user?></h6>
                        <?php
                        }     
                        ?>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Sản phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="index.php?action=list_sp" class="dropdown-item">Danh sách</a>
                            <a href="index.php?action=add_sp" class="dropdown-item">Thêm sản phẩm</a>
                            <a href="index.php?action=loai_san_pham" class="dropdown-item">Danh mục</a>
                        </div>
                    </div>
                    <a href="index.php?action=order_admin" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Đơn hàng</a>
                    <a href="index.php?action=list_khachhang" class="nav-item nav-link"><i class='bx bx-user-circle me-2'></i>Người dùng</a>
                    <a href="index.php?action=show_messages" class="nav-item nav-link"><i class='bx bx-chat me-2'></i>Phản hồi</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class='bx bx-news'></i>Tin tức</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="index.php?action=list_news" class="dropdown-item">Danh sách tin tức</a>
                            <a href="index.php?action=add_news" class="dropdown-item">Thêm tin tức</a>
                      
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="index.php?action=logout_admin" class="dropdown-item">Sign In</a>
                            <a href="index.php?action=register_admin" class="dropdown-item">Sign Up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form> -->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>

                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user" style="width: 40px; height: 40px;"></i>
                            <span class="d-none d-lg-inline-flex"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="index.php?action=logout_admin" class="dropdown-item" onclick="return confirm('Bạn có muốn đăng xuất không ? ');">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->