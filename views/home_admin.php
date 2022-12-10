
<?php include 'views/header.php'; ?>
       <!-- Sale & Revenue Start -->
       <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today</p>
                                <?php if(isset($_SESSION['admin'])){
                                                extract($_SESSION['admin']);
                                ?> 
                                <h6 class="mb-0"><?=$user?></h6>
                                <?php
                                } ?>
                                <h6>Xin chào !</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bxs-hourglass-top fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Đang xử lý</p>
                                <h6 class="mb-0">$<?= $total_pending = order_pending(); ?></h6>
                                <a href="index.php?action=order_pending" style="margin-top:20px;" >Xem đơn hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bx-notepad fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Hoàn thành</p>
                                <h6 class="mb-0">$<?= $total_completes = order_completes(); ?></h6>
                                <a href="index.php?action=order_completed" style="margin-top:20px;">Xem đơn hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bx-cart-alt fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Đơn hàng</p>
                                <h6 class="mb-0"><?= $number_of_orders = number_of_orders(); ?></h6>
                                <a href="index.php?action=order_admin" style="margin-top:20px;">Xem đơn hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bxs-t-shirt fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Sản phẩm</p>
                                <h6 class="mb-0"><?=$list_number_sp = number_of_sanpham() ?> </h6>
                                <a href="index.php?action=list_sp">Sản phẩm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bx-user-pin fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Người dùng</p>
                                <h6 class="mb-0"><?=$list_number_khachhang = number_of_users() ?></h6>
                                <a href="index.php?action=list_khachhang">Xem người dùng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bx-message fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Tin nhắn mới</p>
                                <h6 class="mb-0"><?=$list_messages = number_of_messages()?></h6>
                                <a href="index.php?action=show_messages">Xem tin nhắn</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bx-package fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Danh mục</p>
                                <h6 class="mb-0"><?=$number_dm = number_dm() ?></h6>
                                <a href="index.php?action=loai_san_pham">Xem danh mục</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bxs-message-rounded-dots fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Bình luận</p>
                                <h6 class="mb-0"><?php echo $list_number_binhluan = number_comment_clothes() ?></h6>
                                <a href="index.php?action=show_binhluan">Xem bình luận</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class='bx bxs-news fa-3x text-primary'></i>
                            <div class="ms-3">
                                <p class="mb-2">Tin tức</p>
                                <h6 class="mb-0"><?= $number_of_new = number_news(); ?></h6>
                                <a href="index.php?action=list_news">Xem tin tức</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="piechart_3d" style="width: 900px; height: 500px;margin:30px auto 10px auto"></div>
            </div>
            <!-- Sale & Revenue End -->
<?php include 'views/footer.php'; ?>
