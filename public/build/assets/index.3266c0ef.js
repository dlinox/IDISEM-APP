import{u as b,m as p,y as f,c as g,w as d,o as i,a as s,t as a,k as n,h as v,e as o,L as u,d as x,v as y,g as m,r as w,F as k,z as B}from"./app.4d61fec6.js";import{A as N}from"./AdminLayout.6e34655b.js";import{t as j,_ as A}from"./throttle.ca31a630.js";import"./logo.01f735ba.js";import"./_plugin-vue_export-helper.cdc0426e.js";const F={class:"container"},L={class:"card border-0 my-3"},P={class:"card-header border-0 bg-primary d-flex justify-content-between align-items-center"},V={class:"text-white fw-bold"},C=s("div",{class:"card-body"},[s("div",{class:""},[s("h1",{class:"fs-3 mb-0"},"Administradores Registrados")])],-1),D={class:"card border-0 rounded-0"},O={class:"card-header bg-white"},R={class:"row"},S=s("div",{class:"col-6"},null,-1),T={class:"col-6"},q={class:"input-group"},z=s("span",{class:"input-group-text border-0"},[s("i",{class:"bi bi-search"})],-1),E={class:"table table-bordered mb-0"},I=s("thead",null,[s("tr",null,[s("th",{scope:"col"},"#"),s("th",{scope:"col"},"Nombres"),s("th",{scope:"col"},"Correo"),s("th",{scope:"col"},"Registrado"),s("th",{scope:"col"})])],-1),M={scope:"row"},U=s("i",{class:"bi bi-pencil-square"},null,-1),$={class:"card-footer d-flex justify-content-end"},W={__name:"index",props:{admins:Object,filters:Object},setup(e){const c=e,r=b({search:c.filters.search});return p(()=>c.admins.data),f(r,j(l=>{B.Inertia.get("/admin/administradores",{search:l.search},{preserveState:!0})},600),{deep:!0}),(l,h)=>(i(),g(N,null,{default:d(()=>[s("div",F,[s("div",L,[s("div",P,[s("span",V,a(e.admins.length)+" Administradores ",1),n(o(u),{href:"/admin/administradores/create",class:"btn btn-light"},{default:d(()=>[v(" Nuevo ")]),_:1})]),C]),s("div",D,[s("div",O,[s("div",R,[S,s("div",T,[s("div",q,[x(s("input",{type:"text",class:"form-control border-0",placeholder:"Buscar","aria-label":"Buscar","onUpdate:modelValue":h[0]||(h[0]=t=>o(r).search=t)},null,512),[[y,o(r).search]]),z])])])]),s("table",E,[I,s("tbody",null,[(i(!0),m(k,null,w(e.admins.data,(t,_)=>(i(),m("tr",{key:_},[s("th",M,a(t.id),1),s("td",null,a(t.name),1),s("td",null,a(t.email),1),s("td",null,a(t.registrado),1),s("td",null,[n(o(u),{href:"/admin/administradores/"+t.id+"/edit",type:"button",class:"btn btn-icon text-info"},{default:d(()=>[U]),_:2},1032,["href"])])]))),128))])]),s("div",$,[n(A,{currentPage:e.admins.current_page,totalPages:e.admins.last_page,links:e.admins.links},null,8,["currentPage","totalPages","links"])])])])]),_:1}))}};export{W as default};
