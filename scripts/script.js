function registration(){
    let name=document.getElementById('name').value;
    let surname=document.getElementById('surname').value;
    let e_mail=document.getElementById('e_mail').value;
    let password_1=document.getElementById('password_1').value;
    let password_2=document.getElementById('password_2').value;

    if (password_1!=password_2){
        let outputObject=document.getElementsByClassName('errorsOutput');
        outputObject[0].innerText="Пароли не свопадают!"; 
        return;  
    }

    if(password_1.length<6){
        let outputObject=document.getElementsByClassName('errorsOutput');
        outputObject[0].innerText="Пароль слишком короткий!"; 
        return;  
    }

    let xhr=new XMLHttpRequest();
    xhr.open('POST', config.site_directory+"api/signup", true);
    let params="name=" + name+ "&surname=" + surname + "&e_mail=" + e_mail + "&password=" + password_1;
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(encodeURI(params));
    xhr.onreadystatechange=function(){
        if (this.readyState==4){
            if (this.status==201){
                document.location=config.site_directory+'login.php';
            }else{
                let response=JSON.parse(this.responseText);
                let outPut="";
                let outputObject=document.getElementsByClassName('errorsOutput');
                if(response.name==undefined){
                    response.name="";
                }
                if(response.surname==undefined){
                    response.surname="";
                }
                if(response.e_mail==undefined){
                    response.e_mail="";
                }
                if(response.password==undefined){
                    response.password="";
                }
                outPut+=response.name+"<br>";
                outPut+=response.surname+"<br>";
                outPut+=response.e_mail+"<br>";
                outPut+=response.password;
                outputObject[0].innerHTML=outPut; 
                return;  
            }
        }
    }
}