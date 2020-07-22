<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Beach Resort</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="http://localhost/WebProject-2020/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/WebProject-2020/public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://localhost/WebProject-2020/public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/WebProject-2020/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.../public/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Beach Resort</a>
            </div>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        <?php
                            echo isset($_SESSION["account"]) ? $_SESSION["name"]:"";
                        ?>
                         
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php?act=logout"><i class="fa fa-fw fa-power-off"></i> Đăng Xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Trang chủ</a>
                    </li>
                    <li class="active">
                        <a href="index.php?controller=users/list"><i class="fa fa-fw fa-users"></i> Quản lý users</a>
                    </li>
                            
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-list-alt"></i> Quản lý phòng <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li class="active">
                                <a href="index.php?controller=booking/booking"><i class="fa fa-fw fa-folder-o"></i> Quản lý đặt phòng - Booking</a>
                            </li>
                            <li class="active">
                                <a href="index.php?controller=room/list"><i class="fa fa-fw fa-university"></i> Danh sách phòng - Room</a>
                            </li>
                            <li class="active">
                                <a href="index.php?controller=roomtype/list"><i class="fa fa-fw fa-book"></i> Danh sách loại phòng - RoomType</a>
                            </li>
                            <li class="active">
                                <a href="index.php?controller=roomimage/list"><i class="fa fa-fw fa-file-image-o"></i> Quản lý ảnh phòng - RoomImage</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php
                    if(file_exists($controller))
                        include $controller;
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
     <script>

        // --------user------------
        // thêm mới 1 user
        function submidFunc(){
            event.preventDefault();
            if( $("#passCurr").val() === $("#passConfir").val() ) {
                $.ajax({
                    url: "http://localhost/WebProject-2020/admin/index.php",
                    method:"POST",
                    data:$("#formInputAdduser").serialize() + "&action=add",
                    success:function(data){
                        if( data.trim() === "thanh cong") {
                        window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=users/list"; 
                        } 
                        else{
                            console.log(data);
                        }
                    }
                }); 
            }
            else {
                window.alert("Mật khẩu và mật khẩu xác nhận phải giống nhau!");
            }

        }
        // xóa 1 user
        function onDelete(id) {
            var option = window.confirm('Bạn có muốn xóa không?');
            if(option == true){
                $.ajax({
                    url: "http://localhost/WebProject-2020/admin/index.php",
                    method:"POST",
                    data:"action=delete"+"&id=" + id,
                    success:function(data){
                      if( data.trim() === "thanh cong") {
                        window.location.reload();
                      }
                    }
                });
            }
            else{
                console.log("cancer pressed");
            }
        }
        // chỉnh sửa thông tin user
        function onEdit(id){
            var option = window.confirm('Xác nhận cập nhật?');
            if(option == true){
                event.preventDefault();
                $.ajax({
                    url: "http://localhost/WebProject-2020/admin/index.php",
                    method:"POST",
                    data:$("#formInputEditUs").serialize() + "&action=edit"+"&id=" + id,
                    success:function(data){
                        if( data.trim() === "thanh cong") {
                            window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=users/list"; 
                        }
                    }
                });
            }
            else{
                console.log("cancer pressed");
            }
        }
        // ------end user-----------

        

        // ------Room--------
        // xoa 1 truong room (Danh sach phong)
        function delRoom(id){
            var option = window.confirm('Bạn có muốn xóa không?');
            if(option == true){
                $.ajax({
                    url: "http://localhost/WebProject-2020/admin/index.php",
                    method:"POST",
                    data:"action=delRoom"+"&id=" + id,
                    success:function(data){
                      if( data.trim() === "thanh cong") {
                        window.location.reload();
                      }
                    }
                });
            }
            else{
                console.log("Cancer pressed");
            }
        }
        // thêm mới 1 phòng (chưa update được phần thêm ảnh)
        function addRoom(){
            event.preventDefault();
            var form_data = new FormData();
            form_data.append("fileToUpload", document.getElementById('fileToUpload').files[0]);
            form_data.append("roomid", document.getElementById('RID').value);
            form_data.append("roomame", document.getElementById('Rname').value);
            form_data.append("roomtypeid", document.getElementById('RtypeID').value);
            form_data.append("roomprice", document.getElementById('RPricee').value);
            form_data.append("roomquanlity", document.getElementById('RquanLT').value);
            form_data.append("roomrate", document.getElementById('RRatee').value);
            form_data.append("discription", document.getElementById('RDISCr').value);
            form_data.append("allowpet", document.getElementById('ALLPet').value);
            form_data.append("action","addNewRoom");
            $.ajax({
                url: "http://localhost/WebProject-2020/admin/index.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(data){
                    console.log(data);
                    if(data.trim() == "khong thanh cong"){
                        alert("id phòng đã tồn tại, vui lòng chọn id khác");
                    }
                    if(data.trim() == "thanh cong"){
                        window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=room/list";
                    }
                }
            });
        }
        function editRoom(){
            event.preventDefault();
            var form_data = new FormData();
            form_data.append("fileToUpload", document.getElementById('fileToUpload').files[0]);
            form_data.append("roomid", document.getElementById('RID').value);
            form_data.append("roomame", document.getElementById('Rname').value);
            form_data.append("roomtypeid", document.getElementById('RtypeID').value);
            form_data.append("roomprice", document.getElementById('RPricee').value);
            form_data.append("roomquanlity", document.getElementById('RquanLT').value);
            form_data.append("roomrate", document.getElementById('RRatee').value);
            form_data.append("discription", document.getElementById('RDISCr').value);
            form_data.append("allowpet", document.getElementById('ALLPet').value);
            
            form_data.append("action","edit_Room");
            $.ajax({
                url: "http://localhost/WebProject-2020/admin/index.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(data){
                    //console.log(data);
                    if(data.trim() == "thanh cong"){
                        window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=room/list";
                    }
                }
            });
        }
        // -----end room--------
        // ------Roomimage--------
        // thêm mới ảnh phòng
        function addImage(){
            event.preventDefault();
            var form_data = new FormData();
            form_data.append("image1", document.getElementById('image1').files[0]);
            form_data.append("image2", document.getElementById('image2').files[0]);
            form_data.append("image3", document.getElementById('image3').files[0]);
            var strr = document.getElementById('RID').value;
            var dttt = strr.split("-", 1);
            dttt = dttt.toString();
            form_data.append("roomid",dttt);
            form_data.append("action","addNewImage");
            $.ajax({
                url: "http://localhost/WebProject-2020/admin/index.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(data){
                    console.log(data);
                    if(data.trim() == "thanh cong"){
                        window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=roomimage/list";
                    }
                }
            });
        }
        // xoa 1 truong anh (Quan ly anh phong)
        function deleteImage(id){
            var option = window.confirm('Bạn có muốn xóa không?');
            if(option == true){
                $.ajax({
                    url: "http://localhost/WebProject-2020/admin/index.php",
                    method:"POST",
                    data:"action=delImg"+"&id=" + id,
                    success:function(data){
                      if( data.trim() === "thanh cong") {
                        window.location.reload();
                      }

                    }
                });
            }
            else{
                console.log("Cancer pressed");
            }
        }
        function editImage(){
            event.preventDefault();
            var form_data = new FormData();
            form_data.append("image1", document.getElementById('image1').files[0]);
            form_data.append("image2", document.getElementById('image2').files[0]);
            form_data.append("image3", document.getElementById('image3').files[0]);
            form_data.append("roomid", document.getElementById('RID').value);
            form_data.append("action","edit_Image");
            $.ajax({
                url: "http://localhost/WebProject-2020/admin/index.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(data){
                    console.log(data);
                    if(data.trim() == "khong thanh cong"){
                        alert("Vui lòng chọn ảnh cần cập nhật!");
                    }
                    if(data.trim() == "thanh cong"){
                        window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=roomimage/list";
                    }
                }
            });
        }
        // ------end Roomimage----





        // --------roomtype------------
        // thêm loại phòng
        function addRoomType(){
            event.preventDefault();
            var form_data = new FormData();
            form_data.append("roomtypeimg", document.getElementById('roomtypeimg').files[0]);
            form_data.append("roomtypeid", document.getElementById('RID').value);
            form_data.append("roomtypename", document.getElementById('roomtypename').value);
            form_data.append("roomprice_range1", document.getElementById('roomprice_range1').value);
            form_data.append("roomprice_range2", document.getElementById('roomprice_range2').value);
            form_data.append("action","addNewRoomType");
            $.ajax({
                url: "http://localhost/WebProject-2020/admin/index.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(data){
                    if(data.trim() == "thanh cong"){
                        window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=roomtype/list";
                    }
                }
            });
        }
        // xóa 1 trường khỏi loại phòng (Danh sách loại phòng)
        function delRoomType(id){
            var option = window.confirm('Bạn có muốn xóa không?');
            if(option == true){
                $.ajax({
                    url: "http://localhost/WebProject-2020/admin/index.php",
                    method:"POST",
                    data:"action=deleteRoomType"+"&id=" + id,
                    success:function(data){
                      if( data.trim() === "thanh cong") {
                        window.location.reload();
                      }
                    }
                });
            }
            else{
                console.log("Cancer pressed");
            }
        }
        function editRoomType(){
            event.preventDefault();
            var form_data = new FormData();
            form_data.append("roomtypeid", document.getElementById('RID').value);
            form_data.append("roomtypename", document.getElementById('roomtypename').value);
            form_data.append("roomprice_range1", document.getElementById('roomprice_range1').value);
            form_data.append("roomprice_range2", document.getElementById('roomprice_range2').value);
            form_data.append("roomtypeimg", document.getElementById('roomtypeimg').files[0]);
            form_data.append("action","editRoomType");
            $.ajax({
                url: "http://localhost/WebProject-2020/admin/index.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(data){
                    if(data.trim() == "thanh cong"){
                        window.location.href = "http://localhost/WebProject-2020/admin/index.php?controller=roomtype/list";
                    }
                }
            });
        }

        // ---------end roomtype----------
           // xóa booking
        function deleteBooking(id,dateAR,dateLE) {
            var option = window.confirm('Bạn có muốn xóa không?');
            if(option == true){
                $.ajax({
                    url: "http://localhost/WebProject-2020/admin/index.php",
                    method:"POST",
                    data:"action=deleteBooking"+"&id=" + id +"&dateAR=" + dateAR +"&dateLE=" + dateLE,
                    success:function(data){
                      if( data.trim() === "thanh cong") {
                        window.location.reload();
                      }
                    }
                });
            }
            else{
                console.log("cancer pressed");
            }
        }
              
    </script>

    <!-- jQuery -->
    <script src="http://localhost/WebProject-2020/public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/WebProject-2020/public/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="http://localhost/WebProject-2020/public/js/plugins/morris/raphael.min.js"></script>
    <script src="http://localhost/WebProject-2020/public/js/plugins/morris/morris.min.js"></script>
    <script src="http://localhost/WebProject-2020/public/js/plugins/morris/morris-data.js"></script>
       

</body>

</html>
