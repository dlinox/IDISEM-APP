import{u as h,m as p,y as b,c as m,w as g,o as a,a as s,t as e,d as v,v as f,e as l,g as c,r as y,F as x,k,z as w}from"./app.c348ad52.js";import{A as N}from"./AdminLayout.3e9a2a54.js";import{t as B,_ as P}from"./throttle.41d1dc99.js";import"./logo.01f735ba.js";import"./_plugin-vue_export-helper.cdc0426e.js";const A={class:"container"},F={class:"card border-0 my-3"},j=s("div",{class:"card-header border-0 bg-primary"},null,-1),C={class:"card-body"},D={class:""},E={class:"text-secondary fw-bold mb-1"},O=s("h1",{class:"fs-3 mb-0"},"Estudiantes UNA-PUNO",-1),U={class:"card border-0 rounded-0 table-content"},V={class:"card-header bg-white"},I={class:"row"},L=s("div",{class:"col-6"},null,-1),R={class:"col-6"},S={class:"input-group"},z=s("span",{class:"input-group-text border-0"},[s("i",{class:"bi bi-search"})],-1),M={class:"table table-bordered mb-0"},T=s("thead",null,[s("tr",null,[s("th",{scope:"col"},"#"),s("th",{scope:"col"},"Nombres"),s("th",{scope:"col"},"Apellidos"),s("th",{scope:"col"},"Correo"),s("th",{scope:"col"},"DNI"),s("th",{scope:"col"},"Celular"),s("th",{scope:"col"},"Registrado")])],-1),$={scope:"row"},q={key:0,class:"badge text-bg-success"},G={key:1,class:"badge text-bg-danger"},H={class:"card-footer d-flex justify-content-end"},Y={__name:"index",props:{estudiantes:Object,filters:Object},setup(o){const r=o,d=h({search:r.filters.search}),u=p(()=>r.estudiantes.data);return b(d,B(n=>{w.Inertia.get("/admin/estudiantes",{search:n.search},{preserveState:!0})},600),{deep:!0}),(n,i)=>(a(),m(N,null,{default:g(()=>[s("div",A,[s("div",F,[j,s("div",C,[s("div",D,[s("span",E,e(o.estudiantes.total)+" Estudiantes ",1),O])])]),s("div",U,[s("div",V,[s("div",I,[L,s("div",R,[s("div",S,[v(s("input",{type:"text",class:"form-control border-0",placeholder:"Buscar","aria-label":"Buscar","onUpdate:modelValue":i[0]||(i[0]=t=>l(d).search=t)},null,512),[[f,l(d).search]]),z])])])]),s("table",M,[T,s("tbody",null,[(a(!0),c(x,null,y(l(u),(t,_)=>(a(),c("tr",{key:_},[s("th",$,e(t.id),1),s("td",null,e(t.nombres),1),s("td",null,e(t.paterno),1),s("td",null,e(t.correo),1),s("td",null,e(t.dni),1),s("td",null,e(t.celular),1),s("td",null,[t.estado==1?(a(),c("span",q," Registrado")):(a(),c("span",G," No"))])]))),128))])]),s("div",H,[k(P,{currentPage:o.estudiantes.current_page,totalPages:o.estudiantes.last_page,links:o.estudiantes.links},null,8,["currentPage","totalPages","links"])])])])]),_:1}))}};export{Y as default};
