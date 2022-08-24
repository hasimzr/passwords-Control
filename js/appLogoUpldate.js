$(document).on("submit", "form", function (e) {
    for(var i=1; i<=passwordNumberY; i++){
      
      var data = new FormData(this);
      if($('#img'+i).val().length != 0){
        var datai = i; 
        var load2width = 0;
        $.ajax({
          url: "db/fileUpload.php",
          data: data,
          contentType: false,
          processData: false,
          type: "post",
          success: function (xhr) {
            if(xhr == "Dosya daha önceden yüklenmiş" || xhr == "Dosya boyutu sınırı" || xhr == "Desteklenmeyen dosya formatı." || xhr == "Hata oluştu" || xhr == "Lütfen bir dosya seçin"){
              alertx(xhr);
            }else{
              $("#load1"+datai).show();
              $("#uploadİmg"+datai).hide();
              var loader = setInterval(function(){
                load2width++;
                $("#load2"+datai).css("width", load2width+"%");
                $("#load2"+datai).html(load2width+"%");
                if(load2width == 99){
                    clearInterval(loader);
                    
                }
              }, 10);
              
              var logoFileNumber = parseInt($("#logoFileNumber").val());
              logoFileNumber += 1;
              $("#logoFileNumber").val(logoFileNumber);

              var loader2 = setInterval(function(){
                var xhr1 = xhr.substr(0,24);
                var xhr2 = xhr.substr(25);
                  if(load2width == 99 && xhr1 == "Dosya başarıyla yüklendi"){
                      load2width++;
                      $("#load2"+datai).css("width", load2width+"%");
                      $("#load2"+datai).html(load2width+"%");
                      if(load2width == 100){
                        $(".galery").append("<li id=logoFileNumber"+logoFileNumber+"'><img src='logo/"+xhr2+"'></li>");
                        $.post("db/generalAction.php", {"totalİconx": datai, "id": logoFileNumber, "fileName": xhr2}, function(e){
                            $("#galery"+datai).html(e);
                        });



                        $("#logoValue"+datai).val(xhr2);
                        $("#editLogo"+datai).attr("src", "logo/"+xhr2);
                        $("#load2"+datai).css("width", "100%");
                        $("#load2"+datai).css("font-size", "17px");
                        $("#load2"+datai).html("Resim Başarı ile Yüklendi");
                        clearInterval(loader2);
                      }
                  }
              }, 100);
            }  
        }
        });
        $('#img'+i).val("");
      }
    }  
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