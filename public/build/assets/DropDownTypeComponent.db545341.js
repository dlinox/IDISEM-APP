import{q as m,g as n,a as e,n as s,s as r,F as _,r as v,o,h,t as f}from"./app.ac59061b.js";const g={class:"dropdown"},k={class:"btn-group ms-2",role:"group","data-bs-toggle":"dropdown","aria-expanded":"false"},y={key:0,type:"button",class:"btn btn-outline-dark"},C=e("button",{type:"button",class:"btn btn-dark"},"Tipo",-1),T={class:"dropdown-menu"},E=["onClick"],V={key:0,class:"dropdown-divider"},D={__name:"DropDownTypeComponent",props:{modelValue:String},emits:["update:modelValue"],setup(u,{emit:d}){const i=m("null"),p=a=>{i.value=l.filter(c=>c.input==a)[0],d("update:modelValue",a)},l=[{name:"Respuesta Corta",icon:"bi bi-filter-left",input:"TEXT",active:!0},{name:"Respuesta Larga",icon:"bi bi-text-left",input:"TEXTAREA",active:!0,divider:!0},{name:"Opci\xF3n unica",icon:"bi bi-ui-radios",input:"RADIO",active:!0},{name:"Opci\xF3n multiple",icon:"bi bi-ui-checks",active:!0,input:"CHECKBOX"},{name:"Desplegable",icon:"bi bi-menu-app-fill",active:!0,input:"SELECT",divider:!0}];return(a,c)=>(o(),n("div",g,[e("div",k,[i.value.icon?(o(),n("button",y,[e("i",{class:s(i.value.icon)},null,2)])):r("",!0),C]),e("ul",T,[(o(),n(_,null,v(l,(t,b)=>e("li",{key:b,role:"button"},[e("div",{class:s(["dropdown-item",[t.input==u.modelValue?"active":"",t.active?"":"disabled"]]),onClick:w=>p(t.input)},[e("i",{class:s([t.icon,"me-2"])},null,2),h(" "+f(t.name),1)],10,E),t.divider?(o(),n("hr",V)):r("",!0)])),64))])]))}};export{D as default};
