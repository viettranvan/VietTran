<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.css" rel="stylesheet">
  <title>Không tìm thấy trang bạn yêu cầu!</title>
  <style>
      
body {
  background-color: #AEB6BF  ;
}

.mainbox {
  background-color: #AEB6BF  ;
  margin: auto;
  height: 600px;
  width: 600px;
  position: relative;
}

  .err {
    color: #ffffff;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 11rem;
    position:absolute;
    left: 20%;
    top: 8%;
  }

.far {
  position: absolute;
  font-size: 8.5rem;
  left: 42%;
  top: 15%;
  color: #ffffff;
}

 .err2 {
    color: #ffffff;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 11rem;
    position:absolute;
    left: 68%;
    top: 8%;
  }

.msg {
    text-align: center;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 1.6rem;
    position:absolute;
    left: 16%;
    top: 45%;
    width: 75%;
  }

a {
  text-decoration: none;
  color: white;
}

a:hover {
  text-decoration: underline;
}
  </style>
</head>
<body>
    <div class="mainbox">
        <div class="err">4</div>
        <i class="far fa-question-circle fa-spin"></i>
        <div class="err2">4</div>
        <div class="msg">Không thể tìm thấy trang bạn yêu cầu! Hoặc nó đã bị xóa? Hoặc nó đã bị ẩn? <p>Trở về <a href="<?php echo $data["Dashboard"] ?>">trang chủ</a> hoặc thử cách khác.</p></div>
    </div>
    <script>
      new jBox('Confirm', {
        confirmButton: 'Do it!',
        cancelButton: 'Nope'
      });
    </script>
</body>
</html>