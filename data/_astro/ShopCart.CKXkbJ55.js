import{a as n,B as i}from"./App.CnuIdWq6.js";import{_ as r}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{d as c,f as m,o as _}from"./runtime-core.esm-bundler.D6gwB9eG.js";/* empty css                        */import"./runtime-dom.esm-bundler.CkNuiOoF.js";const l={name:"Pokemon",data(){return{pokemon:null}},mounted(){const o=this.$route.params.name;n.get(`https://pokeapi.co/api/v2/pokemon/${o}`).then(a=>{const t=a.data;n.get(`https://pokeapi.co/api/v2/pokemon-species/${o}`).then(e=>{Object.assign(t,{description:e.data.flavor_text_entries[0].flavor_text,specie_id:e.data.evolution_chain.url.split("/")[6]}),this.pokemon=t})})},components:{BasicDetails:i}};function k(o,a,t,e,s,d){const p=c("BasicDetails");return _(),m(p,{pokemon:s.pokemon},null,8,["pokemon"])}const B=r(l,[["render",k]]);export{B as default};