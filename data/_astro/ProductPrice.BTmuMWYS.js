import{_ as f}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{e as r,o,c as l,a as _,C as n,t as u}from"./runtime-core.esm-bundler.BG7tPlu0.js";import{h as P,f as d,a as S}from"./functions.CWYI3Lvm.js";const x={__name:"ProductImage",props:{alt:{type:String,required:!0},src:{type:String,required:!0},width:{type:String,required:!1},height:{type:String,required:!1}},setup(i,{expose:s}){s();const e=i,{PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:t}={PUBLIC_GRAPHQL_URL:"http://yiiwp.local/wordpress/graphql",PUBLIC_GRAPHQL_URL_NM:"http://crater.local/graphql",PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:"https://via.placeholder.com/500",PUBLIC_CURRENCY:"NOK",PUBLIC_CURRENCY_LOCALE:"nb-NO",PUBLIC_ALGOLIA_INDEX_NAME:"change me",BASE_URL:"/",MODE:"production",DEV:!1,PROD:!0,SSR:!1,SITE:void 0,ASSETS_PREFIX:void 0},a=r(()=>e.src||t),c={props:e,PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:t,displayedImage:a,computed:r};return Object.defineProperty(c,"__isScriptSetup",{enumerable:!1,value:!0}),c}},L={class:"cake_img"},C=["alt","src","width","height"];function y(i,s,e,t,a,c){return o(),l("div",L,[_("img",{alt:e.alt,src:t.displayedImage,width:e.width,height:e.height},null,8,C)])}const B=f(x,[["render",y]]),E={__name:"ProductPrice",props:{product:Object,priceFontSize:String,shouldCenterPrice:Boolean},setup(i,{expose:s}){s();const e=i,t=r(()=>e.product.onSale),a=r(()=>P(e.product)),c=r(()=>a.value?d(e.product.price):e.product.regularPrice),g=r(()=>t.value?a.value?d(e.product.price):e.product.salePrice:e.product.price),m=r(()=>{switch(e.priceFontSize){case"small":return"text-lg";case"normal":return"text-2xl";case"big":return"text-2xl";default:return"text-xl"}}),h=r(()=>{switch(e.priceFontSize){case"small":return"text-lg";case"normal":return"text-xl";case"big":return"text-xl";default:return"text-xl"}}),p={props:e,onSale:t,productHasVariations:a,basePrice:c,displayPrice:g,getFontSizeClass:m,getSaleFontSizeClass:h,computed:r,get formatPrice(){return S},get filteredVariantPrice(){return d},get hasVariations(){return P}};return Object.defineProperty(p,"__isScriptSetup",{enumerable:!1,value:!0}),p}};function I(i,s,e,t,a,c){return o(),l("div",null,[t.onSale?(o(),l("div",{key:0,class:n(["flex",e.shouldCenterPrice?"justify-center":""])},[_("p",{class:n(["pt-1 mt-4 text-gray-900",t.getFontSizeClass])},u(t.formatPrice(t.displayPrice)),3),_("p",{class:n(["pt-1 pl-4 mt-4 text-gray-900 line-through",t.getSaleFontSizeClass])},u(t.formatPrice(t.basePrice)),3)],2)):(o(),l("p",{key:1,class:n(["flex pt-1 mt-4 text-2xl text-gray-900",e.shouldCenterPrice?"justify-center":""])},u(t.formatPrice(t.displayPrice)),3))])}const O=f(E,[["render",I]]);export{B as P,O as a};