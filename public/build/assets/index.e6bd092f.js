import{u as h,m as p,y as b,c as g,w as m,o as t,a as s,t as c,d as y,v as f,e as l,g as a,r as v,F as x,k,z as w}from"./app.e69348ce.js";import{A as B}from"./AdminLayout.9a43a6f3.js";import{t as F,_ as A}from"./throttle.c1aa4350.js";import"./logo.01f735ba.js";import"./_plugin-vue_export-helper.cdc0426e.js";const C={class:"container"},P={class:"card border-0 my-3"},j=s("div",{class:"card-header border-0 bg-primary"},null,-1),D={class:"card-body"},N={class:""},U={class:"text-secondary fw-bold mb-1"},V=s("h1",{class:"fs-3 mb-0"}," Usuarios Registrados ",-1),E={class:"card border-0 rounded-0"},I={class:"card-header bg-white"},L={class:"row"},O=s("div",{class:"col-6"},null,-1),S={class:"col-6"},T={class:"input-group"},z=s("span",{class:"input-group-text border-0"},[s("i",{class:"bi bi-search"})],-1),G={class:"table table-bordered mb-0"},M=s("thead",null,[s("tr",null,[s("th",{scope:"col"},"#"),s("th",{scope:"col"},"Nombres"),s("th",{scope:"col"},"Correo"),s("th",{scope:"col"},"TyC"),s("th",{scope:"col"},"Inf. General"),s("th",{scope:"col"},"Estado")])],-1),R={scope:"row"},$={key:0,class:"badge text-bg-success"},q={key:1,class:"badge text-bg-danger"},H={key:0,class:"badge text-bg-success"},J={key:1,class:"badge text-bg-danger"},K={key:0,class:"badge text-bg-primary"},Q={key:1,class:"badge text-bg-danger"},W={class:"card-footer d-flex justify-content-end"},es={__name:"index",props:{usuarios:Object,filters:Object},setup(o){const d=o,r=h({search:d.filters.search}),u=p(()=>d.usuarios.data);return b(r,F(n=>{w.Inertia.get("/admin/usuarios",{search:n.search},{preserveState:!0})},600),{deep:!0}),(n,i)=>(t(),g(B,null,{default:m(()=>[s("div",C,[s("div",P,[j,s("div",D,[s("div",N,[s("span",U,c(o.usuarios.length)+" Usuarios ",1),V])])]),s("div",E,[s("div",I,[s("div",L,[O,s("div",S,[s("div",T,[y(s("input",{type:"text",class:"form-control border-0",placeholder:"Buscar","aria-label":"Buscar","onUpdate:modelValue":i[0]||(i[0]=e=>l(r).search=e)},null,512),[[f,l(r).search]]),z])])])]),s("table",G,[M,s("tbody",null,[(t(!0),a(x,null,v(l(u),(e,_)=>(t(),a("tr",{key:_},[s("th",R,c(e.id),1),s("td",null,c(e.name),1),s("td",null,c(e.email),1),s("td",null,[e.tyc_state?(t(),a("span",$," Acepto")):(t(),a("span",q," Falta"))]),s("td",null,[e.info_state?(t(),a("span",H," Completada")):(t(),a("span",J," Falta"))]),s("td",null,[e.state?(t(),a("span",K," Activo")):(t(),a("span",Q," Deshabilitado"))])]))),128))])]),s("div",W,[k(A,{currentPage:o.usuarios.current_page,totalPages:o.usuarios.last_page,links:o.usuarios.links},null,8,["currentPage","totalPages","links"])])])])]),_:1}))}};export{es as default};