import{P as u,a as p}from"./ProductPrice.DS-thvcm.js";import{_ as L}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{c as d,F as m,r as P,i as h,o as l,a as t,b as n,t as I}from"./runtime-core.esm-bundler.D6gwB9eG.js";const C={__name:"ShowAllProducts",props:["allProducts"],setup(s,{expose:r}){r();const{PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:a}={PUBLIC_GRAPHQL_URL:"http://yiiwp.local/wordpress/graphql/",PUBLIC_GRAPHQL_URL_NM:"http://crater.local/graphql",PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:"https://via.placeholder.com/500",PUBLIC_CURRENCY:"NOK",PUBLIC_CURRENCY_LOCALE:"nb-NO",PUBLIC_ALGOLIA_INDEX_NAME:"change me",BASE_URL:"/",MODE:"production",DEV:!1,PROD:!0,SSR:!1,SITE:void 0,ASSETS_PREFIX:void 0},c={PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:a,productLink:e=>({path:"/products/"+e.slug,query:{id:e.databaseId}}),productImage:e=>e.image?e.image.sourceUrl:a,computed:h,ProductImage:u,ProductPrice:p};return Object.defineProperty(c,"__isScriptSetup",{enumerable:!1,value:!0}),c}},E={class:"row product_item_inner"},f={class:"cake_feature_item"},A={class:"cake_text"},R=["href"],g=["data-product-id"];function S(s,r,a,o,_,c){return l(),d("div",E,[(l(!0),d(m,null,P(a.allProducts,e=>(l(),d("div",{key:e.databaseId,class:"col-lg-4 col-md-4 col-6"},[t("div",f,[n(o.ProductImage,{alt:e.name,src:o.productImage(e),width:270},null,8,["alt","src"]),t("div",A,[n(o.ProductPrice,{product:e,priceFontSize:"normal",shouldCenterPrice:!0},null,8,["product"]),t("h3",null,[t("a",{class:"",href:`/wordpress/product/${e.slug}`},I(e.name),9,R)]),t("button",{onClick:r[0]||(r[0]=(...i)=>s.handleClick&&s.handleClick(...i)),"data-product-id":e.databaseId},"Add to Cart",8,g)])])]))),128))])}const N=L(C,[["render",S]]);export{N as default};