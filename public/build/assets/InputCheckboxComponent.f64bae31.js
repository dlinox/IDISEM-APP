import{q as d,y as m,c as p,w as h,o,g as l,r as k,d as f,K as g,a as n,t as b,F as v}from"./app.ac59061b.js";import x from"./CardPreguntaComponent.c14ab124.js";const y=["name","id","value"],V=["for"],C={__name:"InputCheckboxComponent",props:{pregunta:Object,modelValue:Array},emits:["update:modelValue"],setup(e,{emit:u}){const a=d([]);return m(()=>a.value,r=>{u("update:modelValue",JSON.parse(JSON.stringify(r)))}),(r,c)=>(o(),p(x,{pregunta:e.pregunta.titulo},{"card-body":h(()=>[(o(!0),l(v,null,k(e.pregunta.opciones,(s,t)=>(o(),l("div",{class:"form-check mb-3",key:t},[f(n("input",{name:"checkbox-"+e.pregunta.id,class:"form-check-input",type:"checkbox",id:"checkbox-"+e.pregunta.id+"-"+t,"onUpdate:modelValue":c[0]||(c[0]=i=>a.value=i),value:s},null,8,y),[[g,a.value]]),n("label",{class:"form-check-label",for:"checkbox-"+e.pregunta.id+"-"+t},b(s.detalle),9,V)]))),128))]),_:1},8,["pregunta"]))}};export{C as default};
