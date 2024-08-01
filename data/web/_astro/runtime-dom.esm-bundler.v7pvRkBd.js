import{E as M,G as p,H as I,I as x,J as D,K as G,L as z,M as T,N as R,O as B,P as W,Q as _,R as $,T as q,U as K}from"./runtime-core.esm-bundler.C0zvLvRR.js";/**
* @vue/runtime-dom v3.4.35
* (c) 2018-present Yuxi (Evan) You and Vue contributors
* @license MIT
**/const U="http://www.w3.org/2000/svg",X="http://www.w3.org/1998/Math/MathML",l=typeof document<"u"?document:null,h=l&&l.createElement("template"),j={insert:(e,t,n)=>{t.insertBefore(e,n||null)},remove:e=>{const t=e.parentNode;t&&t.removeChild(e)},createElement:(e,t,n,i)=>{const s=t==="svg"?l.createElementNS(U,e):t==="mathml"?l.createElementNS(X,e):n?l.createElement(e,{is:n}):l.createElement(e);return e==="select"&&i&&i.multiple!=null&&s.setAttribute("multiple",i.multiple),s},createText:e=>l.createTextNode(e),createComment:e=>l.createComment(e),setText:(e,t)=>{e.nodeValue=t},setElementText:(e,t)=>{e.textContent=t},parentNode:e=>e.parentNode,nextSibling:e=>e.nextSibling,querySelector:e=>l.querySelector(e),setScopeId(e,t){e.setAttribute(t,"")},insertStaticContent(e,t,n,i,s,o){const r=n?n.previousSibling:t.lastChild;if(s&&(s===o||s.nextSibling))for(;t.insertBefore(s.cloneNode(!0),n),!(s===o||!(s=s.nextSibling)););else{h.innerHTML=i==="svg"?`<svg>${e}</svg>`:i==="mathml"?`<math>${e}</math>`:e;const c=h.content;if(i==="svg"||i==="mathml"){const f=c.firstChild;for(;f.firstChild;)c.appendChild(f.firstChild);c.removeChild(f)}t.insertBefore(c,n)}return[r?r.nextSibling:t.firstChild,n?n.previousSibling:t.lastChild]}},F=Symbol("_vtc");function J(e,t,n){const i=e[F];i&&(t=(t?[t,...i]:[...i]).join(" ")),t==null?e.removeAttribute("class"):n?e.setAttribute("class",t):e.className=t}const S=Symbol("_vod"),Q=Symbol("_vsh"),V=Symbol(""),Y=/(^|;)\s*display\s*:/;function Z(e,t,n){const i=e.style,s=p(n);let o=!1;if(n&&!s){if(t)if(p(t))for(const r of t.split(";")){const c=r.slice(0,r.indexOf(":")).trim();n[c]==null&&u(i,c,"")}else for(const r in t)n[r]==null&&u(i,r,"");for(const r in n)r==="display"&&(o=!0),u(i,r,n[r])}else if(s){if(t!==n){const r=i[V];r&&(n+=";"+r),i.cssText=n,o=Y.test(n)}}else t&&e.removeAttribute("style");S in e&&(e[S]=o?i.display:"",e[Q]&&(i.display="none"))}const g=/\s*!important$/;function u(e,t,n){if(T(n))n.forEach(i=>u(e,t,i));else if(n==null&&(n=""),t.startsWith("--"))e.setProperty(t,n);else{const i=y(e,t);g.test(n)?e.setProperty(R(i),n.replace(g,""),"important"):e[i]=n}}const b=["Webkit","Moz","ms"],d={};function y(e,t){const n=d[t];if(n)return n;let i=B(t);if(i!=="filter"&&i in e)return d[t]=i;i=W(i);for(let s=0;s<b.length;s++){const o=b[s]+i;if(o in e)return d[t]=o}return t}const A="http://www.w3.org/1999/xlink";function C(e,t,n,i,s,o=q(t)){i&&t.startsWith("xlink:")?n==null?e.removeAttributeNS(A,t.slice(6,t.length)):e.setAttributeNS(A,t,n):n==null||o&&!_(n)?e.removeAttribute(t):e.setAttribute(t,o?"":$(n)?String(n):n)}function k(e,t,n,i){if(t==="innerHTML"||t==="textContent"){if(n==null)return;e[t]=n;return}const s=e.tagName;if(t==="value"&&s!=="PROGRESS"&&!s.includes("-")){const r=s==="OPTION"?e.getAttribute("value")||"":e.value,c=n==null?"":String(n);(r!==c||!("_value"in e))&&(e.value=c),n==null&&e.removeAttribute(t),e._value=n;return}let o=!1;if(n===""||n==null){const r=typeof e[t];r==="boolean"?n=_(n):n==null&&r==="string"?(n="",o=!0):r==="number"&&(n=0,o=!0)}try{e[t]=n}catch{}o&&e.removeAttribute(t)}function tt(e,t,n,i){e.addEventListener(t,n,i)}function et(e,t,n,i){e.removeEventListener(t,n,i)}const v=Symbol("_vei");function nt(e,t,n,i,s=null){const o=e[v]||(e[v]={}),r=o[t];if(i&&r)r.value=i;else{const[c,f]=it(t);if(i){const H=o[t]=ot(i,s);tt(e,c,H,f)}else r&&(et(e,c,r,f),o[t]=void 0)}}const E=/(?:Once|Passive|Capture)$/;function it(e){let t;if(E.test(e)){t={};let i;for(;i=e.match(E);)e=e.slice(0,e.length-i[0].length),t[i[0].toLowerCase()]=!0}return[e[2]===":"?e.slice(3):R(e.slice(2)),t]}let m=0;const st=Promise.resolve(),rt=()=>m||(st.then(()=>m=0),m=Date.now());function ot(e,t){const n=i=>{if(!i._vts)i._vts=Date.now();else if(i._vts<=n.attached)return;K(ct(i,n.value),t,5,[i])};return n.value=e,n.attached=rt(),n}function ct(e,t){if(T(t)){const n=e.stopImmediatePropagation;return e.stopImmediatePropagation=()=>{n.call(e),e._stopped=!0},t.map(i=>s=>!s._stopped&&i&&i(s))}else return t}const N=e=>e.charCodeAt(0)===111&&e.charCodeAt(1)===110&&e.charCodeAt(2)>96&&e.charCodeAt(2)<123,lt=(e,t,n,i,s,o)=>{const r=s==="svg";t==="class"?J(e,i,r):t==="style"?Z(e,n,i):G(t)?z(t)||nt(e,t,n,i,o):(t[0]==="."?(t=t.slice(1),!0):t[0]==="^"?(t=t.slice(1),!1):ft(e,t,i,r))?(k(e,t,i),!e.tagName.includes("-")&&(t==="value"||t==="checked"||t==="selected")&&C(e,t,i,r,o,t!=="value")):(t==="true-value"?e._trueValue=i:t==="false-value"&&(e._falseValue=i),C(e,t,i,r))};function ft(e,t,n,i){if(i)return!!(t==="innerHTML"||t==="textContent"||t in e&&N(t)&&M(n));if(t==="spellcheck"||t==="draggable"||t==="translate"||t==="form"||t==="list"&&e.tagName==="INPUT"||t==="type"&&e.tagName==="TEXTAREA")return!1;if(t==="width"||t==="height"){const s=e.tagName;if(s==="IMG"||s==="VIDEO"||s==="CANVAS"||s==="SOURCE")return!1}return N(t)&&p(n)?!1:t in e}const L=D({patchProp:lt},j);let a,w=!1;function at(){return a||(a=I(L))}function ut(){return a=w?a:x(L),w=!0,a}const dt=(...e)=>{const t=at().createApp(...e),{mount:n}=t;return t.mount=i=>{const s=O(i);if(!s)return;const o=t._component;!M(o)&&!o.render&&!o.template&&(o.template=s.innerHTML),s.innerHTML="";const r=n(s,!1,P(s));return s instanceof Element&&(s.removeAttribute("v-cloak"),s.setAttribute("data-v-app","")),r},t},mt=(...e)=>{const t=ut().createApp(...e),{mount:n}=t;return t.mount=i=>{const s=O(i);if(s)return n(s,!0,P(s))},t};function P(e){if(e instanceof SVGElement)return"svg";if(typeof MathMLElement=="function"&&e instanceof MathMLElement)return"mathml"}function O(e){return p(e)?document.querySelector(e):e}export{dt as a,mt as c};
