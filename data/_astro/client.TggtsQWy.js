import{a as l,c as d}from"./runtime-dom.esm-bundler.CRVD-ITB.js";import{f as m,D as s,S as y}from"./runtime-core.esm-bundler.BG7tPlu0.js";const S=m({props:{value:String,name:String,hydrate:{type:Boolean,default:!0}},setup({name:n,value:t,hydrate:r}){if(!t)return()=>null;let o=r?"astro-slot":"astro-static-slot";return()=>s(o,{name:n,innerHTML:t})}}),A=()=>{},v=n=>async(t,r,o,{client:i})=>{if(!n.hasAttribute("ssr"))return;const p=t.name?`${t.name} Host`:void 0,a={};for(const[e,f]of Object.entries(o))a[e]=()=>s(S,{value:f,name:e==="default"?void 0:e});const u=i!=="only",c=(u?l:d)({name:p,render(){let e=s(t,r,a);return b(t.setup)&&(e=s(y,null,e)),e}});await A(),c.mount(n,u),n.addEventListener("astro:unmount",()=>c.unmount(),{once:!0})};function b(n){const t=n?.constructor;return t&&t.name==="AsyncFunction"}export{v as default};
