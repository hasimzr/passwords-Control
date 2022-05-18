            var nameValue;
            function NameLength(){
                var nameLength = $("#appName").val().length;
                if(nameLength > 11){
                    $("#appName").val(nameValue);
                    nameLength = $("#appName").val().length;
                    $("#showNameLength").html(nameLength + "/11");
                }else{
                    nameValue = $("#appName").val()
                    $("#showNameLength").html(nameLength + "/11");
                }
                
            }
            $(document).ready(function () {
                $("#photoGaleryExit").click(function(){
                     $(".photoGalery").hide();
                     $(".app.edit .logo").show();
                });
                $("#img").change(function (e) {
                    $("#imgPreview").css("border", "none"); 
                    $("#h3İmgSelect").show(); 
                    $("#imgPreview").show();
                    $(".uploadİmg").show();
                    $("#imgPreview").attr('src',URL.createObjectURL(e.target.files[0]));
                });
            });
            function imgTriger(){
                $("#img").trigger("click");
            }
            var xyz3 = 0;
            function showPasswordsEdit(x){
                if(xyz3 == 0){
                    xyz3 = 1;
                    $('#eye').removeClass('icon-eye').addClass('icon-eye-off');
                    $('#eye').html("&#xe803;");

                    $("#edit"+x+"Password1").attr('type', 'text');
                    $("#edit"+x+"Password2").attr('type', 'text');
                }else{
                    xyz3 = 0;
                    $('#eye').removeClass('icon-eye-off').addClass('icon-eye');
                    $('#eye').html("&#xe800;");

                    $("#edit"+x+"Password1").attr('type', 'password');
                    $("#edit"+x+"Password2").attr('type', 'password');
                }
            }