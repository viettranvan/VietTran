
 

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  // window.alert("test")
var height2 = document.getElementById("navnavnav").style.height;
if ( document.body.scrollTop > height2 || document.documentElement.scrollTop > height2) {
    document.getElementById("h").style.padding = "10px";
    document.getElementById("h").style.backgroundColor = " rgb(133, 133, 133) ";
    document.getElementById("h").style.boxShadow = "0px 6px 5px 3px rgba(0, 0, 0, 0.281);";
} else { 
    document.getElementById("h").style.padding = "25px";
    document.getElementById("h").style.backgroundColor = "rgb(255, 255, 255)";
    document.getElementById("h").style.boxShadow = "none";
    }
}
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
    var type = typeof typeTotal !== 'undefined' ? typeTotal : "undefined";
    $("#Rsort").change(function(){
      modifiedData();
    });
    $("#filterName").change(function(){
      modifiedData();
    })
    //modified data
    modifiedData();
    function modifiedData(){
      $('#view').html('<div id="loadingroom" style="" ></div>');
      var dis;
      if( $("#listViewbtn").hasClass("viewActive") ){
        dis = "list";
      }
      if( $("#gridViewbtn").hasClass("viewActive") ){
        dis = "grid";
      }
      var action = $("#Rsort").val();
      var filterName = $("#filterName").val();
      var filterType = $("#filterType").val();
      var inputPrice = $("#inputPrice").val();
      var filterMaxNum = $("#filterMaxNum").val();
      $.ajax({
        url: escapeHtml("/WebProject-2020/Room/RoomSort"),
        method:"POST",
        data:"action=" + action + "&type=" + type + "&display=" +dis+ "&filterName=" + filterName + "&filterType=" +filterType+ "&inputPrice=" +inputPrice+ "&filterMaxNum=" +filterMaxNum,
        beforeSend:function(){
          console.log("action=" + action + "&type=" + type + "&display=" +dis+ "&filterName=" + filterName + "&filterType=" +filterType+ "&inputPrice=" +inputPrice+ "&filterMaxNum=" +filterMaxNum)
        },
        success:function(data)
        {
          $("#view").html(data);      
        }
      });
    }
    $('.common_selector').click(function(){
      //console.log($("#inputPrice").val())
      modifiedData();
    });
    $('.common_selector').change(function(){
      //console.log($("#inputPrice").val())
      modifiedData();
    });
    AOS.init({
    duration: 1200,
    once: true
    })
    //Handle nav resize
    $(window).scroll( function(){
        $('header').toggleClass('navigation-bar-scrolled', $(this).scrollTop() > $('.wrap-banner').height() - 20 );
    });
    //Handle find by price range
    $("#labelPrice").text( "$" + $("#inputPrice").val() );
    $("#inputPrice").change(function(){
        $("#labelPrice").text( "$" + $("#inputPrice").val() );
    });
    //Handle view by grid and list
    $("#listViewbtn").click(function(){
        $("#listViewbtn").addClass("viewActive");
        $("#gridViewbtn").removeClass("viewActive");
        modifiedData();
    });
    $("#gridViewbtn").click(function(){
      $("#gridViewbtn").addClass("viewActive");
      $("#listViewbtn").removeClass("viewActive");
      modifiedData();
    })
    //check date validate
    /*var dateLemax = $("#booking #dateLe").val();
    $("#booking #dateAr").attr('max',dateLemax);*/
    $("#booking #dateLe").change(function(){
      if( Date.parse($("#booking #dateLe").val()) <  Date.parse($("#booking #dateLe").attr('min')) ) {
        $("#booking #dateLe").val($("#booking #dateLe").attr('min'));
      }
      //Validate date must equal than current date, different value form date
      if( Date.parse($("#booking #dateLe").val()) >=  Date.parse($("#booking #dateLe").attr('min')) && Date.parse($("#booking #dateLe").val()) > Date.parse($("#booking #dateAr").val()) ){
        //display date booking
        var price = (Date.parse($("#booking #dateLe").val()) - Date.parse($("#booking #dateAr").val()));
        //convert milisecond to second
        price = price * 0.001 ;
        //convert second to hour
        price = price * 0.000277777778;
        //convert hour to date
        price = price * 0.0416666667;
        //display price
        price = parseInt(price*pri);
        $.ajax({
          url: escapeHtml("/WebProject-2020/Room/CheckRoomDate"),
          method:"POST",
          //hàm serialize lấy ra các thành phần trong form và mã hóa thành giá chuỗi
          data:$("#booking").serialize() + "&roomID=" + roomIDD,
          dataType:"json",
          success:function(data)
          {
           //$('#loginBtn').attr('disabled', false);
           if(data.success)
           {
            $("#success").css("display","block");
            $("#fail").css("display","none");
           }
           if(data.fail)
           {
            $("#fail").css("display","block");
            $("#success").css("display","none");
           }
          }
         })
         $("#gia").text(price+"$");
      }
      else {
        $("#success").css("display","none");
        $("#fail").css("display","none");
        $("#gia").text(0+"$");
      }
    });
    $("#booking #dateAr").change(function(){
      var dateArriveValue = Date.parse($("#booking #dateAr").val());
      var dateArriveMinValue = Date.parse($("#booking #dateAr").attr('min'));
      if( dateArriveValue < dateArriveMinValue ) {
        $("#booking #dateAr").val($("#booking #dateAr").attr('min'));
      }
      //Validate date must equal than current date, different value form date
      if(  dateArriveValue >=  dateArriveMinValue ){
        var m = $("#booking #dateAr").val();
        $("#booking #dateLe").attr('min',m);
        $("#booking #dateLe").val(m);
        //display date booking
        var price = (Date.parse($("#booking #dateLe").val()) - Date.parse($("#booking #dateAr").val()));
        //convert milisecond to second
        price = price * 0.001 ;
        //convert second to hour
        price = price * 0.000277777778;
        //convert hour to date
        price = price * 0.0416666667;
        //display price
        price = parseInt(price*pri);
        $.ajax({
          url: escapeHtml("/WebProject-2020/Room/CheckRoomDate"),
          method:"POST",
          //hàm serialize lấy ra các thành phần trong form và mã hóa thành giá chuỗi
          data:$("#booking").serialize() + "&roomID=" + roomIDD,
          dataType:"json",
          success:function(data)
          {
           if(data.success)
           {
            $("#success").css("display","block");
            $("#fail").css("display","none");
            $("#err").css("display","none");
            $('#btnConfirm').removeAttr("disabled");
           }
           if(data.fail)
           {
            $("#fail").css("display","block");
            $("#success").css("display","none");
            $("#err").css("display","none");
           }
          }
         })
         $("#gia").text(price+"$");
      }
    });

    //Booking
    $('#booking').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url: escapeHtml("/WebProject-2020/Room/InsertBooking"),
        method:"POST",
        //hàm serialize lấy ra các thành phần trong form và mã hóa thành giá chuỗi
        data:$(this).serialize() + "&userID=" + userIDD + "&roomID=" + roomIDD + "&price=" + pri,
        dataType:"json",
        success:function(data)
        {
         if(data.success)
         {
          //sử dụng sweetAlert
          swal({
             title: "Đặt phòng thành công!",
             text: "Chúc mừng. Bạn đã đặt phòng " +rname+ " thành công!",
             confirmButtonColor: '#04B404',
             confirmButtonText: 'OK Tuyệt!',
             closeOnConfirm: false,
           },
           function(){
               window.location.reload(); 
           });
         }
         if(data.fail)
         {
           if( data.fail == "Bạn chưa đăng nhập! Hãy đăng nhập để đặt phòng") {
                swal({
                title: "Đặt phòng thất bại!",
                text: data.fail,
                confirmButtonColor: '#DF013A',
                confirmButtonText: 'Đăng nhập',
                closeOnConfirm: false
                },
                function(){
                    window.location.href = "/WebProject-2020/Login/LoginPage/login"; 
                });
           }
           else {
               swal({
                title: "Đặt phòng thất bại!",
                text: data.fail,
                confirmButtonColor: '#DF013A',
                });
           }
         }
        }
       })
    });
    
    

});

