const signUpButton=document.getElementById('signUpButton'); //mengambil elemen dengan id signUpButton
const signInButton=document.getElementById('signInButton'); //mengambil elemen dengan id signInButton
const signInForm=document.getElementById('signIn'); //mengambil elemen dengan id signIn
const signUpForm=document.getElementById('signup'); //mengambil elemen dengan id signup

signUpButton.addEventListener('click',function(){ //ketika tombol signUpButton diklik
    signInForm.style.display="none"; //menyembunyikan elemen signIn
    signUpForm.style.display="block";//menampilkan elemen signup
})
signInButton.addEventListener('click', function(){//ketika tombol signInButton diklik
    signInForm.style.display="block";//menampilkan elemen signIn
    signUpForm.style.display="none"; //menyembunyikan elemen signup
})
