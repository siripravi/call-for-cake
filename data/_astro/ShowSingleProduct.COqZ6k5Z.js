import{_ as g}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{d as h,c as a,a as t,t as i,e as l,F as _,r as m,f as c,g as p,h as r,o as s}from"./runtime-core.esm-bundler.D6gwB9eG.js";const b={},v={key:0},y={class:"product-details spad"},f={class:"container"},k={class:"row"},w={class:"col-lg-6"},j={class:"product__details__img"},S={class:"product__details__big__img"},T=["alt","src"],x=["alt","src"],B=p('<div class="product__details__thumb"><div class="pt__item active"><img data-imgbigurl="/images/shop/details/product-big-2.jpg" src="/images/shop/details/product-big-2.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-1.jpg" src="/images/shop/details/product-big-1.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-4.jpg" src="/images/shop/details/product-big-4.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-3.jpg" src="/images/shop/details/product-big-3.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-5.jpg" src="/images/shop/details/product-big-5.jpg" alt=""></div></div>',1),C={class:"col-lg-6"},P={class:"product__details__text"},V=t("div",{class:"product__label"},"Cupcake",-1),A={key:0,class:"flex"},E={class:"pt-1 mt-4 text-3xl text-gray-900"},I={key:0},N={key:1},z={class:"pt-1 pl-8 mt-4 text-2xl text-gray-900 line-through"},D={key:0},M={key:1},Q={key:1,class:"pt-1 mt-4 text-2xl text-gray-900"},q=t("br",null,null,-1),F={key:2,class:"pt-1 mt-4 text-2xl text-gray-900"},U={key:3,class:"pt-1 mt-4 text-xl text-gray-900"},G=t("span",{class:"py-2"},"Variants",-1),K=["value","selected"],L=t("ul",null,[t("li",null,[r("SKU: "),t("span",null,"17")]),t("li",null,[r("Category: "),t("span",null,"Biscuit cake")]),t("li",null,[r("Tags: "),t("span",null,"Gadgets, minimalisstic")])],-1),R={class:"product__details__option"},$=p('<div class="quantity"><div class="pro-qty"><input type="text" value="1"></div></div><a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>',2),H=t("div",{class:"product__details__tab"},[t("div",{class:"col-lg-12"},[t("ul",{class:"nav nav-tabs",role:"tablist"},[t("li",{class:"nav-item"},[t("a",{class:"nav-link active","data-bs-toggle":"tab",href:"#tabs-1",role:"tab"},"Description")]),t("li",{class:"nav-item"},[t("a",{class:"nav-link","data-bs-toggle":"tab",href:"#tabs-2",role:"tab"},"Additional information")]),t("li",{class:"nav-item"},[t("a",{class:"nav-link","data-bs-toggle":"tab",href:"#tabs-3",role:"tab"},"Previews(1)")])]),t("div",{class:"tab-content"},[t("div",{class:"tab-pane active",id:"tabs-1",role:"tabpanel"},[t("div",{class:"row d-flex justify-content-center"},[t("div",{class:"col-lg-8"},[t("p",null," Tab1:Description:This delectable Strawberry Pie is an extraordinary treat filled with sweet and tasty chunks of delicious strawberries. Made with the freshest ingredients, one bite will send you to summertime. Each gift arrives in an elegant gift box and arrives with a greeting card of your choice that you can personalize online! ")])])]),t("div",{class:"tab-pane",id:"tabs-2",role:"tabpanel"},[t("div",{class:"row d-flex justify-content-center"},[t("div",{class:"col-lg-8"},[t("p",null," Tab2-Additional Information:This delectable Strawberry Pie is an extraordinary treat filled with sweet and tasty chunks of delicious strawberries. Made with the freshest ingredients, one bite will send you to summertime. Each gift arrives in an elegant gift box and arrives with a greeting card of your choice that you can personalize online!2 ")])])]),t("div",{class:"tab-pane",id:"tabs-3",role:"tabpanel"},[t("div",{class:"row d-flex justify-content-center"},[t("div",{class:"col-lg-8"},[t("p",null," Tab3-Reviews:This delectable Strawberry Pie is an extraordinary treat filled with sweet and tasty chunks of delicious strawberries. Made with the freshest ingredients, one bite will send you to summertime. Each gift arrives in an elegant gift box and arrives with a greeting card of your choice that you can personalize online!3 ")])])])])])],-1);function J(e,d){const n=h("AddToCartButton");return e.product?(s(),a("div",v,[t("h4",null,i(e.product.name),1),t("section",y,[t("div",f,[t("div",k,[t("div",w,[t("div",j,[t("div",S,[e.product.image?(s(),a("img",{key:0,id:"product-image",class:"big_img",alt:e.product.name,src:e.product.image.sourceUrl},null,8,T)):(s(),a("img",{key:1,id:"product-image",class:"big_img",alt:e.product.name,src:e.process.env.placeholderSmallImage},null,8,x))]),B])]),t("div",C,[t("div",P,[V,t("h4",null,i(e.product.name),1),e.product.onSale?(s(),a("div",A,[t("h5",E,[e.product.variations?(s(),a("span",I,i(e.product.price),1)):(s(),a("span",N,i(e.product.salePrice),1))]),t("h5",z,[e.product.variations?(s(),a("span",D,i(e.product.price),1)):(s(),a("span",M,i(e.product.regularPrice),1))])])):(s(),a("h5",Q,i(e.product.price),1)),q,e.product.stockQuantity?(s(),a("p",F,i(e.product.stockQuantity)+" in stock ",1)):l("",!0),e.product.variations?(s(),a("p",U,[G,t("select",{id:"variant",name:"variant",class:"block w-64 px-6 py-2 bg-white border border-gray-500 rounded-lg focus:outline-none focus:shadow-outline",onChange:d[0]||(d[0]=o=>e.changeVariation())},[(s(!0),a(_,null,m(e.product.variations.nodes,(o,u)=>(s(),a("option",{key:o.databaseId,value:o.databaseId,selected:u===0},i(o.name)+" ("+i(o.stockQuantity)+" in stock) ",9,K))),128))],32)])):l("",!0),t("p",null,i(e.product.description),1),L,t("div",R,[$,e.product.variations?(s(),c(n,{key:0,product:e.selectedVariation,"client:visible":""},null,8,["product"])):(s(),c(n,{key:1,product:e.product,"client:visible":""},null,8,["product"]))])])])]),H])])])):l("",!0)}const X=g(b,[["render",J]]);export{X as default};
