<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>sjwiq200</title>



    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <style>
        html,
        body {
            height: 100%;
        }

        body {

            -ms-flex-align: center;
            align-items: center;
            padding-top: 10%;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-group {
            padding-top: 10px;
        }

        .dn {
            visibility: hidden;
        }
    </style>
</head>
<body class="text-center">





    <form id="sign-up-form">
        @csrf
        <img class="mb-4" src="{{url('/img/jinro_rogo.jpg')}}" style="width: 150px; height: 150px;">
        <h1 class="h3 mb-3 font-weight-normal">회원가입</h1>


        <div class="form-group row">
            <label for="user-name" class="col-sm-2 col-form-label">이름</label>
            <div class="col-sm-8">
                <input type="text" class="form-control-plaintext" id="user-name" name="user-name" placeholder="이름" autofocus>
            </div>
        </div>


        <div class="form-group row">
            <label for="user-id" class="col-sm-2 col-form-label">이메일 아이디</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="user-id" name="user-id" placeholder="이메일 아이디">
            </div>

            <div class="col-sm-2 dn" id="hidden-messege">
                <input type="text" value="이메일 형식이 아닙니다." readonly>
            </div>

        </div>

        <div class="form-group row">
            <label for="user-id-check" class="col-sm-2 col-form-label">이메일 아이디 체크</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="user-id-check" name="user-id-check" placeholder="이메일 아이디 체크">
            </div>

            <button type="button" class="col-sm-2 btn" onclick="emailAuth()">이메일인증</button>
        </div>

        <div id="email-auth-div" class="form-group row">

        </div>

        <div class="form-group row">
            <label for="user-password" class="col-sm-2 col-form-label">비밀번호</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="user-password" name="user-password" placeholder="비밀번호">
            </div>
        </div>


        <button type="button" class="btn btn-lg btn-primary btn-block" type="submit" onclick="signUp()">회원가입</button>
    </form>







</body>

<script>

    var emailAuthNo = '';

    function signUp() {

        if( emailAuthNo == $('#email-auth-no').val() ) {
            $('#sign-up-form').attr('action',"/user/signUp").attr('method','POST').submit();
        }else{
            alert("인증번호가 틀렸습니다.");
        }

    }

    function emailAuth() {
        var email = $('#user-id').val();
        if( email == $('#user-id-check').val() && email != '') {
            console.log("이메일이 일치합니다.");
            $.ajax({
                url : '/mailAuth/'+email,
                method : 'get',
                dataType : "json",
                success : function(data) {
                    // console.log(data);
                    emailAuthNo = data;
                },
                error : function(e) {
                   console.dir(e);
                }

            });

            var tempAuthTag =
                '            <label for="email-auth-no" class="col-sm-2 col-form-label">이메일 인증번호</label>' +
                '            <div class="col-sm-8">' +
                '                <input type="text" class="form-control" id="email-auth-no" name="email-auth-no" placeholder="이메일 인증번호">' +
                '            </div>';

            $('#email-auth-div').append(tempAuthTag);


        }else{
            alert("이메일이 일치하지 않습니다.");
        }
    }
    function email_check( email ) {

        var regex=/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return (email != '' && email != 'undefined' && regex.test(email));

    }

    $('#user-id').on('keyup', function () {
        if( !email_check($('#user-id').val()) ) {
            console.log("유효한 이메일이 아닙니다.");
            $('#hidden-messege').removeClass('dn');

        }else{
            console.log("유효한 이메일 입니다.");
            $('#hidden-messege').addClass('dn');
        }
    });

</script>
</html>
