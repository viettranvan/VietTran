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
//Check password strength
function checkPassword(password){
  var strengthBar = document.getElementById("strength");
  var strength = 0;
  if(password.match(/[a-z]+/)){
    strength += 1;
  }
  if(password.match(/[A-Z]+/)){
    strength += 1;
  }
  if(password.match(/[#$^+=!*()@%&]+/)){
    strength += 1;
  }
  if(password.length > 5){
    strength += 1;
  }
  switch(strength){
    case 0 :
    strengthBar.value = 20;   
    break;
    case 1 :
    strengthBar.value = 40;
    break;
    case 2 :
    strengthBar.value = 60;
    break;
    case 3 :
    strengthBar.value = 80;
    break;
    case 4 :
    strengthBar.value = 100;
    break;
  }

}
var ovlayChange = document.getElementById("ckbx");
function changeChecked() {
    ovlayChange.classList.add("checked");
    if ( ovlayChange.checked ) {
        document.getElementById("changePassword").style.display = "block";
    }
    else{
        document.getElementById("changePassword").style.display = "none";
    }
}
function onClose(){
    document.getElementById("ovlClose").style.display = " none ";
}
function onOpen() {
    document.getElementById("ovlClose").style.display = " block ";
}
function handleToggle(name){
  var y = $("#"+name+">form");
  y.trigger("reset");
  var c = document.getElementById(name);
  c.style.maxHeight = null;
}
$(document).ready(function(){
  //Handle password strength
  $("#userPass").focus(function(){
    $("#passwordStrength").css("display","inline-block");
  });
  $("#userPass").blur(function(){
    $("#passwordStrength").css("display","none");
  });
  function onEdit(object,edit,field,modVl,handleTggl) {
    event.preventDefault();
    $.ajax({
      url: escapeHtml("/WebProject-2020/User/"+edit+""),
      method:"POST",
      data:object.serialize(),
      dataType:"json",
      success: function(data)
        {
          var tenmoi = $("#nameMod").val();
          console.log("Dasd");
            if( data.success ){
              option = {
                content: data.success ,
                color: 'green',
                fade: 200,
                animation: 'move',
                autoClose: 1000,
                theme:'TooltipDark',
              }
              new jBox('Notice', option);
              $("#"+field+"").text(modVl);
              $("#nameHeader").text(tenmoi);
              handleToggle(handleTggl);
              
            }
            if( data.fail ) {
              option = {
                content: data.fail ,
                color: 'red',
                fade: 200,
                animation: 'move',
                autoClose: 1000,
                theme:'TooltipDark',
              }
              new jBox('Notice', option);
            }
        }
     })
  }
  $('#content1 > form').on('submit', function(event){
    onEdit($('#content1 > form'),"Edit1","filed1",$("#nameMod").val(),"content1");
  });
  $('#content2 > form').on('submit', function(event){
    onEdit($('#content2 > form'),"Edit2","filed2",$("#mailMod").val(),"content2");
  });
  $('#content3 > form').on('submit', function(event){
    onEdit($('#content3 > form'),"Edit3","filed3",$("#userPass").val(),"content3");
  });
  $('#content4 > form').on('submit', function(event){
    onEdit($('#content4 > form'),"Edit4","filed4",$("#selectGen").val(),"content4");
  });
  $('#content5 > form').on('submit', function(event){
    onEdit($('#content5 > form'),"Edit5","filed5",$("#numUser").val(),"content5");
  });
  $('#content6 > form').on('submit', function(event){
    onEdit($('#content6 > form'),"Edit6","filed6",$("#addUs").val(),"content6");
  });




});

//Handle toggle Collapse
var coll = document.getElementsByClassName("cardProfile");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

//Close room alert 
function closeRoomAlert(){
    var x = document.getElementById("booking-alert");
    x.style.display = "none";
}
//Function delete room booking 
function deleteBking(roomid,dateArr,dateLea) {
  new jBox("Confirm", {
    confirmButton: "Đúng vậy!",
    cancelButton: "Khoan đã",
    content: "Bạn có thực sự muốn xóa phòng này?",
    blockScroll: false,
    confirm: function () {
      $.ajax({
        url: escapeHtml("/WebProject-2020/User/DeleteRoomBooking"),
        method:"POST",
        data:"roomid=" +roomid+ "&dateArr=" +dateArr+ "&dateLea=" +dateLea,
        dataType:"json",
        success: function(data)
          {   
              if( data.success ){
                option = {
                  content: data.success ,
                  color: 'green',
                  fade: 800,
                  animation: 'move',
                  autoClose: 1000,
                  theme:'TooltipDark',
                }
                new jBox('Notice', option);
                setTimeout(location.reload.bind(location), 1500);
              }
              if( data.fail ) {
                option = {
                  content: data.fail ,
                  color: 'red',
                  fade: 200,
                  animation: 'move',
                  autoClose: 1000,
                  theme:'TooltipDark',
                }
                new jBox('Notice', option);
              }
          }
       })
    }
    }).open ();
}