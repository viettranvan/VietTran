//Escape htmlSpecialChar
function escapeHtml(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;'
  };
  
  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}


$(document).ready(function(){
//Handle password strength
$("#userPass").focus(function(){
    $("#passwordStrength").css("display","inline-block");
});
$("#userPass").blur(function(){
    $("#passwordStrength").css("display","none");
});
//Handle register form
$('#register').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:escapeHtml("/WebProject-2020/Login/HandleRegister/"),
   method:"POST",
   //hàm serialize lấy ra các thành phần trong form và mã hóa thành giá chuỗi
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function()
   {
    $('#registerBtn').attr('disabled','disabled');
    $('#registerBtn img').css("display","inline-block");
   },
   success:function(data)
   {
    $('#registerBtn').attr('disabled', false);
    if(data.success)
    {
     //grecaptcha.reset();
     //sử dụng sweetAlert
     $('#registerBtn img').css("display","none");
     swal({
        title: "Đăng kí thành công!",
        text: data.success,
        confirmButtonColor: '#04B404',
        confirmButtonText: 'Đăng nhập',
        closeOnConfirm: false,
        imageUrl:'/WebProject-2020/public/success.gif'
        //closeOnCancel: false
      },
      function(){
        window.location.href = "/WebProject-2020/Login/LoginPage/login";  
        $('#registerBtn img').css("display","none");
      });
    }
    if(data.fail)
    {
      swal({
        title: "Đăng kí thất bại!",
        text: data.fail,
        confirmButtonColor: '#DF013A',
        imageUrl: '/WebProject-2020/public/success.gif'
      },
      function(){
        window.location.href = "/WebProject-2020/Login/LoginPage/register";  
      });
    }
   }
  })
 });
//Handle login form
$('#login').on('submit', function(event){
  event.preventDefault();
  $.ajax({
    url: escapeHtml("/WebProject-2020/Login/HandleLogin/"),
    method:"POST",
    //hàm serialize lấy ra các thành phần trong form và mã hóa thành giá chuỗi
    data:$(this).serialize(),
    dataType:"json",
    beforeSend:function()
    {
     $('#loginBtn').attr('disabled','disabled');
    },
    success:function(data)
    {
     $('#loginBtn').attr('disabled', false);
     if(data.success)
     {
      //sử dụng sweetAlert
      swal({
         title: "Đăng nhập thành công!",
         text: "Chúc mừng. Bạn đã đăng nhập tài khoản thành công!",
         confirmButtonColor: '#04B404',
         confirmButtonText: "OK",
         closeOnConfirm: false,
         imageUrl: '/WebProject-2020/public/success.gif',
         //closeOnCancel: false
       },
       function(){
        window.location.href = "/WebProject-2020/Home/IndexPage/index";  
       });
     }
     if(data.fail)
     {
       swal({
         title: "Đăng nhập thất bại!",
         text: data.fail,
         confirmButtonColor: '#DF013A',
         imageUrl: '/WebProject-2020/public/fail.gif'
       },
       function(){
        window.location.href = "/WebProject-2020/Login/LoginPage/login";  
      });
     }
 
    }
   })
});
//Handle resetPass
$('#rsPass').on('submit', function(event){
  event.preventDefault();
  $.ajax({
    url: escapeHtml("/WebProject-2020/Login/resetPass"),
    method:"POST",
    data:$(this).serialize(),
    dataType:"json",
    beforeSend:function()
    {
     $('#loginBtn').attr('disabled','disabled');
    },
    success:function(data)
    {
      console.log(data);
     if(data.success)
     {
      //sử dụng sweetAlert
      swal({
         title: "Cài lại mật khẩu thành công!",
         text: "Mật khẩu đã gửi vào email của bạn, vui lòng kiểm tra mail",
         confirmButtonColor: '#04B404',
         confirmButtonText: "Trở lại",
         closeOnConfirm: false,
         imageUrl: '/WebProject-2020/public/success.gif',
       },
      function(){
        window.location.href = "/WebProject-2020/Login/LoginPage/resetPass";  
      });
     }
     if(data.fail)
     {
       swal({
         title: "Đặt lại mật khẩu thất bại!",
         text: data.fail,
         confirmButtonColor: '#DF013A',
         imageUrl: '/WebProject-2020/public/fail.gif'
       });
     }
 
    }
   })
});



});
