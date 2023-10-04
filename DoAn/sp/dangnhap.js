function check(){
    var a = document.getElementById('taikhoan').value;
    var b = document.getElementById('matkhau').value;

    if(a.length == 0 && b.length == 0){
        document.getElementById("main").style.height = "90vh";
        document.getElementById("form").style.height = "70vh";
        
    }else if(a.length >= 50 && b.length >= 50){
        document.getElementById("main").style.height = "90vh";
        document.getElementById("form").style.height = "70vh";
        
    }else{
        document.getElementById("main").style.height = "70vh";
        document.getElementById("form").style.height = "50vh";
    }
    checktaikhoan();
    checkmatkhau();
    
    
}
function checktaikhoan(){
    var a = document.getElementById('taikhoan').value;
    var b = document.getElementById('matkhau').value;

    if(a.length == 0){                        //kiểm tra tài khoản
        document.getElementById("checktaikhoan").style.display = "block";
        document.getElementById("checktaikhoan").innerHTML = " Tài khoản không được để trống !";
        document.getElementById("checktaikhoan").style.color = "red";
        
     }else if(a.length >= 50 ){
         document.getElementById("checktaikhoan").style.display = "block";
         document.getElementById("checktaikhoan").innerHTML = " Tên tài khoản không được dài quá 50 kí tự !";
         document.getElementById("checktaikhoan").style.color = "red";
         
     }else{
         document.getElementById("checktaikhoan").style.display = "none";
         
     }
}
function checkmatkhau(){
    var a = document.getElementById('taikhoan').value;
    var b = document.getElementById('matkhau').value;
    

    if(b.length == 0){                         //kiểm tra mật khẩu
        document.getElementById("checkmatkhau").style.display = "block";
        document.getElementById("checkmatkhau").innerHTML = " Mật khẩu không được để trống !";
        document.getElementById("checkmatkhau").style.color = "red";
        
     }else if(b.length >= 50 ){
         document.getElementById("checkmatkhau").style.display = "block";
         document.getElementById("checkmatkhau").innerHTML = " Mật khẩu không được dài quá 50 kí tự !";
         document.getElementById("checkmatkhau").style.color = "red";
         
     }else{
         document.getElementById("checkmatkhau").style.display = "none";
         
     }
    
}
