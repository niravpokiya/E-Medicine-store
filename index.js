let inputfield = document.getElementsByClassName('input_pass')[0];
let formElement = document.getElementById('form');
let warning = document.getElementById('warning');

function check() {
    let select = document.getElementById('tablename').value;
    console.log(select);
    if (select == "Admin") {
        document.getElementById('form').action = "admin_session.php";
        document.getElementById('form').submit();
    }
    else if (select == "Employee") {
        document.getElementById('form').action = "employee.php";
        document.getElementById('form').submit();
    }
}

let select1 = document.getElementById('tablename')
select1.onchange = function(){
    console.log(select1.value);
    if(select1.value == "Select category")
    {
        document.getElementById('Button').style.display = "none"
        document.getElementById('signin').style.display = "none"
        document.getElementById('signup').style.display = "none"
    }
    if(select1.value != "Customer")
    {
        inputfield.style.display = "block"
        document.getElementById('Button').style.display = "block"
        document.getElementById('signin').style.display = "none"
        document.getElementById('signup').style.display = "none"
    }
    else{
        inputfield.style.display = "none"
        document.getElementById('Button').style.display = "none"
        document.getElementById('signin').style.display = "inline   "
        document.getElementById('signup').style.display = "inline"
    }
}
function render()
{
    formElement.action = "signup_index.php";
    formElement.submit()
}
function Login()
{
    formElement.action = "login_index.php"
    formElement.submit()
}