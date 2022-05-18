            var xyz;
            var y = 4;
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
                    for(var i=1; i<=y; i++){
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
                $("#alert").animate({"height": "50px"}, 800);
                setTimeout(function(){
                    $("#alert").animate({"height": "0px"}, 800);
                }, 1500);
                
                $("#password"+x).attr('type', 'text');
                $("#password"+x).select();
		        document.execCommand("copy");
                $("#password"+x).attr('type', 'password');
            }
            function edit(x){
                editClose();
                $("#edit"+x).css("display", "block");
                $("#detail"+x).css("display", "none");
            }
            function editClose(){
                for(var i=1; i<=y; i++){
                    $("#edit"+i).css("display", "none");
                    $("#detail"+i).css("display", "block");
                }
            }
            function selectPhoto(){
                $(".photoGalery").show();
                $(".app.edit .logo").hide();
            }


            function imgTriger(){
                $("#img").trigger("click");
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