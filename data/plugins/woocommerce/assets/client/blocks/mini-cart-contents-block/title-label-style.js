"use strict";(self.webpackChunkwebpackWcBlocksStylingJsonp=self.webpackChunkwebpackWcBlocksStylingJsonp||[]).push([[8722],{93566:(l,o,t)=>{t.d(o,{p:()=>a});var e=t(70851),n=t(73993),s=t(90092),r=t(66032);const a=l=>{const o=(l=>{const o=(0,n.isObject)(l)?l:{style:{}};let t=o.style;return(0,n.isString)(t)&&(t=JSON.parse(t)||{}),(0,n.isObject)(t)||(t={}),{...o,style:t}})(l),t=(0,r.BK)(o),a=(0,r.aR)(o),c=(0,r.fo)(o),i=(0,s.x)(o);return{className:(0,e.A)(i.className,t.className,a.className,c.className),style:{...i.style,...t.style,...a.style,...c.style}}}},90092:(l,o,t)=>{t.d(o,{x:()=>n});var e=t(73993);const n=l=>{const o=(0,e.isObject)(l.style.typography)?l.style.typography:{},t=(0,e.isString)(o.fontFamily)?o.fontFamily:"";return{className:l.fontFamily?`has-${l.fontFamily}-font-family`:t,style:{fontSize:l.fontSize?`var(--wp--preset--font-size--${l.fontSize})`:o.fontSize,fontStyle:o.fontStyle,fontWeight:o.fontWeight,letterSpacing:o.letterSpacing,lineHeight:o.lineHeight,textDecoration:o.textDecoration,textTransform:o.textTransform}}}},66032:(l,o,t)=>{t.d(o,{BK:()=>i,aR:()=>u,fo:()=>d});var e=t(70851),n=t(5932),s=t(49786),r=t(73993);function a(l={}){const o={};return(0,s.getCSSRules)(l,{selector:""}).forEach((l=>{o[l.key]=l.value})),o}function c(l,o){return l&&o?`has-${(0,n.c)(o)}-${l}`:""}function i(l){var o,t,n,s,i,u,d;const{backgroundColor:y,textColor:f,gradient:v,style:g}=l,m=c("background-color",y),p=c("color",f),b=function(l){if(l)return`has-${l}-gradient-background`}(v),h=b||(null==g||null===(o=g.color)||void 0===o?void 0:o.gradient);return{className:(0,e.A)(p,b,{[m]:!h&&!!m,"has-text-color":f||(null==g||null===(t=g.color)||void 0===t?void 0:t.text),"has-background":y||(null==g||null===(n=g.color)||void 0===n?void 0:n.background)||v||(null==g||null===(s=g.color)||void 0===s?void 0:s.gradient),"has-link-color":(0,r.isObject)(null==g||null===(i=g.elements)||void 0===i?void 0:i.link)?null==g||null===(u=g.elements)||void 0===u||null===(d=u.link)||void 0===d?void 0:d.color:void 0}),style:a({color:(null==g?void 0:g.color)||{}})}}function u(l){var o;const t=(null===(o=l.style)||void 0===o?void 0:o.border)||{};return{className:function(l){var o;const{borderColor:t,style:n}=l,s=t?c("border-color",t):"";return(0,e.A)({"has-border-color":!!t||!(null==n||null===(o=n.border)||void 0===o||!o.color),[s]:!!s})}(l),style:a({border:t})}}function d(l){var o;return{className:void 0,style:a({spacing:(null===(o=l.style)||void 0===o?void 0:o.spacing)||{}})}}},46729:(l,o,t)=>{t.r(o),t.d(o,{default:()=>a});var e=t(51609),n=t(93566),s=t(70851),r=t(48635);const a=l=>{const o=(0,n.p)(l);return(0,e.createElement)("span",{className:(0,s.A)(l.className,o.className),style:o.style},l.label||r.Z)}}}]);