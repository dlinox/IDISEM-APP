import{q as _,g as n,a as e,n as i,s as r,F as b,r as v,o,h,t as k}from"./app.098e3b2c.js";const g={class:"dropdown"},y={class:"btn-group ms-2",role:"group","data-bs-toggle":"dropdown","aria-expanded":"false"},C={key:0,type:"button",class:"btn btn-outline-dark"},f=e("button",{type:"button",class:"btn btn-dark"},"Tipo",-1),V={class:"dropdown-menu"},w=["onClick"],D={key:0,class:"dropdown-divider"},B={__name:"DropDownTypeComponent",props:{modelValue:String},emits:["update:modelValue"],setup(d,{emit:u}){const s=_("null"),p=a=>{s.value=l.filter(c=>c.input==a)[0],u("update:modelValue",a)},l=[{name:"Opci\xF3n unica",icon:"bi bi-ui-radios",input:"RADIO",active:!0},{name:"Opci\xF3n multiple",icon:"bi bi-ui-checks",active:!0,input:"CHECKBOX"},{name:"Desplegable",icon:"bi bi-menu-app-fill",active:!0,input:"SELECT",divider:!0}];return(a,c)=>(o(),n("div",g,[e("div",y,[s.value.icon?(o(),n("button",C,[e("i",{class:i(s.value.icon)},null,2)])):r("",!0),f]),e("ul",V,[(o(),n(b,null,v(l,(t,m)=>e("li",{key:m,role:"button"},[e("div",{class:i(["dropdown-item",[t.input==d.modelValue?"active":"",t.active?"":"disabled"]]),onClick:T=>p(t.input)},[e("i",{class:i([t.icon,"me-2"])},null,2),h(" "+k(t.name),1)],10,w),t.divider?(o(),n("hr",D)):r("",!0)])),64))])]))}};export{B as default};