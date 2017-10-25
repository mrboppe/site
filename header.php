<link rel="stylesheet" href="./css/main.css">
<script src="./js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#loginForm').submit(function(e) {

      $.ajax({
        url:'/pages/checklogin.php',
        type:'post',
        data:$(this).serialize(),
        success:function(data){
          if(data == 'success')
            location.reload();
        }
      });
      e.preventDefault();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('.profile_general').click(function(){
      $('.profile_edit_box').fadeOut();
      $('.profile_info_box').fadeIn();
      $('.profile_general').css('background-color','#ddd');
      $('.profile_edit').css('background-color','#f1eeee');
    });
    $('.profile_edit').click(function(){
      $('.profile_info_box').fadeOut();
      $('.profile_edit_box').fadeIn();
      $('.profile_edit').css('background-color','#ddd');
      $('.profile_general').css('background-color','#f1eeee');
    });


function online(){
  $.ajax({
    url:'/pages/checkonline.php',
    success: function(){
      console.log("done");
    }
  });
}

setInterval(online, 60000);

    $('.register').submit(function(e) {
      $.ajax({
        url:'/pages/newuser.php',
        type:'post',
        data:$(this).serialize(),
        success: function(data){
          if(data == 'inv_email'){
            alert('Invalida Email');
          } else if (data == 'pass_match') {
            alert('Password mismatch');
          } else if (data == 'fields_required'){
            alert('Fill required fields');
          } else if( data == 'fail'){
            alert('query Failed');
          } else {
            location.reload();
          }
          console.log(data);
        }
      });
      e.preventDefault();
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) { $('#myImage').attr('src', e.target.result); }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#avatar").change(function() { readURL(this); });

  });




</script>
