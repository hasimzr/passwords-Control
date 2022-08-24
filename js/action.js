$(document).on("submit", "form", function (e) {
    var $data = new FormData(this);
    var load2width = 0;
    $.ajax({
      url: "db/fileUpload.php",
      data: $data,
      contentType: false,
      processData: false,
      type: "post",
      success: function (xhr) {
        if(xhr == "Dosya daha önceden yüklenmiş" || xhr == "Dosya boyutu sınırı" || xhr == "Desteklenmeyen dosya formatı." || xhr == "Hata oluştu" || xhr == "Lütfen bir dosya seçin"){
            alertx(xhr);
        }else{
          $("#imgUploadButton").hide();
          $(".load1").show();
          var loader = setInterval(function(){
            load2width++;
            $("#load2").css("width", load2width+"%");
            $("#load2").html(load2width+"%");
            if(load2width == 99){
                clearInterval(loader);
                
            }
          }, 10);
          var loader2 = setInterval(function(){
            xhr = xhr.substr(0,24);
              if(load2width == 99 && xhr == "Dosya başarıyla yüklendi"){
                  load2width++;
                  $("#load2").css("width", load2width+"%");
                  $("#load2").html(load2width+"%");
                  if(load2width == 100){
                      $("#load2").css("width", "100%");
                      $("#load2").css("font-size", "17px");
                      $("#load2").html("Resim Başarı ile Yüklendi");
                      clearInterval(loader2);
                  }
              }
          }, 100);
        }  
    }
    });
});

function sumitValue(){
    var passwordName = $("#appName").val();
    var password1    = $("#edit1Password1").val();
    var password2    = $("#edit1Password2").val();
    if(password1 == password2){
        $.post( "db/action.php", {"passwordName": passwordName, "addPassword": "1", "password1": password1, "password2": password2}, function( data ) {
            alertx(data);
            setTimeout(function() { window.location = "add-passwords.php"; }, 3000);
        });
    }else{
        alertx("Şifreler eşleşmiyor");
    }
}