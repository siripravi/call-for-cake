import{l as E,t as V,b as q}from"./preact.module.BLKjwoRb.js";import{T as m,A as N,y as z}from"./hooks.module.Bd9tvhD7.js";var B=Symbol.for("preact-signals");function b(){if(v>1)v--;else{for(var t,i=!1;d!==void 0;){var n=d;for(d=void 0,x++;n!==void 0;){var r=n.o;if(n.o=void 0,n.f&=-3,!(8&n.f)&&j(n))try{n.c()}catch(e){i||(t=e,i=!0)}n=r}}if(x=0,v--,i)throw t}}function L(t){if(v>0)return t();v++;try{return t()}finally{b()}}var o=void 0;function M(t){var i=o;o=void 0;try{return t()}finally{o=i}}var d=void 0,v=0,x=0,y=0;function O(t){if(o!==void 0){var i=t.n;if(i===void 0||i.t!==o)return i={i:0,S:t,p:o.s,n:void 0,t:o,e:void 0,x:void 0,r:i},o.s!==void 0&&(o.s.n=i),o.s=i,t.n=i,32&o.f&&t.S(i),i;if(i.i===-1)return i.i=0,i.n!==void 0&&(i.n.p=i.p,i.p!==void 0&&(i.p.n=i.n),i.p=o.s,i.n=void 0,o.s.n=i,o.s=i),i}}function u(t){this.v=t,this.i=0,this.n=void 0,this.t=void 0}u.prototype.brand=B;u.prototype.h=function(){return!0};u.prototype.S=function(t){this.t!==t&&t.e===void 0&&(t.x=this.t,this.t!==void 0&&(this.t.e=t),this.t=t)};u.prototype.U=function(t){if(this.t!==void 0){var i=t.e,n=t.x;i!==void 0&&(i.x=n,t.e=void 0),n!==void 0&&(n.e=i,t.x=void 0),t===this.t&&(this.t=n)}};u.prototype.subscribe=function(t){var i=this;return $(function(){var n=i.value,r=o;o=void 0;try{t(n)}finally{o=r}})};u.prototype.valueOf=function(){return this.value};u.prototype.toString=function(){return this.value+""};u.prototype.toJSON=function(){return this.value};u.prototype.peek=function(){var t=o;o=void 0;try{return this.value}finally{o=t}};Object.defineProperty(u.prototype,"value",{get:function(){var t=O(this);return t!==void 0&&(t.i=this.i),this.v},set:function(t){if(t!==this.v){if(x>100)throw new Error("Cycle detected");this.v=t,this.i++,y++,v++;try{for(var i=this.t;i!==void 0;i=i.x)i.t.N()}finally{b()}}}});function C(t){return new u(t)}function j(t){for(var i=t.s;i!==void 0;i=i.n)if(i.S.i!==i.i||!i.S.h()||i.S.i!==i.i)return!0;return!1}function A(t){for(var i=t.s;i!==void 0;i=i.n){var n=i.S.n;if(n!==void 0&&(i.r=n),i.S.n=i,i.i=-1,i.n===void 0){t.s=i;break}}}function P(t){for(var i=t.s,n=void 0;i!==void 0;){var r=i.p;i.i===-1?(i.S.U(i),r!==void 0&&(r.n=i.n),i.n!==void 0&&(i.n.p=r)):n=i,i.S.n=i.r,i.r!==void 0&&(i.r=void 0),i=r}t.s=n}function a(t){u.call(this,void 0),this.x=t,this.s=void 0,this.g=y-1,this.f=4}(a.prototype=new u).h=function(){if(this.f&=-3,1&this.f)return!1;if((36&this.f)==32||(this.f&=-5,this.g===y))return!0;if(this.g=y,this.f|=1,this.i>0&&!j(this))return this.f&=-2,!0;var t=o;try{A(this),o=this;var i=this.x();(16&this.f||this.v!==i||this.i===0)&&(this.v=i,this.f&=-17,this.i++)}catch(n){this.v=n,this.f|=16,this.i++}return o=t,P(this),this.f&=-2,!0};a.prototype.S=function(t){if(this.t===void 0){this.f|=36;for(var i=this.s;i!==void 0;i=i.n)i.S.S(i)}u.prototype.S.call(this,t)};a.prototype.U=function(t){if(this.t!==void 0&&(u.prototype.U.call(this,t),this.t===void 0)){this.f&=-33;for(var i=this.s;i!==void 0;i=i.n)i.S.U(i)}};a.prototype.N=function(){if(!(2&this.f)){this.f|=6;for(var t=this.t;t!==void 0;t=t.x)t.t.N()}};Object.defineProperty(a.prototype,"value",{get:function(){if(1&this.f)throw new Error("Cycle detected");var t=O(this);if(this.h(),t!==void 0&&(t.i=this.i),16&this.f)throw this.v;return this.v}});function T(t){return new a(t)}function G(t){var i=t.u;if(t.u=void 0,typeof i=="function"){v++;var n=o;o=void 0;try{i()}catch(r){throw t.f&=-2,t.f|=8,U(t),r}finally{o=n,b()}}}function U(t){for(var i=t.s;i!==void 0;i=i.n)i.S.U(i);t.x=void 0,t.s=void 0,G(t)}function D(t){if(o!==this)throw new Error("Out-of-order effect");P(this),o=t,this.f&=-2,8&this.f&&U(this),b()}function p(t){this.x=t,this.u=void 0,this.s=void 0,this.o=void 0,this.f=32}p.prototype.c=function(){var t=this.S();try{if(8&this.f||this.x===void 0)return;var i=this.x();typeof i=="function"&&(this.u=i)}finally{t()}};p.prototype.S=function(){if(1&this.f)throw new Error("Cycle detected");this.f|=1,this.f&=-9,G(this),A(this),v++;var t=o;return o=this,D.bind(this,t)};p.prototype.N=function(){2&this.f||(this.f|=2,this.o=d,d=this)};p.prototype.d=function(){this.f|=8,1&this.f||U(this)};function $(t){var i=new p(t);try{i.c()}catch(n){throw i.d(),n}return i.d.bind(i)}var w,g;function c(t,i){E[t]=i.bind(null,E[t]||function(){})}function S(t){g&&g(),g=t&&t.S()}function J(t){var i=this,n=t.data,r=H(n);r.value=n;var e=m(function(){for(var f=i.__v;f=f.__;)if(f.__c){f.__c.__$f|=4;break}return i.__$u.c=function(){var s;!V(e.peek())&&((s=i.base)==null?void 0:s.nodeType)===3?i.base.data=e.peek():(i.__$f|=1,i.setState({}))},T(function(){var s=r.value.value;return s===0?0:s===!0?"":s||""})},[]);return e.value}J.displayName="_st";Object.defineProperties(u.prototype,{constructor:{configurable:!0,value:void 0},type:{configurable:!0,value:J},props:{configurable:!0,get:function(){return{data:this}}},__b:{configurable:!0,value:1}});c("__b",function(t,i){if(typeof i.type=="string"){var n,r=i.props;for(var e in r)if(e!=="children"){var f=r[e];f instanceof u&&(n||(i.__np=n={}),n[e]=f,r[e]=f.peek())}}t(i)});c("__r",function(t,i){S();var n,r=i.__c;r&&(r.__$f&=-2,(n=r.__$u)===void 0&&(r.__$u=n=function(e){var f;return $(function(){f=this}),f.c=function(){r.__$f|=1,r.setState({})},f}())),w=r,S(n),t(i)});c("__e",function(t,i,n,r){S(),w=void 0,t(i,n,r)});c("diffed",function(t,i){S(),w=void 0;var n;if(typeof i.type=="string"&&(n=i.__e)){var r=i.__np,e=i.props;if(r){var f=n.U;if(f)for(var s in f){var h=f[s];h!==void 0&&!(s in r)&&(h.d(),f[s]=void 0)}else n.U=f={};for(var l in r){var _=f[l],k=r[l];_===void 0?(_=F(n,l,k,e),f[l]=_):_.o(k,e)}}}t(i)});function F(t,i,n,r){var e=i in t&&t.ownerSVGElement===void 0,f=C(n);return{o:function(s,h){f.value=s,r=h},d:$(function(){var s=f.value.value;r[i]!==s&&(r[i]=s,e?t[i]=s:s?t.setAttribute(i,s):t.removeAttribute(i))})}}c("unmount",function(t,i){if(typeof i.type=="string"){var n=i.__e;if(n){var r=n.U;if(r){n.U=void 0;for(var e in r){var f=r[e];f&&f.d()}}}}else{var s=i.__c;if(s){var h=s.__$u;h&&(s.__$u=void 0,h.d())}}t(i)});c("__h",function(t,i,n,r){(r<3||r===9)&&(i.__$f|=2),t(i,n,r)});q.prototype.shouldComponentUpdate=function(t,i){var n=this.__$u;if(!(n&&n.s!==void 0||4&this.__$f)||3&this.__$f)return!0;for(var r in i)return!0;for(var e in t)if(e!=="__source"&&t[e]!==this.props[e])return!0;for(var f in this.props)if(!(f in t))return!0;return!1};function H(t){return m(function(){return C(t)},[])}function Q(t){var i=N(t);return i.current=t,w.__$f|=4,m(function(){return T(function(){return i.current()})},[])}function R(t){var i=N(t);i.current=t,z(function(){return $(function(){return i.current()})},[])}export{u as Signal,L as batch,T as computed,$ as effect,C as signal,M as untracked,Q as useComputed,H as useSignal,R as useSignalEffect};
