import{a as e,L as n}from"./App.CnuIdWq6.js";import{_ as a}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{d as i,f as m,o as r}from"./runtime-core.esm-bundler.D6gwB9eG.js";/* empty css                        */import"./runtime-dom.esm-bundler.CkNuiOoF.js";const p={name:"PokemonList",data(){return{items:null}},mounted(){e.get("https://pokeapi.co/api/v2/pokemon?limit=151").then(t=>{t.data&&t.data.results&&(this.items=t.data.results)})},components:{List:n}};function c(t,l,u,_,o,f){const s=i("List");return r(),m(s,{items:o.items},null,8,["items"])}const $=a(p,[["render",c]]);export{$ as default};
