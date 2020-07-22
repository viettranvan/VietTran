
<!-- <h1 style="text-align: center; font-weight: bold;font-style: italic;">BEACH RESORT</h1> -->


<!-- <table class="table table-bordered table-hover" style="text-align: center; align-items: center;">
    <tr>
        <td >Số phòng đã đặt</td>
        <td ><?php echo $bookingCount ?></td>
    </tr>
    <tr>
        <td >Số loại phòng hiện có</td>
        <td ><?php echo $roomTypeCount ?></td>
    </tr>
    <tr>
        <td >Số phòng hiện có</td>
        <td ><?php echo $roomCount ?></td>
    </tr>
    <tr>
        <td >Số tài khoản hiện có</td>
        <td ><?php echo $userCount ?></td>
    </tr>
</table> -->
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">

        <h1 class="page-header">
            <i class="fa fa-dashboard"></i>Trang chủ
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                Beach Resort
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


<!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $bookingCount ?></div>
                        <div>phòng đã đặt!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?controller=booking/booking">
                <div class="panel-footer">
                    <span class="pull-left">Chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $roomTypeCount ?></div>
                        <div>Loại phòng</div>
                    </div>
                </div>
            </div>
            <a href="index.php?controller=roomtype/list">
                <div class="panel-footer">
                    <span class="pull-left">Chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $roomCount ?></div>
                        <div>Phòng hiện có!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?controller=room/list">
                <div class="panel-footer">
                    <span class="pull-left">Chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $userCount ?></div>
                        <div>Tài khoản!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?controller=users/list">
                <div class="panel-footer">
                    <span class="pull-left">Chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Phòng </h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Room ID</th>
                                <th>Tên Phòng</th>
                                <th>Loại phòng</th>
                                <th>Giá</th>
                                <th> ... </th>
                            </tr>
                        </thead>

                        <?php
                            $stt = 0;
                            foreach ($room as $value) {
                                $stt++;
                        ?>
                        <tbody>
                            <td><?php echo $value["roomid"]; ?></td>
                            <td><?php echo $value["roomame"]; ?></td>
                            <td><?php echo $value["roomtypeid"]; ?></td>
                            <td><?php echo $value["roomprice"]; ?></td>
                            <td> ... </td>
                        </tbody>
                        <?php } ?>
                    </table>
                <div class="text-right">
                    <a href="index.php?controller=room/list">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-book fa-fw"></i> Loại Phòng</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>RoomType ID</th>
                                <th>Tên loại phòng</th>
                                <th>Giá dao động</th>
                            </tr>
                        </thead>

                        <?php
                            $stt = 0;
                            foreach ($roomtype as $value) {
                                $stt++;
                        ?>
                        <tbody>
                            <td><?php echo $value["roomtypeid"]; ?></td>
                            <td><?php echo $value["roomtypename"]; ?></td>
                            <td><?php echo $value["roomprice_range"]; ?></td>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?controller=roomtype/list">Xem Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Tài khoản</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Họ tên</th>
                                <th>Tên đăng nhập</th>
                                <th>Mật khẩu</th>
                                <th> ... </th>
                            </tr>
                        </thead>

                        <?php
                            $stt = 0;
                            foreach ($user as $value) {
                                $stt++;
                        ?>
                        <tbody>
                            <td><?php echo $value["userid"]; ?></td>
                            <td><?php echo $value["fullname"]; ?></td>
                            <td><?php echo $value["loginname"]; ?></td>
                            <td><?php echo $value["password"]; ?></td>
                            <td> ... </td>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?controller=users/list">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->