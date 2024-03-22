function profile() {
    console.log("Clicked");
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
                alert("Error: " + a);
            }
        }
    }

    var email =document.getElementById("email").value;
    var name= document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var dob= document.getElementById("dob").value;
    var url = "PHP/profile.php";
    var val = "email=" + encodeURIComponent(email) + "&name=" + encodeURIComponent(name) + "&phone=" + encodeURIComponent(phone) + "&dob=" + encodeURIComponent(dob);

    a.open("POST", url, true);
    a.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    a.send(val);    
    
}