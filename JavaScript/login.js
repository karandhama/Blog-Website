$(document).ready(function(){
    $("#login_button").click(function(){
        var email = email_validation();
        var password = password_validation();
        if(!email || !password){
            $("#notice_value").text('Enter Valid Email-Id or Password');
            $("#notice").show();
            return false;
        }
        else {
            $("#notice").hide();
            return true;
        }
    });
    $("#admin_login_button").click(function(){
        var email = admin_email_validation();
        var password = admin_password_validation();
        if(!email || !password){
            $("#notice_value").text('Enter Valid Email-Id or Password');
            $("#notice").show();
            return false;
        }
        else {
            $("#notice").hide();
            return true;
        }
    });
    $("#register_button").click(function(){
        var fname = firstname_validation();
        var lname = lastname_validation();
        var email = email_register_validation();
        var password = password_register_validation();
        var confirm = confirm_validation();
        var mobile = mobile_validation();

        if(!email || !password || !confirm || !lname || !fname || !mobile){
            $("#notice_value1").text('Enter Valid Entities');
            $("#notice1").show();
            return false;
        }
        else {
            $("#notice1").hide();
            return true;
        }
    });
    $("#report").click(function(){
        var fname = admin_firstname_validation();
        var lname = admin_lastname_validation();
        var email = admin_user_email_validation();
        var mob = admin_mobile_validation();

        if(!email || !mob || !lname || !fname){
            $("#notice_value").text('Enter Valid Entities');
            $("#notice").show();
            return false;
        }
        else {
            $("#notice").hide();
            return true;
        }
    });

    $("#email").keyup(function(){
        email_validation();
    });
    $("#password").keyup(function(){
        password_validation();
    });
    $("#admin_email").keyup(function(){
        admin_email_validation();
    });
    $("#admin_password").keyup(function(){
        admin_password_validation();
    });
    $("#first_name").keyup(function(){
        firstname_validation();
    });
    $("#last_name").keyup(function(){
        lastname_validation();
    });
    $("#email_register").keyup(function(){
        email_register_validation();
    });
    $("#password_register").keyup(function(){
        password_register_validation();
    });
    $("#confirm_password").keyup(function(){
        alert('sd1');
        confirm_validation();
    });
    $("#mobile").keyup(function(){
        alert('sd1');
        mobile_validation();
    });
    $("#report_firstname").keyup(function(){
        admin_firstname_validation();
    });
    $("#report_lastname").keyup(function(){
        admin_lastname_validation();
    });
    $("#report_email").keyup(function(){
        admin_user_email_validation();
    });
    $("#report_mob").keyup(function(){
        admin_mobile_validation();
    });

    function email_validation(){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(login_form.email.value)){
            $("#email_validation").show();
            $("#email_validation1").hide();
            return true;
        }
        else{
            $("#email_validation").hide();
            $("#email_validation1").show();
            return false;
        }
    }
    function password_validation(){
        var length = $("#password").val().length;
        if (length < 3){
            $("#password_validation").hide();
            $("#password_validation1").show();
            return false;
        }
        else{
            $("#password_validation").show();
            $("#password_validation1").hide();
            return true;
        }
    }
    function firstname_validation(){
        var length = $("#first_name").val().length;
        if (length < 2){
            $("#fname_validation").hide();
            $("#fname_validation1").show();
            return false;
        }
        else {
            $("#fname_validation").show();
            $("#fname_validation1").hide();
            return true;
        }
    }
    function lastname_validation(){
        var length = $("#last_name").val().length;
        if (length < 2){
            $("#lname_validation").hide();
            $("#lname_validation1").show();
            return false;
        }
        else {
            $("#lname_validation").show();
            $("#lname_validation1").hide();
            return true;
        }
    }
    function email_register_validation(){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(register_form.email_register.value)){
            $("#email_register_validation").show();
            $("#email_register_validation1").hide();
            return true;
        }
        else{
            $("#email_register_validation").hide();
            $("#email_register_validation1").show();
            return false;
        }
    }
    function password_register_validation(){
        var length = $("#password_register").val().length;
        if (length < 8){
            $("#password_register_validation").hide();
            $("#password_register_validation1").show();
            return false;
        }
        else {
            $("#password_register_validation1").hide();
            $("#password_register_validation").show();
            return true;
        }
    }
    function confirm_validation(){
        var value1 = $("#password_register").val();
        var value2 = $("#confirm_password").val();
        var length = $("#confirm_password").val().length;
        if (value1 != value2 || length==0){
            $("#confirm_validation").hide();
            $("#confirm_validation1").show();
            return false;
        }
        else {
            $("#confirm_validation1").hide();
            $("#confirm_validation").show();
            return true;
        }
    }
    function admin_email_validation(){
        if ($("#admin_email").val() == 'Admin'){
            $("#admin_email_validation").show();
            $("#admin_email_validation1").hide();
            return true;
        }
        else{
            $("#admin_email_validation").hide();
            $("#admin_email_validation1").show();
            return false;
        }
    }
    function admin_password_validation(){
        var length = $("#admin_password").val().length;
        if (length < 8){
            $("#admin_password_validation").hide();
            $("#admin_password_validation1").show();
            return false;
        }
        else{
            $("#admin_password_validation").show();
            $("#admin_password_validation1").hide();
            return true;
        }
    }
    function admin_firstname_validation(){
        var length = $("#report_firstname").val().length;
        if (length < 2){
            $("#admin_firstname_validation").hide();
            $("#admin_firstname_validation1").show();
            return false;
        }
        else {
            $("#admin_firstname_validation").show();
            $("#admin_firstname_validation1").hide();
            return true;
        }
    }
    function admin_lastname_validation(){
        var length = $("#report_lastname").val().length;
        if (length < 2){
            $("#admin_lastname_validation").hide();
            $("#admin_lastname_validation1").show();
            return false;
        }
        else {
            $("#admin_lastname_validation").show();
            $("#admin_lastname_validation1").hide();
            return true;
        }
    }
    function admin_user_email_validation(){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(report_form.report_email.value)){
            $("#admin_user_email_validation").show();
            $("#admin_user_email_validation1").hide();
            return true;
        }
        else{
            $("#admin_user_email_validation").hide();
            $("#admin_user_email_validation1").show();
            return false;
        }
    }
    function admin_mobile_validation(){
        if (/^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/.test(report_form.report_mob.value)){
            $("#admin_mobile_validation").show();
            $("#admin_mobile_validation1").hide();
            return true;
        }
        else{
            $("#admin_mobile_validation").hide();
            $("#admin_mobile_validation1").show();
            return false;
        }
    }
    function mobile_validation(){
        if (/^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/.test(register_form.mobile.value)){
            $("#mobile_validation").show();
            $("#mobile_validation1").hide();
            return true;
        }
        else{
            $("#mobile_validation").hide();
            $("#mobile_validation1").show();
            return false;
        }
    }
});