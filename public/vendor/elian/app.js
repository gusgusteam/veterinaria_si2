const boton= document.getElementById('ingresar');
const form= document.getElementById('form');
const usuario=document.getElementById('usuario');
const contraseña=document.getElementById('contraseña');

form.addEventListener('submit', e=>{
  e.preventDefault();
  if(usuario.value==='marco' && contraseña.value==='123'){
    window.location.href="file:///D:/Descargas/sistema%20de%20inf%202/proyecto/Sliding-Sign-In-Sign-Up-Form-master/pantalla_principal.html";
    
  }
  else if(usuario.value!='marco'){
    alert('usuario incorrecto');
  }
  else{
    alert('contraseña incorrecta');
  }
})


