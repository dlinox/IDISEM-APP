import{u as N,c as U,w as m,o as d,a as o,b as w,k as u,e as a,g as r,h,d as p,v as _,r as f,F as y}from"./app.985b9c14.js";import{A as $}from"./AdminLayout.f44018cd.js";import{V as J}from"./vue-draggable-next.esm-bundler.43a96968.js";/* empty css                                                                              */import O from"./CalificacionEncuestaComponent.6c19d8c9.js";/* empty css                                                       */import q from"./DropDownTypeComponent.a33cf74d.js";import B from"./TypeContentComponent.213b9d91.js";import"./logo.01f735ba.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./ModalComponent.00e128a7.js";import"./SingleOptionComponent.dc2f9095.js";import"./LinearScaleComponent.8cfc2c47.js";const j={class:"container"},A=o("div",{class:"my-3"},[o("h1",{class:"fs-4 mb-0"}," Crear Nueva Encuesta ")],-1),D=["onSubmit"],F={class:"card border-0 bg-transparent"},Q={class:"card-body bg-white"},T={class:"d-flex justify-content-end"},E=["disabled"],L={key:0,class:"spinner-border spinner-border-sm me-2",role:"status","aria-hidden":"true"},M={key:1,class:"bi bi-save me-2"},G={class:"d-flex mt-3 mb-2"},P={class:"d-flex my-3"},z={class:"accordion",id:"accordionSection"},H=["id"],I={class:"accordion-button rounded-0"},K=["onUpdate:modelValue","placeholder"],R=["data-bs-target","aria-controls"],W=o("i",{class:"bi bi-caret-down"},null,-1),X=[W],Y=["id","aria-labelledby"],Z={class:"accordion-body px-2 border border-light"},oo={class:"card-header border-0"},eo={class:"d-flex mt-3 mb-2"},to=["onUpdate:modelValue","placeholder","disabled"],so={class:"card-body"},no={class:"card-footer border-0"},lo={class:"d-flex justify-content-end"},io=["onClick"],ao=o("i",{class:"bi bi-collection"},null,-1),co=[ao],ro=["onClick"],uo=o("i",{class:"bi bi-trash"},null,-1),po=[uo],_o={class:"d-flex justify-content-end"},bo=["onClick"],mo=o("i",{class:"bi bi-plus-square-dotted"},null,-1),ho=[mo],fo={class:"d-flex justify-content-end py-2"},yo=o("i",{class:"bi bi-plus-square-dotted me-2"},null,-1),Bo={__name:"Crear",setup(vo){const e=N({titulo:null,descripcion:"",calificaciones:[{id:null,detalle:null,mensaje:null,img:null,min:null,max:null}],secciones:[{id:null,titulo:"",preguntas:[{id:null,titulo:"",tipo:"",opcion:"",opciones:[{id:null,detalle:null,ponderado:null}]}]}]}),v=l=>{console.log(l.type),e.post("/admin/encuestas")},g={id:null,titulo:"",preguntas:[{titulo:"",tipo:"",opcion:"",opciones:[{id:null,detalle:null,ponderado:0}]}]},x={titulo:"",tipo:"",opcion:"",opciones:[{id:null,detalle:null,ponderado:null}]},V=()=>{let l=JSON.parse(JSON.stringify(g));e.secciones.push({...l})},k=l=>{let t=JSON.parse(JSON.stringify(x));e.secciones[l].preguntas.push({...t})},S=(l,t)=>{let s=JSON.parse(JSON.stringify(l));e.secciones[t].preguntas.push({...s})},C=(l,t)=>{e.secciones[t].preguntas.splice(l,1)};return(l,t)=>(d(),U($,null,{default:m(()=>[o("div",j,[A,o("form",{onSubmit:w(v,["prevent"])},[o("div",F,[o("div",Q,[o("div",T,[u(O,{modelValue:a(e).calificaciones,"onUpdate:modelValue":t[0]||(t[0]=s=>a(e).calificaciones=s)},null,8,["modelValue"]),o("button",{type:"submit",class:"btn btn-primary ms-3",disabled:a(e).processing},[a(e).processing?(d(),r("span",L)):(d(),r("i",M)),h(" Guardar ")],8,E)]),o("div",G,[p(o("input",{"onUpdate:modelValue":t[1]||(t[1]=s=>a(e).titulo=s),type:"text",class:"form-control",placeholder:"Titulo de la encuesta",required:""},null,512),[[_,a(e).titulo]])]),o("div",P,[p(o("textarea",{"onUpdate:modelValue":t[2]||(t[2]=s=>a(e).descripcion=s),class:"form-control",rows:"2",placeholder:"Descripcin de la encuesta",required:""},null,512),[[_,a(e).descripcion]])])]),o("div",z,[(d(!0),r(y,null,f(a(e).secciones,(s,i)=>(d(),r("div",{key:i,class:"accordion-item border-0 bg-transparent"},[o("div",{class:"accordion-header",id:"accordionSection-h"+i},[o("div",I,[p(o("input",{"onUpdate:modelValue":n=>s.titulo=n,type:"text",class:"form-control me-2",placeholder:"Seccion "+(i+1)},null,8,K),[[_,s.titulo]]),o("button",{class:"btn btn-dark",type:"button","data-bs-toggle":"collapse","data-bs-target":"#accordionSection-c"+i,"aria-expanded":"true","aria-controls":"accordionSection-c"+i},X,8,R)])],8,H),o("div",{id:"accordionSection-c"+i,class:"accordion-collapse collapse show","aria-labelledby":"accordionSection-"+i},[o("div",Z,[u(a(J),{list:s.preguntas},{default:m(()=>[(d(!0),r(y,null,f(s.preguntas,(n,b)=>(d(),r("div",{key:b,class:"card shadow border-0 mb-3"},[o("div",oo,[o("div",eo,[p(o("input",{"onUpdate:modelValue":c=>n.titulo=c,type:"text",class:"form-control",placeholder:"Pregunta "+(b+1),disabled:!n.tipo},null,8,to),[[_,n.titulo]]),u(q,{modelValue:n.tipo,"onUpdate:modelValue":c=>n.tipo=c},null,8,["modelValue","onUpdate:modelValue"])])]),o("div",so,[u(B,{"selected-type":n.tipo,modelValue:n.opciones,"onUpdate:modelValue":c=>n.opciones=c},null,8,["selected-type","modelValue","onUpdate:modelValue"])]),o("div",no,[o("div",lo,[o("button",{type:"button",class:"btn btn-dark ms-2",onClick:c=>S(n,i)},co,8,io),o("button",{type:"button",class:"btn btn-outline-secondary ms-2",onClick:c=>C(b,i)},po,8,ro)])])]))),128))]),_:2},1032,["list"]),o("div",_o,[o("button",{type:"button",class:"btn btn-success",onClick:n=>k(i)},ho,8,bo)])])],8,Y)]))),128))]),o("div",fo,[o("button",{class:"btn btn-success",type:"button",onClick:t[3]||(t[3]=s=>V())},[yo,h(" A\xF1adir Seccion")])])])],40,D)])]),_:1}))}};export{Bo as default};