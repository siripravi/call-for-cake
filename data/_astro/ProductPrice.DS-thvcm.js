import{_ as f}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{i,o,c as l,a as _,n as s,t as u}from"./runtime-core.esm-bundler.D6gwB9eG.js";const x={__name:"ProductImage",props:{alt:{type:String,required:!0},src:{type:String,required:!0},width:{type:String,required:!1},height:{type:String,required:!1}},setup(r,{expose:n}){n();const e=r,{PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:t}={PUBLIC_GRAPHQL_URL:"http://yiiwp.local/wordpress/graphql/",PUBLIC_GRAPHQL_URL_NM:"http://crater.local/graphql",PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:"https://via.placeholder.com/500",PUBLIC_CURRENCY:"NOK",PUBLIC_CURRENCY_LOCALE:"nb-NO",PUBLIC_ALGOLIA_INDEX_NAME:"change me",BASE_URL:"/",MODE:"production",DEV:!1,PROD:!0,SSR:!1,SITE:void 0,ASSETS_PREFIX:void 0},a=i(()=>e.src||t),c={props:e,PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL:t,displayedImage:a,computed:i};return Object.defineProperty(c,"__isScriptSetup",{enumerable:!1,value:!0}),c}},y={class:"cake_img"},L=["alt","src","width","height"];function C(r,n,e,t,a,c){return o(),l("div",y,[_("img",{alt:e.alt,src:t.displayedImage,width:e.width,height:e.height},null,8,L)])}const A=f(x,[["render",C]]);var g=256;for(;g--;)(g+256).toString(16).substring(1);function m(r){return(r?.product?.variations?.nodes??[]).length>0}function I(r,n,e){const t=n||"NOK",a=e||"nb-NO";if(!r)return;const c=parseFloat(r.replace(/[^\d.]/g,""));return new Intl.NumberFormat(a,{style:"currency",currency:t,minimumFractionDigits:0,maximumFractionDigits:0}).format(c)}const d=(r,n)=>n==="right"?r.substring(r.length,r.indexOf("-")).replace("-",""):r.substring(0,r.indexOf("-")).replace("-",""),E={__name:"ProductPrice",props:{product:Object,priceFontSize:String,shouldCenterPrice:Boolean},setup(r,{expose:n}){n();const e=r,t=i(()=>e.product.onSale),a=i(()=>m(e.product)),c=i(()=>a.value?d(e.product.price):e.product.regularPrice),P=i(()=>t.value?a.value?d(e.product.price):e.product.salePrice:e.product.price),h=i(()=>{switch(e.priceFontSize){case"small":return"text-lg";case"normal":return"text-2xl";case"big":return"text-2xl";default:return"text-xl"}}),S=i(()=>{switch(e.priceFontSize){case"small":return"text-lg";case"normal":return"text-xl";case"big":return"text-xl";default:return"text-xl"}}),p={props:e,onSale:t,productHasVariations:a,basePrice:c,displayPrice:P,getFontSizeClass:h,getSaleFontSizeClass:S,computed:i,get formatPrice(){return I},get filteredVariantPrice(){return d},get hasVariations(){return m}};return Object.defineProperty(p,"__isScriptSetup",{enumerable:!1,value:!0}),p}};function b(r,n,e,t,a,c){return o(),l("div",null,[t.onSale?(o(),l("div",{key:0,class:s(["flex",e.shouldCenterPrice?"justify-center":""])},[_("p",{class:s(["pt-1 mt-4 text-gray-900",t.getFontSizeClass])},u(t.formatPrice(t.displayPrice)),3),_("p",{class:s(["pt-1 pl-4 mt-4 text-gray-900 line-through",t.getSaleFontSizeClass])},u(t.formatPrice(t.basePrice)),3)],2)):(o(),l("p",{key:1,class:s(["flex pt-1 mt-4 text-2xl text-gray-900",e.shouldCenterPrice?"justify-center":""])},u(t.formatPrice(t.displayPrice)),3))])}const U=f(E,[["render",b]]);export{A as P,U as a};