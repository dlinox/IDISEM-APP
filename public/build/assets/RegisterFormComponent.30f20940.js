import{u as h,q as m,g as r,a as e,d as y,v as x,e as n,t as _,s as k,h as d,b as S,k as b,w as p,F as V,o as i}from"./app.4d61fec6.js";import{_ as v}from"./ModalComponent.f2557f65.js";import w from"./FormRegisterEstudianteComponent.7273105a.js";const C=["onSubmit"],N={class:"mt-2 mb-4 mx-4 text-center"},$=e("label",{for:"code",class:"form-label"},"Ingrese su codigo de matricula",-1),E={key:0,class:"text-danger"},j={class:"mb-3 d-grid gap-2 d-md-flex justify-content-center"},B=["disabled"],F={key:0,class:"spinner-border spinner-border-sm me-2",role:"status","aria-hidden":"true"},R={key:1,class:"bi bi-search me-2"},T={class:"mb-3 d-grid gap-2 d-md-flex justify-content-center"},U=e("i",{class:"bi bi-check-all"},null,-1),D=e("div",{class:"fw-bold"},"Registrarme",-1),O=e("hr",null,null,-1),I=e("div",{class:"alert alert-warning"}," Solo si su codigo de matricula no se encuentra registrado ",-1),M=e("div",{class:"fw-bold"},"ESTUDIANTE",-1),q=e("hr",null,null,-1),A=e("div",{class:"alert alert-primary",role:"alert"}," Se enviara un correo con los datos de acceso ",-1),z={class:"fw-bold"},G=e("hr",null,null,-1),H={class:"d-flex justify-content-between"},J=["disabled"],K={key:0,class:"spinner-border spinner-border-sm me-2",role:"status","aria-hidden":"true"},L={key:1,class:"bi bi-envelope-check me-2"},Y={__name:"RegisterFormComponent",props:{estudiante:Object},setup(P){const t=h({code:""}),a=m(!1),l=m(!1),c=m({}),f=()=>{t.post("/user/auth/val-code",{preserveScroll:!0,onSuccess:u=>{c.value=u.props.flash.data,l.value=!0}})},g=()=>{t.post("/user/auth/send-email",{preserveScroll:!0,onSuccess:u=>{l.value=!1}})};return(u,s)=>(i(),r(V,null,[e("form",{onSubmit:S(f,["prevent"])},[e("div",N,[$,y(e("input",{"onUpdate:modelValue":s[0]||(s[0]=o=>n(t).code=o),type:"text",class:"form-control w-75 mx-auto",id:"code"},null,512),[[x,n(t).code]]),n(t).errors.code?(i(),r("div",E,[e("small",null,_(n(t).errors.code),1)])):k("",!0)]),e("div",j,[e("button",{class:"btn btn-primary",type:"submit",disabled:n(t).processing},[n(t).processing?(i(),r("span",F)):(i(),r("i",R)),d(" Buscar ")],8,B)]),e("div",T,[e("button",{class:"btn btn-dark",type:"button",onClick:s[1]||(s[1]=o=>a.value=!a.value)},[U,d(" Registrarme ")])])],40,C),b(v,{modelValue:a.value,"onUpdate:modelValue":s[4]||(s[4]=o=>a.value=o)},{content:p(()=>[D,O,I,b(w,{onOnCancel:s[2]||(s[2]=o=>a.value=!1),onOnSubmit:s[3]||(s[3]=o=>a.value=!1)})]),_:1},8,["modelValue"]),b(v,{modelValue:l.value,"onUpdate:modelValue":s[6]||(s[6]=o=>l.value=o)},{content:p(()=>[M,q,A,e("div",z,"Correo: "+_(c.value.correo),1),d(" "+_(c.value.nombre),1)]),footer:p(()=>[G,e("div",H,[e("button",{class:"btn btn-text text-danger",onClick:s[5]||(s[5]=o=>l.value=!l.value)}," No soy yo "),e("button",{class:"btn btn-primary",onClick:g,disabled:n(t).processing},[n(t).processing?(i(),r("span",K)):(i(),r("i",L)),d(" Enviar correo ")],8,J)])]),_:1},8,["modelValue"])],64))}};export{Y as default};
