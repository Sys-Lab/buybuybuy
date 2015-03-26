
    $(document).ready(function() {
           if($.cookies.get('userName') != '' && $.cookies.get('userName') != null && $.cookies.get('userName') != undefined){
               $("#login").html($.cookies.get('userName'));
           }
        $('.theme-login').click(function(){
            $('.theme-popover-mask').fadeIn(100);
            $('.theme-popover').slideDown(200);
        });
        $('.theme-poptit .close').click(function(){
            $('.theme-popover-mask').fadeOut(100);
            $('.theme-popover').slideUp(200);
        });

        $('#submit').click(function(){
            $.get("login.php",{name:$("#log").val(),ps:$("#psw").val()}, function (date) {
                $('#nameError').fadeOut(10);
                $('#nameSpace').fadeOut(10);
                $('#pswSpace').fadeOut(10);
                $('#pswError').fadeOut(10);
                if(date == '1'){//用户名为空
                    $('#nameSpace').fadeIn(10);
                }else if(date == '2'){//密码为空
                    $('#pswSpace').fadeIn(10);
                }else if (date == '3'){//无用户名
                    $('#nameError').fadeIn(10);
                }else if(date == '4'){
                    $('#nameError').fadeOut(10);
                    $('#nameSpace').fadeOut(10);
                    $('#pswSpace').fadeOut(10);
                    $('#pswError').fadeOut(10);
                    $('.theme-popover-mask').fadeOut(100);
                    $('.theme-popover').slideUp(200);
                    if($.cookies.get('userName') != '' && $.cookies.get('userName') != null && $.cookies.get('userName') != undefined){
                        $("#login").html($.cookies.get('userName'));
                    }
                }else if(date == '5'){
                    alert("yulandfadf");
                    $('#pswError').fadeIn(10);
                }
            })
        });
})
