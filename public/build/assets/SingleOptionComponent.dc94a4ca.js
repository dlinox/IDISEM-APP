import{m as f,g as a,F as u,r as v,e as c,a as e,o as d,d as r,v as p}from"./app.c348ad52.js";const y=["onUpdate:modelValue"],V=["placeholder","onUpdate:modelValue"],g=["onClick","disabled"],k=e("i",{class:"bi bi-dash-square-dotted"},null,-1),x=[k],B=e("div",null,null,-1),C=e("i",{class:"bi bi-plus-square-dotted"},null,-1),O=[C],q={__name:"SingleOptionComponent",props:{modelValue:Array,otros:{type:Boolean,default:!0}},emits:["update:modelValue"],setup(i,{emit:m}){const _=i,t=f({get:()=>_.modelValue,set:o=>m("update:modelValue",o)},{deep:!0}),b=()=>{t.value.push({ponderado:0,detalle:null})},h=o=>{t.value.splice(o,1)};return(o,U)=>(d(),a(u,null,[(d(!0),a(u,null,v(c(t),(l,n)=>(d(),a("div",{key:n,class:"d-flex mb-2"},[r(e("input",{type:"number",class:"form-control w-25 me-2","onUpdate:modelValue":s=>l.ponderado=s},null,8,y),[[p,l.ponderado]]),r(e("input",{type:"text",class:"form-control",placeholder:"Opci\xF3n "+(n+1),"onUpdate:modelValue":s=>l.detalle=s},null,8,V),[[p,l.detalle]]),e("button",{type:"button",class:"btn btn-light ms-2",onClick:s=>h(n),disabled:c(t).length===1},x,8,g)]))),128)),e("div",{class:"d-flex justify-content-between mb-2"},[B,e("button",{type:"button",class:"btn btn-primary ms-2",onClick:b},O)])],64))}};export{q as default};