let fname = document.getElementById("fname");
let lname = document.getElementById("lname");
let description = document.getElementById("description");
let type = document.getElementById("type");
let btn = document.getElementById("submit");
let add = document.getElementById("added-elements");
let d = document.querySelector(".div");

// donation

btn.addEventListener("click", ()=>{
    let v1=fname.value;
    let v2=lname.value;
    let v3=type.value;
    let v4=description.value;
    
    let p1 =document.createElement("p");
    let p2 =document.createElement("p");
    let p3 =document.createElement("p");
    let p4 =document.createElement("p");

    

    p1.textContent="First name: " + v1;
    p2.textContent="Last  name: " + v2;
    p3.textContent="Request type name: " + v3;
    p4.textContent="Description: " + v4;

    d.append(p1,p2,p3,p4);
    d.classList.add("added");

    
    
    
});
