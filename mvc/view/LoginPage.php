<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                if( !isset($_SESSION["user"]) ){
                    if( $data["Page"] == "register" ) {
                        echo "Đăng kí";
                    }
                    if( $data["Page"] == "login" ) {
                        echo "Đăng nhập";
                    }
                    if( $data["Page"] == "resetPass" ) {
                        echo "Lấy lại mật khẩu";
                    }
                }
            ?>
        </title>
        <link rel="shortcut icon" href="/public/logo.svg" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
         <script src="https://www.google.com/recaptcha/api.js?render=6LeXwKwZAAAAAAY04oITvhQKl7ui7bpYYv95binH"></script>
        <link rel="stylesheet" type="text/css" href= <?php echo ( $data["Dashboard"] . "/mvc/view/Css/Master.css");?>>
        <link rel="stylesheet" type="text/css" href= <?php echo ( $data["Dashboard"] . "/mvc/view/Css/". $data["Page"] .".css");?>>
    </head>
    <body onload="loadFunction()">
        <?php  
            if( !isset($_SESSION["user"]) )
            include_once "Pages/". $data["Page"] .".php";
            else {
                header("Location: http://localhost/WebProject-2020");
            }
        ?>
    </body>
</html>
