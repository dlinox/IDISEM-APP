import{m as p,c as r,w as f,o as s,e as o,g as a,k as n,a as t,F as i,r as h,s as y,j as g}from"./app.ac59061b.js";import{U as E}from"./UserLayout.fa6f3a5f.js";import"./ModalComponent.180a4f1c.js";import k from"./TerminosYCondicionesComponent.a94d8868.js";import v from"./CardEncuestaComponent.dded06d4.js";import b from"./FormularioDatosGeneral.b1655a03.js";import c from"./HeadingPageComponent.248f6f39.js";import"./logo.01f735ba.js";import"./_plugin-vue_export-helper.cdc0426e.js";const A={class:"container py-4"},N={class:"card border-0"},w={class:"card-body"},x=t("div",{class:"fw-bold"}," DATOS GENERALES",-1),B=t("hr",null,null,-1),C={class:"container py-4"},L={class:"row"},j={__name:"index",props:{encuestas:Array},setup(d){const e=p(()=>g().props.value.auth.user),_={title:"Completa tus datos",description:"DATOS GENERALES"},m={title:"Encuesntas",description:"Encuestas Disponibles"};return(S,D)=>(s(),r(E,null,{default:f(()=>[!o(e).tyc_state&&!o(e).info_state?(s(),r(k,{key:0})):o(e).tyc_state&&!o(e).info_state?(s(),a(i,{key:1},[n(c,{heading:_}),t("div",A,[t("div",N,[t("div",w,[x,B,n(b)])])])],64)):o(e).tyc_state&&o(e).info_state?(s(),a(i,{key:2},[n(c,{heading:m}),t("div",C,[t("div",L,[(s(!0),a(i,null,h(d.encuestas,(l,u)=>(s(),a("div",{key:u,class:"col-12 col-md-6 mb-4"},[n(v,{item:l},null,8,["item"])]))),128))])])],64)):y("",!0)]),_:1}))}};export{j as default};
