import{q as V,m as C,g as d,a as e,h as m,k as y,w as x,F as p,o as i,r as g,t as k,s as w,d as c,v as r,e as I}from"./app.ac59061b.js";import{_ as U}from"./ModalComponent.180a4f1c.js";const N=e("i",{class:"bi bi-card-checklist me-2"},null,-1),A=e("div",{class:"fw-bold"},"A\xD1ADIR CALIFICACIONES",-1),j=e("hr",null,null,-1),F={class:"card-header d-flex justify-content-between align-items-center border-0"},$={class:"fw-bold"},B=["onClick"],D=e("i",{class:"bi bi-dash-square-dotted"},null,-1),E=[D],O={class:"card-body"},q={class:"mb-3"},L=["onUpdate:modelValue"],M={class:"mb-3"},S=["onUpdate:modelValue"],T={class:"row mb-3"},R={class:"col"},z=["onUpdate:modelValue"],G={class:"col"},H=["onUpdate:modelValue"],J={class:"mb-1"},K=["onInput"],P={class:"d-grid gap-2 d-md-flex justify-content-md-end"},Q=e("i",{class:"bi bi-plus me-2"},null,-1),Y={__name:"CalificacionEncuestaComponent",props:{modelValue:Array},emits:["update:modelValue"],setup(_,{emit:b}){const h=_,l=V(!1),u=C({get:()=>h.modelValue,set:n=>b("update:modelValue",n)},{deep:!0}),v=()=>{u.value.push({detalle:null,mensaje:null,img:null,min:null,max:null})},f=n=>{u.value.splice(n,1)};return(n,s)=>(i(),d(p,null,[e("button",{type:"button",class:"btn btn-outline-dark ms-3",onClick:s[0]||(s[0]=t=>l.value=!l.value)},[N,m(" A\xF1adir Calificaciones ")]),y(U,{modelValue:l.value,"onUpdate:modelValue":s[2]||(s[2]=t=>l.value=t)},{content:x(()=>[A,j,(i(!0),d(p,null,g(I(u),(t,a)=>(i(),d("div",{key:a,class:"card rounded mb-3 shadow-sm border-0"},[e("div",F,[e("span",$,"Calificaci\xF3n "+k(a+1),1),a>0?(i(),d("button",{key:0,type:"button",class:"btn btn-sm btn-outline-danger",onClick:o=>f(a)},E,8,B)):w("",!0)]),e("div",O,[e("div",q,[c(e("input",{"onUpdate:modelValue":o=>t.detalle=o,type:"text",class:"form-control",id:"exampleFormControlInput1",placeholder:"Nivel de felicidad alto"},null,8,L),[[r,t.detalle]])]),e("div",M,[c(e("textarea",{"onUpdate:modelValue":o=>t.mensaje=o,class:"form-control",cols:"30",rows:"2",placeholder:"Mensaje"},null,8,S),[[r,t.mensaje]])]),e("div",T,[e("div",R,[c(e("input",{"onUpdate:modelValue":o=>t.min=o,type:"number",class:"form-control",id:"exampleFormControlInput1",placeholder:"Nivel de felicidad alto"},null,8,z),[[r,t.min]])]),e("div",G,[c(e("input",{"onUpdate:modelValue":o=>t.max=o,type:"number",class:"form-control",id:"exampleFormControlInput1",placeholder:"Nivel de felicidad alto"},null,8,H),[[r,t.max]])])]),e("div",J,[e("input",{class:"form-control",type:"file",onInput:o=>t.img=o.target.files[0]},null,40,K)])])]))),128)),e("div",P,[e("button",{class:"btn btn-text text-danger order-2 order-md-1",type:"button",onClick:s[1]||(s[1]=t=>l.value=!l.value)}," Cerrar"),e("button",{class:"btn btn-primary order-1 order-md-2",type:"button",onClick:v},[Q,m(" A\xF1adir ")])])]),_:1},8,["modelValue"])],64))}};export{Y as default};
