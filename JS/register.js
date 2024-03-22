function register() {
    var a;
    if(window.XMLHttpRequest) {
        a = new XMLHttpRequest();
    } else {
        a = new ActiveXObject("Microsoft.XMLHTTP");
    }

    a.onreadystatechange = function() {
        if(a.readyState == 4) {
            if(a.status == 200) {
                alert(a.responseText);
                console.log(a.responseText);
            } else {
                alert("Error: " + a.status);
            }
        }
    }

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var name= document.getElementById("name").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    if(password != confirmPassword) {
        alert("Passwords do not match");
        return;
    }
    var phone = document.getElementById("phone").value;
    var dob= document.getElementById("dob").value;
    var url = "PHP/register.php";
    var val = "email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password) + "&name=" + encodeURIComponent(name) + "&phone=" + encodeURIComponent(phone) + "&dob=" + encodeURIComponent(dob);

    a.open("POST", url, true);
    a.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    a.send(val);    


}