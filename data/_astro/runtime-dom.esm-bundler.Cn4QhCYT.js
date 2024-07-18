import{j as T,k as d,l as H,m as I,n as K,p as D,q as B,s as _,u as P,v as z,w as G,x as $,y as R,z as q}from"./runtime-core.esm-bundler.BG7tPlu0.js";/**
* @vue/runtime-dom v3.4.21
* (c) 2018-present Yuxi (Evan) You and Vue contributors
* @license MIT
**/const W="http://www.w3.org/2000/svg",j="http://www.w3.org/1998/Math/MathML",a=typeof document<"u"?document:null,S=a&&a.createElement("template"),U={insert:(t,e,n)=>{e.insertBefore(t,n||null)},remove:t=>{const e=t.parentNode;e&&e.removeChild(t)},createElement:(t,e,n,i)=>{const s=e==="svg"?a.createElementNS(W,t):e==="mathml"?a.createElementNS(j,t):a.createElement(t,n?{is:n}:void 0);return t==="select"&&i&&i.multiple!=null&&s.setAttribute("multiple",i.multiple),s},createText:t=>a.createTextNode(t),createComment:t=>a.createComment(t),setText:(t,e)=>{t.nodeValue=e},setElementText:(t,e)=>{t.textContent=e},parentNode:t=>t.parentNode,nextSibling:t=>t.nextSibling,querySelector:t=>a.querySelector(t),setScopeId(t,e){t.setAttribute(e,"")},insertStaticContent(t,e,n,i,s,o){const r=n?n.previousSibling:e.lastChild;if(s&&(s===o||s.nextSibling))for(;e.insertBefore(s.cloneNode(!0),n),!(s===o||!(s=s.nextSibling)););else{S.innerHTML=i==="svg"?`<svg>${t}</svg>`:i==="mathml"?`<math>${t}</math>`:t;const c=S.content;if(i==="svg"||i==="mathml"){const l=c.firstChild;for(;l.firstChild;)c.appendChild(l.firstChild);c.removeChild(l)}e.insertBefore(c,n)}return[r?r.nextSibling:e.firstChild,n?n.previousSibling:e.lastChild]}},X=Symbol("_vtc");function y(t,e,n){const i=t[X];i&&(e=(e?[e,...i]:[...i]).join(" ")),e==null?t.removeAttribute("class"):n?t.setAttribute("class",e):t.className=e}const b=Symbol("_vod"),F=Symbol("_vsh"),V=Symbol(""),J=/(^|;)\s*display\s*:/;function Q(t,e,n){const i=t.style,s=d(n);let o=!1;if(n&&!s){if(e)if(d(e))for(const r of e.split(";")){const c=r.slice(0,r.indexOf(":")).trim();n[c]==null&&p(i,c,"")}else for(const r in e)n[r]==null&&p(i,r,"");for(const r in n)r==="display"&&(o=!0),p(i,r,n[r])}else if(s){if(e!==n){const r=i[V];r&&(n+=";"+r),i.cssText=n,o=J.test(n)}}else e&&t.removeAttribute("style");b in t&&(t[b]=o?i.display:"",t[F]&&(i.display="none"))}const A=/\s*!important$/;function p(t,e,n){if(_(n))n.forEach(i=>p(t,e,i));else if(n==null&&(n=""),e.startsWith("--"))t.setProperty(e,n);else{const i=Y(t,e);A.test(n)?t.setProperty(P(i),n.replace(A,""),"important"):t[i]=n}}const v=["Webkit","Moz","ms"],m={};function Y(t,e){const n=m[e];if(n)return n;let i=z(e);if(i!=="filter"&&i in t)return m[e]=i;i=G(i);for(let s=0;s<v.length;s++){const o=v[s]+i;if(o in t)return m[e]=o}return e}const C="http://www.w3.org/1999/xlink";function Z(t,e,n,i,s){if(i&&e.startsWith("xlink:"))n==null?t.removeAttributeNS(C,e.slice(6,e.length)):t.setAttributeNS(C,e,n);else{const o=$(e);n==null||o&&!R(n)?t.removeAttribute(e):t.setAttribute(e,o?"":n)}}function k(t,e,n,i,s,o,r){if(e==="innerHTML"||e==="textContent"){i&&r(i,s,o),t[e]=n??"";return}const c=t.tagName;if(e==="value"&&c!=="PROGRESS"&&!c.includes("-")){const f=c==="OPTION"?t.getAttribute("value")||"":t.value,g=n??"";(f!==g||!("_value"in t))&&(t.value=g),n==null&&t.removeAttribute(e),t._value=n;return}let l=!1;if(n===""||n==null){const f=typeof t[e];f==="boolean"?n=R(n):n==null&&f==="string"?(n="",l=!0):f==="number"&&(n=0,l=!0)}try{t[e]=n}catch{}l&&t.removeAttribute(e)}function tt(t,e,n,i){t.addEventListener(e,n,i)}function et(t,e,n,i){t.removeEventListener(e,n,i)}const E=Symbol("_vei");function nt(t,e,n,i,s=null){const o=t[E]||(t[E]={}),r=o[e];if(i&&r)r.value=i;else{const[c,l]=it(e);if(i){const f=o[e]=ot(i,s);tt(t,c,f,l)}else r&&(et(t,c,r,l),o[e]=void 0)}}const w=/(?:Once|Passive|Capture)$/;function it(t){let e;if(w.test(t)){e={};let i;for(;i=t.match(w);)t=t.slice(0,t.length-i[0].length),e[i[0].toLowerCase()]=!0}return[t[2]===":"?t.slice(3):P(t.slice(2)),e]}let h=0;const st=Promise.resolve(),rt=()=>h||(st.then(()=>h=0),h=Date.now());function ot(t,e){const n=i=>{if(!i._vts)i._vts=Date.now();else if(i._vts<=n.attached)return;q(ct(i,n.value),e,5,[i])};return n.value=t,n.attached=rt(),n}function ct(t,e){if(_(e)){const n=t.stopImmediatePropagation;return t.stopImmediatePropagation=()=>{n.call(t),t._stopped=!0},e.map(i=>s=>!s._stopped&&i&&i(s))}else return e}const M=t=>t.charCodeAt(0)===111&&t.charCodeAt(1)===110&&t.charCodeAt(2)>96&&t.charCodeAt(2)<123,lt=(t,e,n,i,s,o,r,c,l)=>{const f=s==="svg";e==="class"?y(t,i,f):e==="style"?Q(t,n,i):D(e)?B(e)||nt(t,e,n,i,r):(e[0]==="."?(e=e.slice(1),!0):e[0]==="^"?(e=e.slice(1),!1):ft(t,e,i,f))?k(t,e,i,o,r,c,l):(e==="true-value"?t._trueValue=i:e==="false-value"&&(t._falseValue=i),Z(t,e,i,f))};function ft(t,e,n,i){if(i)return!!(e==="innerHTML"||e==="textContent"||e in t&&M(e)&&T(n));if(e==="spellcheck"||e==="draggable"||e==="translate"||e==="form"||e==="list"&&t.tagName==="INPUT"||e==="type"&&t.tagName==="TEXTAREA")return!1;if(e==="width"||e==="height"){const s=t.tagName;if(s==="IMG"||s==="VIDEO"||s==="CANVAS"||s==="SOURCE")return!1}return M(e)&&d(n)?!1:e in t}const at=["ctrl","shift","alt","meta"],ut={stop:t=>t.stopPropagation(),prevent:t=>t.preventDefault(),self:t=>t.target!==t.currentTarget,ctrl:t=>!t.ctrlKey,shift:t=>!t.shiftKey,alt:t=>!t.altKey,meta:t=>!t.metaKey,left:t=>"button"in t&&t.button!==0,middle:t=>"button"in t&&t.button!==1,right:t=>"button"in t&&t.button!==2,exact:(t,e)=>at.some(n=>t[`${n}Key`]&&!e.includes(n))},ht=(t,e)=>{const n=t._withMods||(t._withMods={}),i=e.join(".");return n[i]||(n[i]=(s,...o)=>{for(let r=0;r<e.length;r++){const c=ut[e[r]];if(c&&c(s,e))return}return t(s,...o)})},L=K({patchProp:lt},U);let u,N=!1;function pt(){return u||(u=H(L))}function dt(){return u=N?u:I(L),N=!0,u}const gt=(...t)=>{const e=pt().createApp(...t),{mount:n}=e;return e.mount=i=>{const s=x(i);if(!s)return;const o=e._component;!T(o)&&!o.render&&!o.template&&(o.template=s.innerHTML),s.innerHTML="";const r=n(s,!1,O(s));return s instanceof Element&&(s.removeAttribute("v-cloak"),s.setAttribute("data-v-app","")),r},e},St=(...t)=>{const e=dt().createApp(...t),{mount:n}=e;return e.mount=i=>{const s=x(i);if(s)return n(s,!0,O(s))},e};function O(t){if(t instanceof SVGElement)return"svg";if(typeof MathMLElement=="function"&&t instanceof MathMLElement)return"mathml"}function x(t){return d(t)?document.querySelector(t):t}export{St as a,gt as c,ht as w};
