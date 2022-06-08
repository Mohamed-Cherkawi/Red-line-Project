let state = false ;

        let eyeCp = document.createElement('i');
        eyeCp.classList.add('bi','bi-eye','passw-eye');
          eyeCp.setAttribute("onclick","toogleEyePassword()");
        let eyeMaskCp = document.createElement('i');
        eyeMaskCp.classList.add('bi','bi-eye-slash','passw-mask-eye');
        eyeMaskCp.setAttribute("onclick","toogleEyePassword()");

        function toogleEyePassword(){
            if(state){
                document.getElementById('Password').setAttribute("type","password");
                document.getElementById('cPassword').setAttribute("type","password");
                 document.querySelector('.passw-eye').remove();
                 document.getElementById('CopasswordContaSignUp').append(eyeMaskCp);
                state = false ;
            }else{
                document.getElementById('Password').setAttribute("type","text");
                document.getElementById('cPassword').setAttribute("type","text");
                document.querySelector('.passw-mask-eye').remove();
                document.getElementById('CopasswordContaSignUp').append(eyeCp);
                state = true;
            }
        }