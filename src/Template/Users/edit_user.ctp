<?php $readuser =  $this->request->session()->read('Auth.User') ?>

<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

            <br>
            <p class=" text-info">
                <?php
                $date = new DateTime('NOW', new DateTimeZone('Asia/Ho_Chi_Minh'));
                echo $date->format('d/m/Y H:i:s');
                ?>
            </p> 
        </div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" style="text-align: center;" >
            <form method="post" id="myForm"> 

                <div class="panel panel-info">
                    <form method="post" id="myForm">
                        <div class="panel-heading">
                            <h3 class="panel-title">Cập nhật thông tin </h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/cakecosy/webroot/img/user_logo.png" class="img-circle img-responsive"> </div>

                                <div class=" col-md-9 col-lg-9 "> 
                                    <table class="table table-user-information">
                                        <tbody>

                                            <tr>
                                                <td>Tên người dùng : </td>
                                                <td><input type="text" name="username" value="<?php echo $user->username ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Họ và tên : </td>
                                                <td><input type="text" name="name" value="<?php echo $user->name ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ email:</td>
                                                <td><input type="text" name="email" id="email1" value="<?php echo $user->email ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Mật khẩu:</td>
                                                <td><input type="password" name="password" id="password"  value="******" >
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Nhập lại mật khẩu:</td>
                                                <td><input type="password" name="password2"   value="******" ></td>
                                            </tr>
                                            <tr>
                                                <td>Ngày sinh</td>
                                                <td><input type="date" name="birthdate"  value="<?php echo $user->birthdate->format('Y-m-d') ?>"></td>
                                            </tr>

                                            <tr>
                                                <tr>
                                                    <td>Số điện thoại</td>
                                                    <td><input type="text" name="phone"   id="phone" value="<?php echo $user->phone ?>"></td>

                                                </tr>
                                                <tr>
                                                    <td>Cập nhật ngày</td>
                                                    <td><input type="date" name="updated_at"  value="<?php echo date('Y-m-d'); ?>"></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="text-align: center;">
                                <?php if($readuser) {?>
                                <button data-original-title="Logout" data-toggle="tooltip" type="button " class="btn btn-sm btn-warning"><?= $this->Html->link("Logout",['action' => 'logout']) ?></button> 
                                <?php } ?>  
                                <button data-original-title="addproduct" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Lưu Thông Tin</i></button>   
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>


    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        jQuery.validator.addMethod("matchPass", function(value) {

            var re = /^[a-zA-Z0-9!@#$%^&/()._+]*$/;
            if (re.test(document.getElementById("password").value)) {
                return true;
            } else {   
                return false;
            }
        }, "Mật khẩu là những ký tự như a-zA-Z0-9!@#$%^&*()_+");

        jQuery.validator.addMethod("matchemail", function(value) {

            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(document.getElementById("email1").value)) {

                return false;
            }else {
                return true;
            }

        }, "Nhập 1 địa chỉ hợp lệ .tranvantruong.jvb@gmail.com");

        jQuery.validator.addMethod("matchphone", function(value) {
            var filter =  /^([0/+84])+([0-9]{9})+$/;
            if (!filter.test(document.getElementById("phone").value)) {
                return false;
            }else {
                return true;
            }

        }, "Số điện thoại có 10 số .\n example: 0978172195");

        $(document).ready(function() {

//Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
    $("#myForm").validate(
        {
            rules: {
                name: "required",
                username: "required",
                password:{
                    required: true,
                    minlength :6,
                    matchPass : "#password",

                } ,
                password2: {
                    required: true,
                    minlength: 6,

                    equalTo: "#password",
                },
                email: {
                    required: true,
                    matchemail : '#email1',
                },
                phone:{
                    required: true,
                    minlength: 10,
                    matchphone: '#phone',

                } ,
                birthdate:{
                    required: true,
                },

            },
            messages: {
                name: "Nhập tên của bạn",
                username: "Nhập tên người dùng",

                password:{
                    required: "Nhập mật khẩu chứa các ký tự A-Z a-z 0-9 @ * _ - . ! ",
                    minlength :"Mật khẩu có độ dài từ 6 ký tự",
                    equalTo: "Nhập mật khẩu để thay đổi ",
        // equalTo : "Please enter password valid A-Z a-z 0-9 @ * _ - . ! ",
            }, 
            password2: {
                required: "Nhập lại mật khẩu",
                minlength :"Mật khẩu có độ dài từ 6 ký tự",
                equalTo: "Mật khẩu không khớp với mật khẩu trên ",
            },
            email: {
                required: "Nhập 1 địa chỉ email hợp lệ ", 
            },
            phone:{
                required: "Hãy cung cấp cho chúng tôi số điện thoại của bạn",
                minlength:"Số điện thoại không bao gồm chữ và có độ dài 10 bắt đầu 0 / +84.\n example: 0978172195",

            },
            birthdate: {
                required: "Chọn ngày sinh của bạn",
            },

            }

            }); 

        });   

</script>
