function __vite__mapDeps(indexes) {
  if (!__vite__mapDeps.viteFileDeps) {
    __vite__mapDeps.viteFileDeps = ["_astro/signals.module.CN58A7Ov.js","_astro/preact.module.BLKjwoRb.js","_astro/hooks.module.Bd9tvhD7.js"]
  }
  return indexes.map((i) => __vite__mapDeps.viteFileDeps[i])
}
import{_ as p}from"./preload-helper.ygWHROA3.js";import{_ as n,B as c,D as v}from"./preact.module.BLKjwoRb.js";const _=({value:t,name:e,hydrate:a=!0})=>t?n(a?"astro-slot":"astro-static-slot",{name:e,dangerouslySetInnerHTML:{__html:t}}):null;_.shouldComponentUpdate=()=>!1;var f=_;const i=new Map;var y=t=>async(e,a,{default:s,...d},{client:g})=>{if(!t.hasAttribute("ssr"))return;for(const[o,r]of Object.entries(d))a[o]=n(f,{value:r,name:o});if(t.dataset.preactSignals){const{signal:o}=await p(()=>import("./signals.module.CN58A7Ov.js"),__vite__mapDeps([0,1,2]));let r=JSON.parse(t.dataset.preactSignals);for(const[u,l]of Object.entries(r)){if(!i.has(l)){const m=o(a[u]);i.set(l,m)}a[u]=i.get(l)}}(g!=="only"?v:c)(n(e,a,s!=null?n(f,{value:s}):s),t),t.addEventListener("astro:unmount",()=>c(null,t),{once:!0})};export{y as default};
