import{u as p,g as t,a as o,d as l,v as i,e,t as d,s as m,h as u,b as _,o as r}from"./app.ac59061b.js";const b=["onSubmit"],f={class:"mb-3"},h=o("label",{for:"i-email",class:"form-label"},"Correo",-1),g={key:0,class:"text-danger"},w={class:"mb-3"},y=o("label",{for:"i-password",class:"form-label"},"Contrase\xF1a",-1),v={key:0,class:"text-danger"},x={class:"mb-3 d-grid gap-2 d-md-flex justify-content-md-end"},k=["disabled"],V={key:0,class:"spinner-border spinner-border-sm me-2",role:"status","aria-hidden":"true"},C={key:1,class:"bi bi-box-arrow-in-right me-2"},D={__name:"LoginFormComponent",setup(B){const s=p({email:null,password:null}),c=()=>{s.post("/user/auth/login")};return(N,a)=>(r(),t("form",{onSubmit:_(c,["prevent"])},[o("div",f,[h,l(o("input",{"onUpdate:modelValue":a[0]||(a[0]=n=>e(s).email=n),type:"email",class:"form-control"},null,512),[[i,e(s).email]]),e(s).errors.email?(r(),t("div",g,[o("small",null,d(e(s).errors.email),1)])):m("",!0)]),o("div",w,[y,l(o("input",{"onUpdate:modelValue":a[1]||(a[1]=n=>e(s).password=n),type:"password",class:"form-control",autocomplete:"on"},null,512),[[i,e(s).password]]),e(s).errors.password?(r(),t("div",v,[o("small",null,d(e(s).errors.password),1)])):m("",!0)]),o("div",x,[o("button",{class:"btn btn-primary",type:"submit",disabled:e(s).processing},[e(s).processing?(r(),t("span",V)):(r(),t("i",C)),u(" Ingresar")],8,k)])],40,b))}};export{D as default};
