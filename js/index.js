            var xyz;
        
            function detail(x){
                var detail = $("#detail"+x);
                var down = $("#down"+x);
                var up = $("#up"+x);
                editClose();

                if(xyz == x){
                    xyz = 0;
                    detail.animate({"height": "66px"});
                    down.css("display", "block");
                    up.css("display", "none");
                }else{
                    for(var i=1; i<=passwordNumberY; i++){
                        if($("#detail"+i).height() == 260){
                            $("#detail"+i).animate({"height": "66px"});
                            $("#down"+i).css("display", "block");
                            $("#up"+i).css("display", "none");

                            $("#password"+i).attr('type', 'password');
                        }
                    }

                    xyz2 = 0;
                    detail.animate({"height": "260px"});
                    down.css({"display": "none"});
                    up.css({"display": "block"});

                    xyz = x;  
                }  
            }


            var xyz2 = 0;
            function showPasswords(x){
                if(xyz2 == 0){
                    xyz2 = 1;
                    $('#eye'+x).removeClass('icon-eye').addClass('icon-eye-off');
                    $('#eye'+x).html("&#xe803;");
                    $("#password"+x).attr('type', 'text');
                }else{
                    xyz2 = 0;
                    $('#eye'+x).removeClass('icon-eye-off').addClass('icon-eye');
                    $('#eye'+x).html("&#xe800;");
                    $("#password"+x).attr('type', 'password');
                }
            }
            var xyz3 = 0;
            function showPasswordsEdit(x){
                if(xyz3 == 0){
                    xyz3 = 1;
                    $('#eyeE'+x).removeClass('icon-eye').addClass('icon-eye-off');
                    $('#eyeE'+x).html("&#xe803;");

                    $("#edit"+x+"Password1").attr('type', 'text');
                    $("#edit"+x+"Password2").attr('type', 'text');
                }else{
                    xyz3 = 0;
                    $('#eyeE'+x).removeClass('icon-eye-off').addClass('icon-eye');
                    $('#eyeE'+x).html("&#xe800;");

                    $("#edit"+x+"Password1").attr('type', 'password');
                    $("#edit"+x+"Password2").attr('type', 'password');
                }
            }


           
            function copy(x){
                alertx("Şifre Kopyalandı");
                
                $("#password"+x).attr('type', 'text');
                $("#password"+x).select();
		        document.execCommand("copy");
                $("#password"+x).attr('type', 'password');
            }
            function edit(x){
                editClose();
                $("#editNumber").val(x);
                $("#edit"+x).css("display", "block");
                $("#detail"+x).css("display", "none");
            }
            function editClose(){
                for(var i=1; i<=passwordNumberY; i++){
                    $("#edit"+i).css("display", "none");
                    $("#detail"+i).css("display", "block");
                }
            }
            function selectPhoto(x){
                $("#photoGalery"+x).show();
                $(".app.edit .logo").hide();
                $(".smallNameLengh").hide();
            }
            function photoGaleryExit(x){
                $("#photoGalery"+x).hide();
                $(".app.edit .logo").show();
                $(".smallNameLengh").show();
            }
            function deletePassword(x){
                $.post("db/action.php", {"passwordDeleteİd": x}, function(data){
                    setTimeout(function() { window.location = "index.php"; }, 500);
                });
            }


            function imgTriger(x){
                $("#img"+x).trigger("click");
            }
            var nameValue;
            function NameLength(x){
                var nameLength = $("#editname"+x).val().length;
                if(nameLength > 11){
                    $("#editname"+x).val(nameValue);
                    nameLength = $("#editname"+x).val().length;
                    $("#showNameLength"+x).html(nameLength + "/11");
                }else{
                    nameValue = $("#editname"+x).val()
                    $("#showNameLength"+x).html(nameLength + "/11");
                }   
            }








            function selectAppİcon(x, y){
                $.post("db/generalAction.php", {"totalİcon": x, "id": y}, function(e){
                    $("#galery"+x).html(e);
                });
                var xhr2 = $("#logoFileNumberid"+y).val();
                $("#editLogo"+x).attr("src", xhr2);
                $("#logoValue"+x).val(xhr2);
            }






            function changeSave(x, Y){
                var editname  = $("#editname"+x).val();
                var logoValue = $("#logoValue"+Y).val();
                var password1 = $("#edit"+x+"Password1").val();
                var password2 = $("#edit"+x+"Password2").val();


                if (logoValue == ""){
                    logoValue = "logo/0.jpg"
                }

                if(password1 == password2 & editname.length <= 11){
                    $.post("db/generalAction.php", {
                        "id": x,
                        "editname": editname,
                        "logoValue": logoValue,
                        "password1": password1,
                        "password2": password2,
                    }, function(e){
                        alertx(e);
                        setTimeout(function() { window.location = "index.php"; }, 3000);
                    });
                }
            }