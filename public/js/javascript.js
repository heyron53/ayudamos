'use strict'

//eliminamos los puntos generados en los li
let listas = document.getElementsByTagName('li');

for (const li of listas) {
   li.style.listStyle = 'none';
}

//boton MODERADOR/ADMINISTRADOR
let rol = document.getElementById('rol');
let boton = document.getElementById('cambiarBarra');
let enlace = document.getElementById('enlaces');
let valor = document.getElementById('valorBoton');

if(rol.value == "MODER"){
      boton.addEventListener("click",function(){
            if(valor.value == "false"){
                  let hijos = enlace.childNodes;
            
                  let li1 = document.createElement("li");
                  let li2 = document.createElement("li");
                        
                  
                  let a1 = document.createElement("a");
                  let a2 = document.createElement("a");
                  
                  
                  let listas = [li1,li2];
                  let elementoA = [a1,a2];
            
                  for (let i = 0; i < 2; i++) {
                        listas[i].className = "nav-item active";
                        elementoA[i].className = "nav-link text-light";
                        if(i == 0){
                              elementoA[i].href = "listarUsuarios";
                              elementoA[i].textContent = "USUARIOS";     
                        }else if(i == 1){
                              elementoA[i].href = "listarIncidencias";
                              elementoA[i].textContent = "INCIDENCIAS";
            
                        }
                        listas[i].appendChild(elementoA[i]);
                        enlace.appendChild(listas[i]);
                              
                  }
                  valor.value = "true";
                  console.log(enlace.childNodes);
            }else{
                  let hijos = enlace.childNodes;
                     
                  enlace.removeChild(hijos[3]);
                  enlace.removeChild(hijos[3]);
                        
                  valor.value = "false";
                  console.log(enlace.childNodes);
            }
            
            
      });  
}else if(rol.value == "ADMIN"){
      boton.addEventListener("click",function(){
            if(valor.value == "false"){
                  let hijos = enlace.childNodes;

                  let li1 = document.createElement("li");
                  let li2 = document.createElement("li");
                  let li3 = document.createElement("li");
            
                  let a1 = document.createElement("a");
                  let a2 = document.createElement("a");
                  let a3 = document.createElement("a");
            
                  let listas = [li1,li2,li3];
                  let elementoA = [a1,a2,a3];

                  for (let i = 0; i < 3; i++) {
                        listas[i].className = "nav-item active";
                        elementoA[i].className = "nav-link text-light";
                        if(i == 0){
                              elementoA[i].href = "listarUsuarios";
                              elementoA[i].textContent = "USUARIOS";     
                        }else if(i == 1){
                              elementoA[i].href = "listarIncidencias";
                              elementoA[i].textContent = "INCIDENCIAS";
            
                        }else{
                              elementoA[i].href = "listarCursos";
                              elementoA[i].textContent = "MATERIAS";
                        }
                        listas[i].appendChild(elementoA[i]);
                        enlace.appendChild(listas[i]);
                        
                  }
                  valor.value = "true";
            
            }else{
                  let hijos = enlace.childNodes;
            
                  enlace.removeChild(hijos[3]);
                  enlace.removeChild(hijos[3]);
                  enlace.removeChild(hijos[3]);
                  
                  valor.value = "false";
                  console.log(enlace.childNodes);
            }
      });
}

