import { c as createAstro, a as createComponent, r as renderTemplate, m as maybeRenderHead, b as renderComponent, d as renderSlot, e as renderHead, f as addAttribute, F as Fragment, u as unescapeHTML, s as spreadAttributes } from './astro__zJJdSwR.mjs';
import 'kleur/colors';
import { clsx } from 'clsx';
import { createSchema, createYoga } from 'graphql-yoga';
import gql from 'graphql-tag';
import { ssrRenderAttrs, ssrRenderList, ssrRenderAttr, ssrInterpolate, ssrRenderClass, ssrRenderComponent, ssrIncludeBooleanAttr, ssrRenderSlot } from 'vue/server-renderer';
import { useSSRContext, computed, mergeProps, reactive, withCtx, createVNode, withModifiers, renderSlot as renderSlot$1, openBlock, createBlock, createCommentVNode, ref, onMounted, resolveComponent, defineComponent } from 'vue';
import { listenKeys, atom, map } from 'nanostores';
import { useMutation } from '@vue/apollo-composable';
/* empty css                          */
import { nanoid } from 'nanoid';
import { titleCase } from 'title-case';
import { marked } from 'marked';
import 'uid';
import { useState, useEffect } from 'preact/hooks';
import { jsx, jsxs } from 'preact/jsx-runtime';
/* empty css                          */
import { ApolloClient, InMemoryCache } from '@apollo/client/core/index.js';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay } from 'swiper/modules';
/* empty css                         */

const $$Astro$1f = createAstro();
const $$Footer = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1f, $$props, $$slots);
  Astro2.self = $$Footer;
  (/* @__PURE__ */ new Date()).getFullYear();
  return renderTemplate`<!--================Footer Area =================-->${maybeRenderHead()}<footer class="footer_area"> <div class="footer_widgets"> <div class="container"> <div class="row footer_wd_inner"> <div class="col-lg-3 col-6"> <aside class="f_widget f_about_widget"> <img src="images/footer-logo.png" alt=""> <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui bland itiis praesentium voluptatum deleniti atque corrupti.</p> <ul class="nav"> <li><a href="#"><i class="fa fa-facebook"></i></a></li> <li><a href="#"><i class="fa fa-linkedin"></i></a></li> <li><a href="#"><i class="fa fa-twitter"></i></a></li> <li><a href="#"><i class="fa fa-google-plus"></i></a></li> </ul> </aside> </div> <div class="col-lg-3 col-6"> <aside class="f_widget f_link_widget"> <div class="f_title"> <h3>Quick links</h3> </div> <ul class="list_style"> <li><a href="#">Your Account</a></li> <li><a href="#">View Order</a></li> <li><a href="#">Privacy Policy</a></li> <li><a href="#">Terms & Conditionis</a></li> </ul> </aside> </div> <div class="col-lg-3 col-6"> <aside class="f_widget f_link_widget"> <div class="f_title"> <h3>Work Times</h3> </div> <ul class="list_style"> <li><a href="#">Mon. :  Fri.: 8 am - 8 pm</a></li> <li><a href="#">Sat. : 9am - 4pm</a></li> <li><a href="#">Sun. : Closed</a></li> </ul> </aside> </div> <div class="col-lg-3 col-6"> <aside class="f_widget f_contact_widget"> <div class="f_title"> <h3>Contact Info</h3> </div> <h4>(1800) 574 9687</h4> <p>Justshiop Store <br>256, baker Street,, New Youk, 5245</p> <h5>cakebakery@contact.co.in</h5> </aside> </div> </div> </div> </div> <div class="footer_copyright"> <div class="container"> <div class="copyright_inner"> <div class="float-left"> <h5>© Copyright  cakebakery WordPress WooCommerce Theme. All right reserved.</h5> </div> <div class="float-right"> <a href="#">Purchase Now</a> </div> </div> </div> </div> </footer> <!--================End Footer Area =================--> <!--================Search Box Area =================--> <!--
<div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
    <div class="search_box_inner">
        <h3>Search</h3>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
            </span>
        </div>
    </div>
</div>  --> <!--================End Search Box Area =================-->`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/Footer.astro", void 0);

function useStore(store, opts = {}) {
  let [, forceRender] = useState({});
  let [valueBeforeEffect] = useState(store.get());

  useEffect(() => {
    valueBeforeEffect !== store.get() && forceRender({});
  }, []);
  
  useEffect(() => {
    let batching, timer, unlisten;
    let rerender = () => {
      if (!batching) {
        batching = 1;
        timer = setTimeout(() => {
          batching = undefined;
          forceRender({});
        });
      }
    };
    if (opts.keys) {
      unlisten = listenKeys(store, opts.keys, rerender);
    } else {
      unlisten = store.listen(rerender);
    }
    return () => {
      unlisten();
      clearTimeout(timer);
    }
  }, [store, '' + opts.keys]);

  return store.get()
}

const isCartOpen = atom(false);
map({});

function CartFlyoutToggle() {
  useStore(isCartOpen);
  return jsx("button", {
    class: "btn btn-outline-secondary ms-1 ms-md-2 position-relative cart-toggler",
    type: "button",
    "data-bs-toggle": "offcanvas",
    "data-bs-target": "#offcanvas-cart",
    "aria-controls": "offcanvas-cart",
    children: jsxs("div", {
      class: "d-inline-flex align-items-center",
      children: [jsx("i", {
        class: "fa fa-shopping-cart"
      }), jsx("span", {
        class: "visually-hidden-focusable",
        children: "Cart"
      }), jsx("span", {
        class: "cart-content"
      })]
    })
  });
}

const $$Astro$1e = createAstro();
const $$Navbar$1 = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1e, $$props, $$slots);
  Astro2.self = $$Navbar$1;
  return renderTemplate`${maybeRenderHead()}<nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="index.html"><img src="/images/logo-2.png" alt=""></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="my_toggle_menu"> <span></span> <span></span> <span></span> </span> </button> <div class="collapse navbar-collapse" id="navbarSupportedContent"> <ul class="navbar-nav justify-content-end"> <li class="dropdown submenu active"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Home</a> <ul class="dropdown-menu"> <li><a href="/">Home 1</a></li> <li><a href="index-2.html">Home 2</a></li> <li><a href="index-3.html">Home 3</a></li> <li><a href="index-4.html">Home 4</a></li> <li><a href="index-5.html">Home 5</a></li> </ul> </li> <li><a href="cake.html">Our Cakes</a></li> <li><a href="/pokemons" router-link>VUE</a></li> <li><a href="menu.html">Menu</a></li> <li class="dropdown submenu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About Us</a> <ul class="dropdown-menu"> <li><a href="about-us.html">About Us</a></li> <li><a href="our-team.html">Our Chefs</a></li> <li><a href="testimonials.html">Testimonials</a></li> </ul> </li> <li class="dropdown submenu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a> <ul class="dropdown-menu"> <li><a href="service.html">Services</a></li> <li class="dropdown submenu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gallery</a> <ul class="dropdown-menu"> <li><a href="portfolio.html">- Gallery Classic</a></li> <li> <a href="portfolio-full-width.html">- Gallery Full width</a> </li> </ul> </li> <li><a href="faq.html">Faq</a></li> <li><a href="what-we-make.html">What we make</a></li> <li><a href="special.html">Special Recipe</a></li> <li><a href="404.html">404 page</a></li> <li><a href="comming-soon.html">Coming Soon page</a></li> </ul> </li> <li class="dropdown submenu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Blog</a> <ul class="dropdown-menu"> <li><a href="blog.html">Blog with sidebar</a></li> <li><a href="blog-2column.html">Blog 2 column</a></li> <li><a href="single-blog.html">Blog details</a></li> </ul> </li> <li class="dropdown submenu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a> <ul class="dropdown-menu"> <li><a href="shop.html">Main shop</a></li> <li><a href="product-details.html">Product Details</a></li> <li><a href="cart.html">Cart Page</a></li> <li><a href="checkout.html">Checkout Page</a></li> </ul> </li> <li><a href="contact.html">Contact Us</a></li> </ul> </div> ${renderComponent($$result, "CartFlyoutToggle", CartFlyoutToggle, { "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Cart/CartFlyoutToggle", "client:component-export": "default" })} </nav>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/Navbar.astro", void 0);

const $$Astro$1d = createAstro();
const $$Header = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1d, $$props, $$slots);
  Astro2.self = $$Header;
  return renderTemplate`<!-- Header Section Begin -->${maybeRenderHead()}<header class="main_header_three" data-astro-cid-xbstl6g3> <div class="top_logo_header" data-astro-cid-xbstl6g3> <div class="container" data-astro-cid-xbstl6g3> <div class="header_logo_inner" data-astro-cid-xbstl6g3> <div class="h_left_text" data-astro-cid-xbstl6g3> <div class="media" data-astro-cid-xbstl6g3> <div class="d-flex" data-astro-cid-xbstl6g3> <i class="flaticon-auricular-phone-symbol-in-a-circle" data-astro-cid-xbstl6g3></i> </div> <div class="media-body" data-astro-cid-xbstl6g3> <a href="tel:18004567890" data-astro-cid-xbstl6g3>(1800) 456 7890</a> <p data-astro-cid-xbstl6g3>Toll Free</p> </div> </div> </div> <div class="h_middle_text" data-astro-cid-xbstl6g3> <a href="index.html" data-astro-cid-xbstl6g3><img src="img/logo-3.png" alt="" data-astro-cid-xbstl6g3></a> </div> <div class="h_right_text" data-astro-cid-xbstl6g3> <a class="pink_btn" href="#" data-astro-cid-xbstl6g3>Order online</a> </div> </div> </div> </div> <div class="middle_menu_three" data-astro-cid-xbstl6g3> <div class="container" data-astro-cid-xbstl6g3> ${renderComponent($$result, "Navbar", $$Navbar$1, { "data-astro-cid-xbstl6g3": true })} </div> </div> </header> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/Header.astro", void 0);

var __freeze$1 = Object.freeze;
var __defProp$1 = Object.defineProperty;
var __template$1 = (cooked, raw) => __freeze$1(__defProp$1(cooked, "raw", { value: __freeze$1(raw || cooked.slice()) }));
var _a$1;
const $$Astro$1c = createAstro();
const $$Layout = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1c, $$props, $$slots);
  Astro2.self = $$Layout;
  const { title } = Astro2.props;
  return renderTemplate(_a$1 || (_a$1 = __template$1(['<html lang="en" data-astro-cid-sckkx6r4> <head><meta charset="UTF-8"><meta name="description" content="Astro description"><meta name="viewport" content="width=device-width"><link rel="icon" type="image/svg+xml" href="/favicon.svg"><meta name="generator"', "><title>", '</title><script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"><\/script>', '</head> <body data-astro-cid-sckkx6r4> <!-- Page Preloder --> <div id="preloder" data-astro-cid-sckkx6r4> <div class="loader" data-astro-cid-sckkx6r4></div> </div> <div class="offcanvas-menu-overlay" data-astro-cid-sckkx6r4></div> <!--  <OffcanvasMenu client:load/>  --> ', " ", ' <!--<CartFlyout client:load /> --> <div id="parent-div" data-astro-cid-sckkx6r4>Target here</div> ', ' <script src="https://code.jquery.com/jquery-3.7.0.min.js"><\/script> <!-- <CartFlyout client:load />   -->  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"><\/script>      </body> </html>  '])), addAttribute(Astro2.generator, "content"), title, renderHead(), renderComponent($$result, "Header", $$Header, { "data-astro-cid-sckkx6r4": true }), renderSlot($$result, $$slots["default"]), renderComponent($$result, "Footer2", $$Footer, { "data-astro-cid-sckkx6r4": true }));
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/Layout.astro", void 0);

const $$Astro$1b = createAstro();
const $$404 = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1b, $$props, $$slots);
  Astro2.self = $$404;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "404 not found" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<main> <h1>Page not found</h1> <ul role="list">There was an error locating the page</ul> </main> ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/404.astro", void 0);

const $$file$g = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/404.astro";
const $$url$g = "/404";

const _404 = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$404,
  file: $$file$g,
  url: $$url$g
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$1a = createAstro();
const $$About = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1a, $$props, $$slots);
  Astro2.self = $$About;
  return renderTemplate`${maybeRenderHead()}<section class="about spad"> <div class="container"> <div class="row"> <div class="col-lg-6 col-md-6"> <div class="about__text"> <div class="section-title"> <span>About Cake shop</span> <h2>Cakes and bakes from the house of Queens!</h2> </div> <p>The "Cake Shop" is a Jordanian Brand that started as a small family business. The owners are
                    Dr. Iyad Sultan and Dr. Sereen Sharabati, supported by a staff of 80 employees.</p> </div> </div> <div class="col-lg-6 col-md-6"> <div class="about__bar"> <div class="about__bar__item"> <p>Cake design</p> <div id="bar1" class="barfiller"> <div class="tipWrap" style="display: inline;"><span class="tip" style="left: 494.271px; transition: left 2s ease-in-out 0s;">95%</span></div> <span class="fill" data-percentage="95" style="background: rgb(17, 17, 17); width: 527.25px; transition: width 2s ease-in-out 0s;"></span> </div> </div> <div class="about__bar__item"> <p>Cake Class</p> <div id="bar2" class="barfiller"> <div class="tipWrap" style="display: inline;"><span class="tip" style="left: 409.031px; transition: left 2s ease-in-out 0s;">80%</span></div> <span class="fill" data-percentage="80" style="background: rgb(17, 17, 17); width: 444px; transition: width 2s ease-in-out 0s;"></span> </div> </div> <div class="about__bar__item"> <p>Cake Recipes</p> <div id="bar3" class="barfiller"> <div class="tipWrap" style="display: inline;"><span class="tip" style="left: 464.938px; transition: left 2s ease-in-out 0s;">90%</span></div> <span class="fill" data-percentage="90" style="background: rgb(17, 17, 17); width: 499.5px; transition: width 2s ease-in-out 0s;"></span> </div> </div> </div> </div> </div> </div> </section>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/about.astro", void 0);

const $$file$f = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/about.astro";
const $$url$f = "/about";

const about = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$About,
  file: $$file$f,
  url: $$url$f
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$19 = createAstro();
const partial$2 = true;
const $$Cart$1 = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$19, $$props, $$slots);
  Astro2.self = $$Cart$1;
  return renderTemplate`${maybeRenderHead()}<h4>Item added to Cart successfully</h4> <!--<router-view />  -->`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/api/cart.astro", void 0);

const $$file$e = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/api/cart.astro";
const $$url$e = "/api/cart";

const cart$2 = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Cart$1,
  file: $$file$e,
  partial: partial$2,
  url: $$url$e
}, Symbol.toStringTag, { value: 'Module' }));

const post = async ({
  request
}) => {
  const result = await request.formData();
  if (result) {
    return new Response(null, {
      status: 200
    });
  } else {
    return new Response(JSON.stringify({
      message: "Data is mal-form-ed (hehe)"
    }), {
      status: 400
    });
  }
};

const checkout = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  post
}, Symbol.toStringTag, { value: 'Module' }));

const ShoppingCart = [{
  id: 1,
  name: "Apple",
  price: 0.59,
  qty: 4
}, {
  id: 2,
  name: "Shampoo",
  price: 1.2,
  qty: 3
}, {
  id: 3,
  name: "Wholemeal bread",
  price: 0.75,
  qty: 1
}, {
  id: 4,
  name: "Dozen eggs - large",
  price: 2.95,
  qty: 2
}, {
  id: 5,
  name: "Large mayonnaise",
  price: 1.43,
  qty: 100
}];

const schema = createSchema({
  typeDefs: `
    type CartItem {
      id: Int!
      name: String!
      price: Float!
      qty: Int!
    }
    type Query {
      cart: [CartItem!]
    }    
  `,
  resolvers: {
    Query: {
      cart: () => ShoppingCart
    }
  }
});
const {
  handleRequest
} = createYoga({
  schema,
  graphqlEndpoint: "/api/graphql",
  fetchAPI: {
    Request,
    Response
  }
});
const POST = async (context) => {
  const {
    request
  } = context;
  return handleRequest(request, context);
};

const graphql = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  POST
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$18 = createAstro();
const $$Cart = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$18, $$props, $$slots);
  Astro2.self = $$Cart;
  return renderTemplate`<template></template>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/cart.astro", void 0);

const $$file$d = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/cart.astro";
const $$url$d = "/cart";

const cart$1 = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Cart,
  file: $$file$d,
  url: $$url$d
}, Symbol.toStringTag, { value: 'Module' }));

const {
  PUBLIC_GRAPHQL_URL
} = Object.assign({"PUBLIC_GRAPHQL_URL": "http://yiiwp.local/wordpress/graphql", "PUBLIC_GRAPHQL_URL_NM": "http://crater.local/graphql", "PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL": "https://via.placeholder.com/500", "PUBLIC_CURRENCY": "NOK", "PUBLIC_CURRENCY_LOCALE": "nb-NO", "PUBLIC_ALGOLIA_INDEX_NAME": "change me", "BASE_URL": "/", "MODE": "production", "DEV": false, "PROD": true, "SSR": true, "SITE": undefined, "ASSETS_PREFIX": undefined}, { PUBLIC: process.env.PUBLIC });
const client = new ApolloClient({
  uri: PUBLIC_GRAPHQL_URL,
  cache: new InMemoryCache()
});

const _export_sfc = (sfc, props) => {
  const target = sfc.__vccOpts || sfc;
  for (const [key, val] of props) {
    target[key] = val;
  }
  return target;
};

const _sfc_main$a = {
  __name: 'ViewAllCategories',
  props: ["catData"],
  setup(__props, { expose: __expose }) {
  __expose();



const __returned__ = {  };
Object.defineProperty(__returned__, '__isScriptSetup', { enumerable: false, value: true });
return __returned__
}

};

function _sfc_ssrRender$a(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  if ($props.catData) {
    _push(`<div${ssrRenderAttrs(_attrs)}><div class="categories"><div class="container"><div class="row"><div class="categories__slider owl-carousel"><!--[-->`);
    ssrRenderList($props.catData, (nodes) => {
      _push(`<!--[--><!--[-->`);
      ssrRenderList(nodes, (category) => {
        _push(`<!--[-->`);
        if (category.slug !== undefined) {
          _push(`<div class="categories__item"><a class="text-black cursor-pointer hover:underline"${
            ssrRenderAttr("href", `/category/${category.slug}`)
          }><div class="categories__item__icon"><span class="flaticon-030-cupcake-2"></span><h5>${
            ssrInterpolate(category.name)
          }</h5></div></a></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<!--]-->`);
      });
      _push(`<!--]--><!--]-->`);
    });
    _push(`<!--]--></div></div></div></div></div>`);
  } else {
    _push(`<!---->`);
  }
}
const _sfc_setup$a = _sfc_main$a.setup;
_sfc_main$a.setup = (props, ctx) => {
  const ssrContext = useSSRContext()
  ;(ssrContext.modules || (ssrContext.modules = new Set())).add("src/components/Category/ViewAllCategories.vue");
  return _sfc_setup$a ? _sfc_setup$a(props, ctx) : undefined
};
const ViewAllCategories = /*#__PURE__*/_export_sfc(_sfc_main$a, [['ssrRender',_sfc_ssrRender$a]]);

const $$Astro$17 = createAstro();
const $$Categories = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$17, $$props, $$slots);
  Astro2.self = $$Categories;
  const variables = { limit: 99 };
  const { data, loading } = await client.query({
    query: gql`
     {
      productCategories(first: 20) {
        nodes {
          id
          databaseId
          name
          slug
        }
      }
    }  
`,
    variables
  });
  console.log(data.productCategories);
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "Categories" }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "ViewAllCategories", ViewAllCategories, { "catData": data.productCategories, "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Category/ViewAllCategories.vue", "client:component-export": "default" })} ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/categories.astro", void 0);

const $$file$c = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/categories.astro";
const $$url$c = "/categories";

const categories = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Categories,
  file: $$file$c,
  url: $$url$c
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$16 = createAstro();
const $$Banner = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$16, $$props, $$slots);
  Astro2.self = $$Banner;
  return renderTemplate`${maybeRenderHead()}<section class="banner_area"> <div class="container"> <div class="banner_text"> <h3>Shop</h3> <ul> <li><a href="index.html">Home</a></li> <li><a href="shop.html">Shop</a></li> </ul> </div> </div> </section>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/Banner.astro", void 0);

const $$Astro$15 = createAstro();
const $$LeftMenu = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$15, $$props, $$slots);
  Astro2.self = $$LeftMenu;
  return renderTemplate`${maybeRenderHead()}<div class="product_left_sidebar"> <aside class="left_sidebar search_widget"> <div class="input-group"> <input type="text" class="form-control" placeholder="Enter Search Keywords"> <div class="input-group-append"> <button class="btn" type="button"> <i class="icon icon-Search"></i> </button> </div> </div> </aside> <aside class="left_sidebar p_catgories_widget"> <div class="p_w_title"> <h3>Product Categories</h3> </div> <ul class="list_style"> <li><a href="#">Cupcake (17)</a></li> <li><a href="#">Chocolate (15)</a></li> <li><a href="#">Celebration (14)</a></li> <li><a href="#">Wedding Cake (8)</a></li> <li><a href="#">Desserts (11)</a></li> </ul> </aside> <aside class="left_sidebar p_price_widget"> <div class="p_w_title"> <h3>Filter By Price</h3> </div> <div class="filter_price"> <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"> <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 2%; width: 48%"></div> <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 2%"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 50%"></span> </div> <label for="amount">Price range:</label> <input type="text" id="amount" readonly=""> <a href="#">Filter</a> </div> </aside> <aside class="left_sidebar p_sale_widget"> <div class="p_w_title"> <h3>Top Sale Products</h3> </div> <div class="media"> <div class="d-flex"> <img src="img/product/sale-product/s-product-1.jpg" alt=""> </div> <div class="media-body"> <a href="#"><h4>Brown Cake</h4></a> <ul class="list_style"> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> </ul> <h5>$29</h5> </div> </div> <div class="media"> <div class="d-flex"> <img src="img/product/sale-product/s-product-2.jpg" alt=""> </div> <div class="media-body"> <a href="#"><h4>Brown Cake</h4></a> <ul class="list_style"> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> </ul> <h5>$29</h5> </div> </div> <div class="media"> <div class="d-flex"> <img src="img/product/sale-product/s-product-3.jpg" alt=""> </div> <div class="media-body"> <a href="#"><h4>Brown Cake</h4></a> <ul class="list_style"> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> </ul> <h5>$29</h5> </div> </div> <div class="media"> <div class="d-flex"> <img src="img/product/sale-product/s-product-4.jpg" alt=""> </div> <div class="media-body"> <a href="#"><h4>Brown Cake</h4></a> <ul class="list_style"> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> <li> <a href="#"><i class="fa fa-star-o"></i></a> </li> </ul> <h5>$29</h5> </div> </div> </aside> </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/LeftMenu.astro", void 0);

var __freeze = Object.freeze;
var __defProp = Object.defineProperty;
var __template = (cooked, raw) => __freeze(__defProp(cooked, "raw", { value: __freeze(raw || cooked.slice()) }));
var _a;
const $$Astro$14 = createAstro();
const $$ShopFilter = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$14, $$props, $$slots);
  Astro2.self = $$ShopFilter;
  return renderTemplate(_a || (_a = __template(["", `<div class="row m0 product_task_bar"> <div class="product_task_inner"> <div class="float-left"> <a class="active" href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a> <span>Showing 1 - 10 of 55 results</span> </div> <div class="float-right"> <h4>Sort by :</h4> <select class="short" style="display: none"> <option data-display="Default">Default</option> <option value="1">Default</option> <option value="2">Default</option> <option value="4">Default</option> </select> <div class="nice-select short" tabindex="0"> <span class="current">Default</span> <ul class="list"> <li data-value="Default" data-display="Default" class="option selected">
Default
</li> <li data-value="1" class="option">Default</li> <li data-value="2" class="option">Default</li> <li data-value="4" class="option">Default</li> </ul> </div> </div> </div> </div> <script setup>
   /* $(document).ready(function() {
	  $('.product_select, .short').niceSelect();
	});*/
<\/script>`])), maybeRenderHead());
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/ShopFilter.astro", void 0);

const $$Astro$13 = createAstro();
const $$ShopLayout = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$13, $$props, $$slots);
  Astro2.self = $$ShopLayout;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, {}, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Banner", $$Banner, {})} ${maybeRenderHead()}<section class="product_area p_100"> <div class="container"> <div class="row product_inner_row"> <div class="col-lg-9"> ${renderComponent($$result2, "ShopFilter", $$ShopFilter, {})} <div class="row product_item_inner"> ${renderSlot($$result2, $$slots["default"])} </div> </div> <div class="col-lg-3"> ${renderComponent($$result2, "LeftMenu", $$LeftMenu, {})} </div> </div> </div> </section> ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/layouts/ShopLayout.astro", void 0);

const _sfc_main$9 = {
  __name: "ProductImage",
  props: {
    alt: { type: String, required: true },
    src: { type: String, required: true },
    width: { type: String, required: false },
    height: { type: String, required: false }
  },
  setup(__props, { expose: __expose }) {
    __expose();
    const props = __props;
    const { PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL } = Object.assign({"PUBLIC_GRAPHQL_URL": "http://yiiwp.local/wordpress/graphql", "PUBLIC_GRAPHQL_URL_NM": "http://crater.local/graphql", "PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL": "https://via.placeholder.com/500", "PUBLIC_CURRENCY": "NOK", "PUBLIC_CURRENCY_LOCALE": "nb-NO", "PUBLIC_ALGOLIA_INDEX_NAME": "change me", "BASE_URL": "/", "MODE": "production", "DEV": false, "PROD": true, "SSR": true, "SITE": undefined, "ASSETS_PREFIX": undefined}, { PUBLIC: process.env.PUBLIC });
    const displayedImage = computed(() => {
      return props.src || PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL;
    });
    const __returned__ = { props, PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL, displayedImage, computed };
    Object.defineProperty(__returned__, "__isScriptSetup", { enumerable: false, value: true });
    return __returned__;
  }
};
function _sfc_ssrRender$9(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "cake_img" }, _attrs))}><img${ssrRenderAttr("alt", $props.alt)}${ssrRenderAttr("src", $setup.displayedImage)}${ssrRenderAttr("width", $props.width)}${ssrRenderAttr("height", $props.height)}></div>`);
}
const _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("src/components/Products/ProductImage.vue");
  return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
const ProductImage = /* @__PURE__ */ _export_sfc(_sfc_main$9, [["ssrRender", _sfc_ssrRender$9]]);

/**
 * Checks if the given data object has any variations by accessing the product's variations nodes array.
 *
 * @param {Object} data - The data object to check for variations
 * @return {Boolean} Returns true if there are any variations, false otherwise.
 */
function hasVariations(data) {
  // Use optional chaining to access the nodes array safely, and nullish coalescing to default to an empty array
  const variationsNodes = data?.product?.variations?.nodes ?? [];
  return variationsNodes.length > 0;
}

/**
 * Formats a given price into a string with a currency symbol and locale.
 *
 * @param {string} price - The price to format.
 * @param {string} currency - The currency to use. Defaults to "NOK".
 * @param {string} currencyLocale - The locale to use for the currency symbol. Defaults to "nb-NO".
 * @return {string} The formatted price as a string with the currency symbol and locale.
 */
function formatPrice(price, currency, currencyLocale) {
  // Set default values
  const currencyPrice = currency || "NOK";
  const currencySymbol = currencyLocale || "nb-NO";
  if (!price) {
    return;
  }

  // Convert the price string to a numerical float value
  const numericPrice = parseFloat(price.replace(/[^\d.]/g, ""));
  return new Intl.NumberFormat(currencySymbol, {
    style: "currency",
    currency: currencyPrice,
    minimumFractionDigits: 0,
    maximumFractionDigits: 0
  }).format(numericPrice);
}

/**
 * Strips HTML from the inputted string
 * @param {String} description Input text to strip HTML from
 */
function stripHTML(string) {
  return string.replace(/<\/?[^>]+(>|$)/gi, "");
}

/**
 * Filter variant price. Changes "kr198.00 - kr299.00" to kr299.00 or kr198 depending on the side variable
 * @param {String} side Which side of the string to return (which side of the "-" symbol)
 * @param {String} price The inputted price that we need to convert
 */
const filteredVariantPrice = (price, side) => {
  if (side === "right") {
    return price.substring(price.length, price.indexOf("-")).replace("-", "");
  }
  return price.substring(0, price.indexOf("-")).replace("-", "");
};

const _sfc_main$8 = {
  __name: 'ProductPrice',
  props: {
  product: Object,
  priceFontSize: String,
  shouldCenterPrice: Boolean,
},
  setup(__props, { expose: __expose }) {
  __expose();

/**
 * Displays the price of a product, with support for sale prices and variations.
 *
 * @param {Object} props - The component props.
 * @param {Object} props.product - The product to display the price for.
 * @param {string} [props.priceFontSize="normal"] - The font size for the price display.
 * @param {boolean} [props.shouldCenterPrice=false] - Whether to center the price display.
 */
const props = __props;

const onSale = computed(() => props.product.onSale);

const productHasVariations = computed(() => hasVariations(props.product));

const basePrice = computed(() => {
  if (productHasVariations.value) {
    return filteredVariantPrice(props.product.price);
  } else {
    return props.product.regularPrice;
  }
});

const displayPrice = computed(() => {
  if (onSale.value) {
    return productHasVariations.value
      ? filteredVariantPrice(props.product.price)
      : props.product.salePrice;
  } else {
    return props.product.price;
  }
});

const getFontSizeClass = computed(() => {
  switch (props.priceFontSize) {
    case "small":
      return "text-lg";
    case "normal":
      return "text-2xl";
    case "big":
      return "text-2xl";
    default:
      return "text-xl";
  }
});

const getSaleFontSizeClass = computed(() => {
  switch (props.priceFontSize) {
    case "small":
      return "text-lg";
    case "normal":
      return "text-xl";
    case "big":
      return "text-xl";
    default:
      return "text-xl";
  }
});

const __returned__ = { props, onSale, productHasVariations, basePrice, displayPrice, getFontSizeClass, getSaleFontSizeClass, computed, get formatPrice() { return formatPrice }, get filteredVariantPrice() { return filteredVariantPrice }, get hasVariations() { return hasVariations } };
Object.defineProperty(__returned__, '__isScriptSetup', { enumerable: false, value: true });
return __returned__
}

};

function _sfc_ssrRender$8(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<div${ssrRenderAttrs(_attrs)}>`);
  if ($setup.onSale) {
    _push(`<div class="${
      ssrRenderClass([$props.shouldCenterPrice ? 'justify-center' : '', "flex"])
    }"><p class="${
      ssrRenderClass([$setup.getFontSizeClass, "pt-1 mt-4 text-gray-900"])
    }">${
      ssrInterpolate($setup.formatPrice($setup.displayPrice))
    }</p><p class="${
      ssrRenderClass([$setup.getSaleFontSizeClass, "pt-1 pl-4 mt-4 text-gray-900 line-through"])
    }">${
      ssrInterpolate($setup.formatPrice($setup.basePrice))
    }</p></div>`);
  } else {
    _push(`<p class="${
      ssrRenderClass([$props.shouldCenterPrice ? 'justify-center' : '', "flex pt-1 mt-4 text-2xl text-gray-900"])
    }">${
      ssrInterpolate($setup.formatPrice($setup.displayPrice))
    }</p>`);
  }
  _push(`</div>`);
}
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext()
  ;(ssrContext.modules || (ssrContext.modules = new Set())).add("src/components/Products/ProductPrice.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : undefined
};
const ProductPrice = /*#__PURE__*/_export_sfc(_sfc_main$8, [['ssrRender',_sfc_ssrRender$8]]);

const _sfc_main$7 = {
  __name: "ShowProductsInCategory",
  props: ["allProducts"],
  setup(__props, { expose: __expose }) {
    __expose();
    const { PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL } = Object.assign({"PUBLIC_GRAPHQL_URL": "http://yiiwp.local/wordpress/graphql", "PUBLIC_GRAPHQL_URL_NM": "http://crater.local/graphql", "PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL": "https://via.placeholder.com/500", "PUBLIC_CURRENCY": "NOK", "PUBLIC_CURRENCY_LOCALE": "nb-NO", "PUBLIC_ALGOLIA_INDEX_NAME": "change me", "BASE_URL": "/", "MODE": "production", "DEV": false, "PROD": true, "SSR": true, "SITE": undefined, "ASSETS_PREFIX": undefined}, { PUBLIC: process.env.PUBLIC });
    const productLink = (product) => {
      return {
        path: "/products/" + product.slug,
        query: { id: product.databaseId }
      };
    };
    const productImage = (product) => product.image ? product.image.sourceUrl : PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL;
    const __returned__ = { PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL, productLink, productImage, ProductImage, ProductPrice };
    Object.defineProperty(__returned__, "__isScriptSetup", { enumerable: false, value: true });
    return __returned__;
  }
};
function _sfc_ssrRender$7(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "row product_item_inner" }, _attrs))}><!--[-->`);
  ssrRenderList($props.allProducts, (product) => {
    _push(`<div class="col-lg-4 col-md-4 col-6"><div class="cake_feature_item">`);
    _push(ssrRenderComponent($setup["ProductImage"], {
      alt: product.name,
      src: $setup.productImage(product),
      width: 270
    }, null, _parent));
    _push(`<div class="cake_text">`);
    _push(ssrRenderComponent($setup["ProductPrice"], {
      product,
      priceFontSize: "normal",
      shouldCenterPrice: true
    }, null, _parent));
    _push(`<h3><a class=""${ssrRenderAttr("href", `/products/${product.productId}/${product.slug}`)}>${ssrInterpolate(product.name)}</a></h3><button${ssrRenderAttr("data-product-id", product.databaseId)}>Add to Cart</button></div></div></div>`);
  });
  _push(`<!--]--></div>`);
}
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("src/components/Category/ShowProductsInCategory.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const ShowProductsInCategory = /* @__PURE__ */ _export_sfc(_sfc_main$7, [["ssrRender", _sfc_ssrRender$7]]);

async function getAllCategories() {
  const variables = {
    limit: 99
  };
  const {
    data,
    loading
  } = await client.query({
    query: gql`
     {
      productCategories(first: 20) {
        nodes {
          id
          databaseId
          name
          slug
        }
      }
    }  
`,
    variables
  });
  return data.productCategories;
}

async function getProductsFromCategory(tag, key) {
  console.log(typeof tag);
  const categoryVariables = {
    slug: tag,
    dbId: key
  };
  const {
    data: allCategoryProducts
  } = await client.query({
    query: gql`
      query ProductsFromCategory($slug:ID!, $dbId: Int) {
        productCategory(id: $slug, idType: ID) {
          id
          name
          products(where: { categoryId: $dbId}) {
            nodes {
              id
              productId: databaseId
              averageRating
              slug
              description
              name
              image {
                id
                uri
                title
                srcSet
                sourceUrl
              }
              ... on SimpleProduct {
                price
                regularPrice
                id
              }
              ... on VariableProduct {
                price
                regularPrice
                id
              }
              ... on ExternalProduct {
                price
                id
                regularPrice
                externalUrl
              }
              ... on GroupProduct {
                products {
                  nodes {
                    ... on SimpleProduct {
                      id
                      regularPrice
                      price
                    }
                  }
                }
                id
              }
            }
          }
        }
      }
    `,
    variables: categoryVariables
  });
  return allCategoryProducts;
}

async function getAllProductPaths() {
  const groups = await getAllCategories();
  const paths = [];
  for (const group of groups.nodes) {
    console.log("loop");
    const catProducts = await getProductsFromCategory(group.id, group.databaseId);
    console.log(catProducts);
    console.log("*********\n");
    console.log([group.slug, catProducts.productCategory.products.nodes.length].join(" and "));
    paths.push({
      params: {
        slug: group.slug
      },
      props: {
        catProducts
      }
    });
  }
  return paths;
}

const $$Astro$12 = createAstro();
async function getStaticPaths$1() {
  const paths = await getAllProductPaths();
  console.log(paths);
  return paths;
}
const $$slug$1 = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$12, $$props, $$slots);
  Astro2.self = $$slug$1;
  Object.assign({"PUBLIC_GRAPHQL_URL": "http://yiiwp.local/wordpress/graphql", "PUBLIC_GRAPHQL_URL_NM": "http://crater.local/graphql", "PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL": "https://via.placeholder.com/500", "PUBLIC_CURRENCY": "NOK", "PUBLIC_CURRENCY_LOCALE": "nb-NO", "PUBLIC_ALGOLIA_INDEX_NAME": "change me", "BASE_URL": "/", "MODE": "production", "DEV": false, "PROD": true, "SSR": true, "SITE": undefined, "ASSETS_PREFIX": undefined}, { Path: process.env.Path, PUBLIC: process.env.PUBLIC });
  const { id, slug } = Astro2.params;
  const { catProducts } = Astro2.props;
  console.log(catProducts.productCategory?.products?.nodes.length);
  const products = catProducts.productCategory?.products?.nodes || // ||  allProducts.products?.nodes
  [];
  return renderTemplate`<!--
<Layout title="Categories">
    <ViewAllCategories catData={groups} client:load />
</Layout>
 -->${renderComponent($$result, "ShopLayout", $$ShopLayout, { "title": "Products" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<h1 class="text-3xl text-center font-bold p-6">All ${slug}</h1> ${renderComponent($$result2, "ShowProductsInCategory", ShowProductsInCategory, { "allProducts": products, "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Category/ShowProductsInCategory.vue", "client:component-export": "default" })} ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/category/[slug].astro", void 0);
const $$file$b = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/category/[slug].astro";
const $$url$b = "/category/[slug]";

const _slug_$1 = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$slug$1,
  file: $$file$b,
  getStaticPaths: getStaticPaths$1,
  url: $$url$b
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$11 = createAstro();
const $$Error = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$11, $$props, $$slots);
  Astro2.self = $$Error;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "Error page" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<main> <h1>Error page</h1> <ul role="list">There was an error processing the order</ul> </main> ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/error.astro", void 0);

const $$file$a = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/error.astro";
const $$url$a = "/error";

const error$1 = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Error,
  file: $$file$a,
  url: $$url$a
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$10 = createAstro();
const $$Menu = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$10, $$props, $$slots);
  Astro2.self = $$Menu;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "Search" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<main> <h1 class="text-center text-3xl font-bold p-4">Search</h1> <div id="app"> ${renderComponent($$result2, "router-view", "router-view", {})} </div> </main> ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/menu.astro", void 0);

const $$file$9 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/menu.astro";
const $$url$9 = "/menu";

const menu = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Menu,
  file: $$file$9,
  url: $$url$9
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$$ = createAstro();
const partial$1 = true;
const $$Bakes = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$$, $$props, $$slots);
  Astro2.self = $$Bakes;
  return renderTemplate`${maybeRenderHead()}<h1 class="text-center text-3xl font-bold p-4">Search</h1> <div id="app"> ${renderComponent($$result, "router-view", "router-view", {})} </div> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/partials/bakes.astro", void 0);

const $$file$8 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/partials/bakes.astro";
const $$url$8 = "/partials/bakes";

const bakes = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Bakes,
  file: $$file$8,
  partial: partial$1,
  url: $$url$8
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$_ = createAstro();
const partial = true;
const $$Clicked = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$_, $$props, $$slots);
  Astro2.self = $$Clicked;
  Astro2.url.searchParams.get("user_input");
  return renderTemplate`${maybeRenderHead()}<div>I was clicked! ${"No user input provided."}</div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/partials/clicked.astro", void 0);

const $$file$7 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/partials/clicked.astro";
const $$url$7 = "/partials/clicked";

const clicked = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Clicked,
  file: $$file$7,
  partial,
  url: $$url$7
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$Z = createAstro();
const $$Pricelist = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$Z, $$props, $$slots);
  Astro2.self = $$Pricelist;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "Menu" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<main> <!--================End Main Header Area =================--> <section class="banner_area" style="margin-top:135px;"> <div class="container"> <div class="banner_text"> <h3>Menu &#128073; &#127874; &#x20B9;</h3> <ul> <li><a href="index.html">Home</a></li> <li><a href="menu.html">Menu</a></li> </ul> </div> </div> </section> <!--================End Main Header Area =================--> <!--================Recipe Menu list Area =================--> <section class="price_list_area p_100"> <div class="container"> <div class="price_list_inner"> <div class="single_pest_title"> <h2>Our Price List</h2> <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> </div> <div class="row"> <div class="col-lg-6"> <div class="discover_item_inner"> <div class="discover_item"> <h4>Double Chocolate Pie</h4> <p>Chocolate puding, vanilla, fruite rasberry jam milk <span>&#x20B9;8.99</span></p> </div> <div class="discover_item"> <h4>Zabaglione Cake</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;12.99</span></p> </div> <div class="discover_item"> <h4>Blueberry Muffin</h4> <p>Chocolate puding, vanilla, fruite rasberry jam milk <span>&#x20B9;8.99</span></p> </div> <div class="discover_item"> <h4>Box of Delight</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;7.99</span></p> </div> <div class="discover_item"> <h4>Classic French Croissant</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;6.79</span></p> </div> <div class="discover_item"> <h4>Macarons & Tea</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;5.99</span></p> </div> <div class="discover_item"> <h4>Strawberry Sweet Cake</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;12.99</span></p> </div> <div class="discover_item"> <h4>Cupcake of Vanela</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;20.00</span></p> </div> </div> </div> <div class="col-lg-6"> <div class="discover_item_inner"> <div class="discover_item"> <h4>Fried Egg Sandwich</h4> <p>Chocolate puding, vanilla, fruite rasberry jam milk <span>&#x20B9;8.99</span></p> </div> <div class="discover_item"> <h4>Multigrain Hot Cake</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;12.99</span></p> </div> <div class="discover_item"> <h4>Branch Special Cake</h4> <p>Chocolate puding, vanilla, fruite rasberry jam milk <span>&#x20B9;8.99</span></p> </div> <div class="discover_item"> <h4>Bialy Egg Sandwich with Cake</h4> <p>Chocolate puding, vanilla, fruite rasberry jam milk <span>&#x20B9;7.99</span></p> </div> <div class="discover_item"> <h4>Strawberry Sweet Cake</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;6.79</span></p> </div> <div class="discover_item"> <h4>Double Chocolate Pie</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;5.99</span></p> </div> <div class="discover_item"> <h4>Blueberry Muffin</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;12.99</span></p> </div> <div class="discover_item"> <h4>Classic Chocolate Cake</h4> <p>Chocolate puding, vanilla, fruite rasberry jam evporate milk <span>&#x20B9;20.00</span></p> </div> </div> </div> </div> <div class="row our_bakery_image"> <div class="col-md-4 col-6"> <img class="img-fluid" src="/images/our-bakery/bakery-1.jpg" alt=""> </div> <div class="col-md-4 col-6"> <img class="img-fluid" src="/images/our-bakery/bakery-2.jpg" alt=""> </div> <div class="col-md-4 col-6"> <img class="img-fluid" src="/images/our-bakery/bakery-3.jpg" alt=""> </div> </div> </div> </div> </section> <!--================End Main Header Area =================--> <!--================Newsletter Area =================--> <section class="newsletter_area"> <div class="container"> <div class="row newsletter_inner"> <div class="col-lg-6"> <div class="news_left_text"> <h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4> </div> </div> <div class="col-lg-6"> <div class="newsletter_form"> <div class="input-group"> <input type="text" class="form-control" placeholder="Enter your email address"> <div class="input-group-append"> <button class="btn btn-outline-secondary" type="button">Subscribe Now</button> </div> </div> </div> </div> </div> </div> </section> <!--================End Newsletter Area =================--> </main> ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/pricelist.astro", void 0);

const $$file$6 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/pricelist.astro";
const $$url$6 = "/pricelist";

const pricelist = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Pricelist,
  file: $$file$6,
  url: $$url$6
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$Y = createAstro();
const $$Detail = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$Y, $$props, $$slots);
  Astro2.self = $$Detail;
  const { id } = Astro2.params;
  return renderTemplate`${maybeRenderHead()}<h1>Product Detail: ${{ id }}</h1>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/products/detail.astro", void 0);

const $$file$5 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/products/detail.astro";
const $$url$5 = "/products/detail";

const detail = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Detail,
  file: $$file$5,
  url: $$url$5
}, Symbol.toStringTag, { value: 'Module' }));

const cartItems = map({});
function addProductToCart({
  id,
  name,
  imageSrc
}) {
  const existingEntry = cartItems.get()[id];
  if (existingEntry) {
    cartItems.setKey(id, {
      ...existingEntry,
      quantity: existingEntry.quantity + 1
    });
  } else {
    cartItems.setKey(id, {
      id,
      name,
      imageSrc,
      quantity: 1
    });
  }
}

//provideApolloClient(client);
const ADD_TO_CART_MUTATION = gql`
mutation ($input: AddToCartInput!) {
    addToCart(input: $input) {
      cartItem {
        key
        product {
          id
          databaseId
          name
          description
          type
          onSale
          slug
          averageRating
          reviewCount
          image {
            id
            sourceUrl
            altText
          }
          galleryImages {
            nodes {
              id
              sourceUrl
              altText
            }
          }
        }
        variation {
          id
          databaseId
          name
          description
          type
          onSale
          price
          regularPrice
          salePrice
          image {
            id
            sourceUrl
            altText
          }
          attributes {
            nodes {
              id
              attributeId
              name
              value
            }
          }
        }
        quantity
        total
        subtotal
        subtotalTax
      }
    }
  }
`;
const {
  mutate,
  onDone,
  onError,
  error
} = useMutation(ADD_TO_CART_MUTATION);
function addToCart(product) {
  try {
    mutate({
      input: product
    });
    onDone(data => {
      //formNav.next()
      console.log('data', data);
    });
    onError(() => {
      console.error(error.value);
    });
  } catch (error) {
    console.error(error);
  }
}

/*export async function addToCart(product) {
  
  const data = await mutate({
    variables:{ input: product }
});
  return data?.addToCart;
}  */

const _sfc_main$6 = {
  __name: "AddToCartButton",
  props: ["product"],
  setup(__props, { expose: __expose }) {
    __expose();
    const state = reactive({ loading: false });
    const props = __props;
    const hardcodedItemInfo = {
      id: "astronaut-figurine",
      name: "Astronaut Figurine",
      imageSrc: "/images/astronaut-figurine.png"
    };
    const addProduct = (product) => {
      state.loading = true;
      const productId = product.databaseId ? product.databaseId : product;
      const productQueryInput = {
        productId
      };
      try {
        addToCart(productQueryInput).then((result) => {
          state.loading = false;
          if (!result) {
            localStorage.clear();
          }
        });
        addProductToCart(hardcodedItemInfo);
      } catch (e) {
        state.loading = false;
      }
    };
    const __returned__ = { state, props, hardcodedItemInfo, addProduct, reactive, get addProductToCart() {
      return addProductToCart;
    }, get addToCart() {
      return addToCart;
    } };
    Object.defineProperty(__returned__, "__isScriptSetup", { enumerable: false, value: true });
    return __returned__;
  }
};
function _sfc_ssrRender$6(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<div${ssrRenderAttrs(_attrs)} data-v-b0679add><button class="${ssrRenderClass([{ disabled: $setup.state.loading }, "relative w-48 h-12 px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-800"])}" data-v-b0679add> ADD TO CART `);
  if ($setup.state.loading) {
    _push(`<svg class="absolute -mt-6 -ml-2 animate-spin" width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-b0679add><path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM4.14355 13.5165C4.85219 17.2096 8.10023 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.0886 4 4.83283 6.80704 4.13728 10.5165L6.72824 10.5071C7.37819 8.20738 9.49236 6.52222 12.0001 6.52222C15.0254 6.52222 17.4779 8.9747 17.4779 12C17.4779 15.0253 15.0254 17.4778 12.0001 17.4778C9.49752 17.4778 7.3869 15.7995 6.73228 13.5071L4.14355 13.5165ZM9.52234 12C9.52234 13.3684 10.6317 14.4778 12.0001 14.4778C13.3685 14.4778 14.4779 13.3684 14.4779 12C14.4779 10.6316 13.3685 9.52222 12.0001 9.52222C10.6317 9.52222 9.52234 10.6316 9.52234 12Z" fill="white" data-v-b0679add></path></svg>`);
  } else {
    _push(`<!---->`);
  }
  _push(`</button></div>`);
}
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("src/components/Cart/AddToCartButton.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const AddToCartButton = /* @__PURE__ */ _export_sfc(_sfc_main$6, [["ssrRender", _sfc_ssrRender$6], ["__scopeId", "data-v-b0679add"]]);

const $$Astro$X = createAstro();
const $$Accordion = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$X, $$props, $$slots);
  Astro2.self = $$Accordion;
  const {
    flush,
    class: className,
    data = [],
    id: userId,
    alwaysOpen,
    headerClass,
    itemClass,
    bodyClass
  } = Astro2.props;
  const id = userId || `accordion-${nanoid(8)}`;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["accordion", className, { "accordion-flush": flush }], "class:list")}${addAttribute(id, "id")}> ${renderSlot($$result, $$slots["default"], renderTemplate` ${data && data.map((item, index) => renderTemplate`${renderComponent($$result, "Accordion.Item", Accordion.Item, { "class": itemClass }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Accordion.Header", Accordion.Header, { "parent": id, "index": index, "class": headerClass, "show": item.show }, { "default": ($$result3) => renderTemplate` ${renderComponent($$result3, "Fragment", Fragment, {}, { "default": ($$result4) => renderTemplate`${unescapeHTML(item.header)}` })} ` })} ${renderComponent($$result2, "Accordion.Body", Accordion.Body, { "parent": id, "index": index, "class": bodyClass, "show": item.show, "alwaysOpen": alwaysOpen }, { "default": ($$result3) => renderTemplate` ${renderComponent($$result3, "Fragment", Fragment, {}, { "default": ($$result4) => renderTemplate`${unescapeHTML(item.body)}` })} ` })} ` })}`)} `)} </div> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Accordion.astro", void 0);

const $$Astro$W = createAstro();
const $$AccordionBody = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$W, $$props, $$slots);
  Astro2.self = $$AccordionBody;
  const {
    parent: id,
    index: i,
    show,
    alwaysOpen = false,
    class: className,
    text
  } = Astro2.props;
  const dataBsParent = alwaysOpen ? null : `#${id}`;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(`${id}-collapse-${i}`, "id")}${addAttribute(["accordion-collapse", "collapse", { show }], "class:list")}${addAttribute(`${id}-heading-${i}`, "aria-labelledby")}${addAttribute(dataBsParent, "data-bs-parent")}> <div${addAttribute(["accordion-body", className], "class:list")}> ${renderSlot($$result, $$slots["default"], renderTemplate`${renderComponent($$result, "Fragment", Fragment, {}, { "default": ($$result2) => renderTemplate`${unescapeHTML(text)}` })}`)} </div> </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/AccordionBody.astro", void 0);

const $$Astro$V = createAstro();
const $$AccordionHeader = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$V, $$props, $$slots);
  Astro2.self = $$AccordionHeader;
  const { parent: id, class: className, index: i, show, text } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<h2${addAttribute(["accordion-header", className], "class:list")}${addAttribute(`${id}-heading-${i}`, "id")}> <button class="accordion-button" type="button" data-bs-toggle="collapse"${addAttribute(`#${id}-collapse-${i}`, "data-bs-target")}${addAttribute(show, "aria-expanded")}${addAttribute(`${id}-collapse-${i}`, "aria-controls")}> ${renderSlot($$result, $$slots["default"], renderTemplate`${renderComponent($$result, "Fragment", Fragment, {}, { "default": ($$result2) => renderTemplate`${unescapeHTML(text)}` })}`)} </button> </h2>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/AccordionHeader.astro", void 0);

const $$Astro$U = createAstro();
const $$AccordionItem = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$U, $$props, $$slots);
  Astro2.self = $$AccordionItem;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["accordion-item", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/AccordionItem.astro", void 0);

const Accordion = Object.assign($$Accordion, { Body: $$AccordionBody, Header: $$AccordionHeader, Item: $$AccordionItem });

const $$Astro$T = createAstro();
const $$Alert = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$T, $$props, $$slots);
  Astro2.self = $$Alert;
  const { variant, class: className, dismissable } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute([
    "alert",
    `alert-${variant}`,
    className,
    { "alert-dismissible": dismissable }
  ], "class:list")} role="alert"> <div>${renderSlot($$result, $$slots["default"])}</div> ${dismissable && renderTemplate`<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`} </div> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Alert.astro", void 0);

const $$Astro$S = createAstro();
const $$AlertHeading = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$S, $$props, $$slots);
  Astro2.self = $$AlertHeading;
  const { text, h = 4, class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["alert-heading", `h-${h}`, className], "class:list")}> ${renderSlot($$result, $$slots["default"], renderTemplate`${renderComponent($$result, "Fragment", Fragment, {}, { "default": ($$result2) => renderTemplate`${unescapeHTML(text)}` })}`)} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/AlertHeading.astro", void 0);

const $$Astro$R = createAstro();
const $$AlertLink = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$R, $$props, $$slots);
  Astro2.self = $$AlertLink;
  const { href, text, class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<a${addAttribute(href, "href")}${addAttribute(["alert-link", className], "class:list")}>${renderSlot($$result, $$slots["default"], renderTemplate`${renderComponent($$result, "Fragment", Fragment, {}, { "default": ($$result2) => renderTemplate`${unescapeHTML(text)}` })}`)}</a>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/AlertLink.astro", void 0);

Object.assign($$Alert, { Heading: $$AlertHeading, Link: $$AlertLink });

const items = (path) => {
  const slugs = path.split("/").filter((x) => x);
  let currentPath = "";
  const parts = [
    {
      text: "Home",
      href: path !== "/" ? "/" : void 0
    }
  ];
  slugs.forEach((slug) => {
    const text = slug.replace(/[-_]/g, " ");
    currentPath = `${currentPath}/${slug}`;
    const href = currentPath;
    parts.push({
      text: titleCase(text),
      href
    });
  });
  return parts;
};

const $$Astro$Q = createAstro();
const $$VanishLink = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$Q, $$props, $$slots);
  Astro2.self = $$VanishLink;
  const { href, class: className, text, ...props } = Astro2.props;
  let Tag = "";
  if (href) {
    Tag = "a";
  } else {
    Tag = "span";
  }
  return renderTemplate`${renderComponent($$result, "Tag", Tag, { "href": href, "class": className, ...props }, { "default": ($$result2) => renderTemplate`${renderSlot($$result2, $$slots["default"], renderTemplate`${text}`)}` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/utils/VanishLink.astro", void 0);

const $$Astro$P = createAstro();
const $$BreadcrumbItemIterate = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$P, $$props, $$slots);
  Astro2.self = $$BreadcrumbItemIterate;
  const { class: className } = Astro2.props;
  const path = Astro2.url.pathname;
  const parts = items(path);
  return renderTemplate`${parts.map(({ text, href }) => {
    const active = path === href;
    const link = active ? void 0 : href;
    return renderTemplate`${renderComponent($$result, "Breadcrumb.Item", Breadcrumb.Item, { "class": className, "active": active }, { "default": ($$result2) => renderTemplate`${renderComponent($$result2, "VanishLink", $$VanishLink, { "href": link, "class": className }, { "default": ($$result3) => renderTemplate`${text}` })}` })}`;
  })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/BreadcrumbItemIterate.astro", void 0);

const $$Astro$O = createAstro();
const $$Breadcrumb = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$O, $$props, $$slots);
  Astro2.self = $$Breadcrumb;
  const {
    id,
    class: className,
    itemClass,
    "aria-label": ariaLabel = "Breadcrumb"
  } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<nav${addAttribute(ariaLabel, "aria-label")}${addAttribute(id, "id")}> <ol class="breadcrumb"${addAttribute(className, "class")}> ${renderSlot($$result, $$slots["default"], renderTemplate` ${renderComponent($$result, "BreadcrumbItemIterate", $$BreadcrumbItemIterate, { "class": itemClass })} `)} </ol> </nav>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Breadcrumb.astro", void 0);

const $$Astro$N = createAstro();
const $$BreadcrumbItem = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$N, $$props, $$slots);
  Astro2.self = $$BreadcrumbItem;
  const { class: className, active } = Astro2.props;
  const ariaCurrent = active ? "page" : void 0;
  return renderTemplate`${maybeRenderHead()}<li${addAttribute(["breadcrumb-item", className, { active }], "class:list")}${addAttribute(ariaCurrent, "aria-current")}> ${renderSlot($$result, $$slots["default"])} </li>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/BreadcrumbItem.astro", void 0);

const Breadcrumb = Object.assign($$Breadcrumb, { Item: $$BreadcrumbItem });

const $$Astro$M = createAstro();
const $$Button = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$M, $$props, $$slots);
  Astro2.self = $$Button;
  const {
    class: className,
    dropdown = false,
    variant,
    text,
    size,
    modalClose = false
  } = Astro2.props;
  let props = {};
  if (dropdown) {
    props = { "data-bs-toggle": "dropdown", "aria-expanded": "false" };
  } else if (modalClose) {
    props = { "data-bs-dismiss": "modal" };
  }
  return renderTemplate`${maybeRenderHead()}<button${addAttribute([
    "btn",
    `btn-${variant}`,
    className,
    {
      "dropdown-toggle": dropdown,
      "btn-sm": size === "sm",
      "btn-lg": size === "lg"
    }
  ], "class:list")} type="button"${spreadAttributes(props)}> ${renderSlot($$result, $$slots["default"], renderTemplate`${text}`)} </button>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Button.astro", void 0);

const $$Astro$L = createAstro();
const $$Carousel = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$L, $$props, $$slots);
  Astro2.self = $$Carousel;
  const { id, class: className, dark, fade } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(id, "id")}${addAttribute([
    "carousel",
    "slide",
    className,
    { "carousel-dark": dark, "carousel-fade": fade }
  ], "class:list")} data-bs-ride="carousel"> ${renderSlot($$result, $$slots["default"])} </div> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Carousel.astro", void 0);

const $$Astro$K = createAstro();
const $$CarouselControl = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$K, $$props, $$slots);
  Astro2.self = $$CarouselControl;
  const { class: className, id, direction } = Astro2.props;
  const text = direction == "prev" ? "Previous" : "Next";
  return renderTemplate`${maybeRenderHead()}<button${addAttribute([className, `carousel-control-${direction}`], "class:list")} type="button"${addAttribute(`#${id}`, "data-bs-target")}${addAttribute(direction, "data-bs-slide")}> <span${addAttribute(`carousel-control-${direction}-icon`, "class")} aria-hidden="true"></span> <span class="visually-hidden">${text}</span> </button>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/CarouselControl.astro", void 0);

const $$Astro$J = createAstro();
const $$CarouselControls = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$J, $$props, $$slots);
  Astro2.self = $$CarouselControls;
  const { class: className, id } = Astro2.props;
  return renderTemplate`${renderComponent($$result, "CarouselControl", $$CarouselControl, { "id": id, "direction": "prev", "class": className })} ${renderComponent($$result, "CarouselControl", $$CarouselControl, { "id": id, "direction": "next", "class": className })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/CarouselControls.astro", void 0);

const $$Astro$I = createAstro();
const $$CarouselIndicator = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$I, $$props, $$slots);
  Astro2.self = $$CarouselIndicator;
  const {
    class: className,
    id,
    index,
    active,
    "aria-current": ariaCurrent,
    "aria-label": ariaLabel
  } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<button type="button"${addAttribute(`#${id}`, "data-bs-target")}${addAttribute(index, "data-bs-slide-to")}${addAttribute([className, { active }], "class:list")}${addAttribute(ariaCurrent, "aria-current")}${addAttribute(ariaLabel, "aria-label")}></button>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/CarouselIndicator.astro", void 0);

const $$Astro$H = createAstro();
const $$CarouselIndicators = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$H, $$props, $$slots);
  Astro2.self = $$CarouselIndicators;
  const { slides, class: className, id } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div class="carousel-indicators"> ${slides.map((slide, index) => {
    const ariaCurrent = slide.active ? "page" : void 0;
    return renderTemplate`${renderComponent($$result, "Carousel.Indicator", Carousel.Indicator, { "id": id, "index": index, "class": className, "aria-current": ariaCurrent, "aria-label": slide.alt, "active": slide.active })}`;
  })} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/CarouselIndicators.astro", void 0);

const $$Astro$G = createAstro();
const $$CarouselInner = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$G, $$props, $$slots);
  Astro2.self = $$CarouselInner;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["carousel-inner", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/CarouselInner.astro", void 0);

const $$Astro$F = createAstro();
const $$CarouselItem = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$F, $$props, $$slots);
  Astro2.self = $$CarouselItem;
  const { class: className, active } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["carousel-item", className, { active }], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/CarouselItem.astro", void 0);

const Carousel = Object.assign($$Carousel, {
  Controls: $$CarouselControls,
  Control: $$CarouselControl,
  Indicator: $$CarouselIndicator,
  Indicators: $$CarouselIndicators,
  Inner: $$CarouselInner,
  Item: $$CarouselItem
});

const $$Astro$E = createAstro();
const $$DropdownDivider = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$E, $$props, $$slots);
  Astro2.self = $$DropdownDivider;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<hr${addAttribute(["dropdown-divider", className], "class:list")}>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/DropdownDivider.astro", void 0);

const $$Astro$D = createAstro();
const $$ActiveLink = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$D, $$props, $$slots);
  Astro2.self = $$ActiveLink;
  const {
    href,
    class: className,
    disabled = false,
    activeClass = "active",
    disabledClass = "disabled",
    text,
    parent,
    ...props
  } = Astro2.props;
  let active = href === Astro2.url.pathname;
  const ariaCurrent = active ? "page" : void 0;
  const activeClassStr = active ? `${activeClass}` : void 0;
  const disabledClassStr = disabled ? disabledClass : void 0;
  const classCompiled = clsx([activeClassStr, disabledClassStr, className]);
  if (parent) {
    if (Astro2.url.pathname.includes(href)) {
      active = true;
    }
  }
  return renderTemplate`${renderComponent($$result, "VanishLink", $$VanishLink, { "href": disabled ? void 0 : href, "class": classCompiled, "aria-current": ariaCurrent, ...props }, { "default": ($$result2) => renderTemplate` ${renderSlot($$result2, $$slots["default"], renderTemplate`${text}`)} ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/utils/ActiveLink.astro", void 0);

const $$Astro$C = createAstro();
const $$DropdownItem = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$C, $$props, $$slots);
  Astro2.self = $$DropdownItem;
  const { href, text, class: className, ...props } = Astro2.props;
  return renderTemplate`${renderComponent($$result, "ActiveLink", $$ActiveLink, { "href": href, "class": ["dropdown-item", className], ...props }, { "default": ($$result2) => renderTemplate` ${renderSlot($$result2, $$slots["default"], renderTemplate`${text}`)} ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/DropdownItem.astro", void 0);

const $$Astro$B = createAstro();
const $$DropdownHeader = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$B, $$props, $$slots);
  Astro2.self = $$DropdownHeader;
  const { text, class: className, nav = false } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<a${addAttribute(["dropdown-toggle", className, { "nav-link": nav }], "class:list")} href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ${renderSlot($$result, $$slots["default"], renderTemplate`${text}`)} </a>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/DropdownHeader.astro", void 0);

const $$Astro$A = createAstro();
const $$DropdownMenu = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$A, $$props, $$slots);
  Astro2.self = $$DropdownMenu;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<ul${addAttribute(["dropdown-menu", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </ul>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/DropdownMenu.astro", void 0);

const $$Astro$z = createAstro();
const $$Dropdown = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$z, $$props, $$slots);
  Astro2.self = $$Dropdown;
  const { class: className, nav = false } = Astro2.props;
  const Tag = nav ? "li" : "div";
  return renderTemplate`${renderComponent($$result, "Tag", Tag, { "class:list": ["dropdown", className, { "nav-item": nav }] }, { "default": ($$result2) => renderTemplate` ${renderSlot($$result2, $$slots["default"])} ` })} `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Dropdown.astro", void 0);

const Dropdown = Object.assign($$Dropdown, { Divider: $$DropdownDivider, Item: $$DropdownItem, Header: $$DropdownHeader, Menu: $$DropdownMenu });

const $$Astro$y = createAstro();
const $$Modal = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$y, $$props, $$slots);
  Astro2.self = $$Modal;
  const { id, class: className, fade } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["modal", className, { fade }], "class:list")}${addAttribute(id, "id")} tabindex="-1"${addAttribute(`${id}-label`, "aria-labelledby")} aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> ${renderSlot($$result, $$slots["default"])} </div> </div> </div> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Modal.astro", void 0);

const $$Astro$x = createAstro();
const $$ModalBody = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$x, $$props, $$slots);
  Astro2.self = $$ModalBody;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["modal-body", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ModalBody.astro", void 0);

const $$Astro$w = createAstro();
const $$ModalClose = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$w, $$props, $$slots);
  Astro2.self = $$ModalClose;
  const { class: className, variant, text } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<button type="button"${addAttribute(["btn", `btn-${variant}`, className], "class:list")} data-bs-dismiss="modal"> ${renderSlot($$result, $$slots["default"], renderTemplate`${text}`)} </button>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ModalClose.astro", void 0);

const $$Astro$v = createAstro();
const $$ModalFooter = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$v, $$props, $$slots);
  Astro2.self = $$ModalFooter;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["modal-footer", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ModalFooter.astro", void 0);

const $$Astro$u = createAstro();
const $$ModalHeader = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$u, $$props, $$slots);
  Astro2.self = $$ModalHeader;
  const { parent: id, h = 5, class: className } = Astro2.props;
  const Heading = `h${h}`;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["modal-header", className], "class:list")}> ${renderComponent($$result, "Heading", Heading, { "class": "modal-title", "id": `${id}-label` }, { "default": ($$result2) => renderTemplate`${renderSlot($$result2, $$slots["default"])}` })} <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ModalHeader.astro", void 0);

Object.assign($$Modal, { Body: $$ModalBody, Close: $$ModalClose, Footer: $$ModalFooter, Header: $$ModalHeader });

const $$Astro$t = createAstro();
const $$Nav = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$t, $$props, $$slots);
  Astro2.self = $$Nav;
  const { class: className, tabs, pills, justified, fill } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<ul${addAttribute(["nav", className, { "nav-tabs": tabs, "nav-pills": pills, "nav-justified": justified, "nav-fill": fill }], "class:list")}> ${renderSlot($$result, $$slots["default"])} </ul>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Nav.astro", void 0);

const $$Astro$s = createAstro();
const $$NavLink = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$s, $$props, $$slots);
  Astro2.self = $$NavLink;
  const { href, class: className, disabled, text } = Astro2.props;
  return renderTemplate`${renderComponent($$result, "ActiveLink", $$ActiveLink, { "href": href, "class": ["nav-link", className], "disabled": disabled }, { "default": ($$result2) => renderTemplate` ${renderSlot($$result2, $$slots["default"], renderTemplate`${text}`)} ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/NavLink.astro", void 0);

const $$Astro$r = createAstro();
const $$NavItem = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$r, $$props, $$slots);
  Astro2.self = $$NavItem;
  const { class: className, href, disabled, text, linkClass, ...props } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<li${addAttribute(["nav-item", className], "class:list")}> ${renderComponent($$result, "Nav.Link", Nav.Link, { "class": linkClass, "disabled": disabled, "href": href, ...props }, { "default": ($$result2) => renderTemplate`${renderSlot($$result2, $$slots["default"], renderTemplate`${text}`)}` })} </li>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/NavItem.astro", void 0);

const Nav = Object.assign($$Nav, { Link: $$NavLink, Item: $$NavItem });

const $$Astro$q = createAstro();
const $$Navbar = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$q, $$props, $$slots);
  Astro2.self = $$Navbar;
  const { class: className, ...props } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<nav${addAttribute(["navbar", className], "class:list")}${spreadAttributes(props)}> ${renderSlot($$result, $$slots["default"])} </nav>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Navbar.astro", void 0);

const $$Astro$p = createAstro();
const $$NavbarCollapse = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$p, $$props, $$slots);
  Astro2.self = $$NavbarCollapse;
  const { id } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div class="collapse navbar-collapse"${addAttribute(id, "id")}> ${renderSlot($$result, $$slots["default"])} </div> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/NavbarCollapse.astro", void 0);

const $$Astro$o = createAstro();
const $$NavbarItems = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$o, $$props, $$slots);
  Astro2.self = $$NavbarItems;
  const { items, class: className } = Astro2.props;
  return renderTemplate`${renderComponent($$result, "Navbar.Nav", Navbar.Nav, { "class": className }, { "default": ($$result2) => renderTemplate`${items.map(
    (item) => item.subItems ? renderTemplate`${renderComponent($$result2, "Dropdown", Dropdown, { "nav": true }, { "default": ($$result3) => renderTemplate` ${renderComponent($$result3, "Dropdown.Header", Dropdown.Header, { "nav": true }, { "default": ($$result4) => renderTemplate`${item.text}` })} ${renderComponent($$result3, "Dropdown.Menu", Dropdown.Menu, {}, { "default": ($$result4) => renderTemplate`${item.subItems.map(
      (subItem) => subItem.divider ? renderTemplate`${renderComponent($$result4, "Dropdown.Divider", Dropdown.Divider, {})}` : renderTemplate`${renderComponent($$result4, "Dropdown.Item", Dropdown.Item, { ...subItem })}`
    )}` })} ` })}` : renderTemplate`${renderComponent($$result2, "Nav.Item", Nav.Item, { ...item })}`
  )}` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/NavbarItems.astro", void 0);

const $$Astro$n = createAstro();
const $$NavbarNav = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$n, $$props, $$slots);
  Astro2.self = $$NavbarNav;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<ul${addAttribute(["navbar-nav", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </ul>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/NavbarNav.astro", void 0);

const $$Astro$m = createAstro();
const $$NavbarToggler = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$m, $$props, $$slots);
  Astro2.self = $$NavbarToggler;
  const { controls } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<button class="navbar-toggler" type="button" data-bs-toggle="collapse"${addAttribute(`#${controls}`, "data-bs-target")}${addAttribute(controls, "aria-controls")} aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/NavbarToggler.astro", void 0);

const Navbar = Object.assign($$Navbar, {
  Collapse: $$NavbarCollapse,
  Nav: $$NavbarNav,
  Items: $$NavbarItems,
  Toggler: $$NavbarToggler
});

const getRange = (start, end) => {
  return Array(end - start + 1).fill(void 0).map((v, i) => i + start);
};
const createPageNumbers = (currentPage, pageCount) => {
  let delta;
  if (pageCount <= 7) {
    delta = 7;
  } else {
    delta = currentPage > 4 && currentPage < pageCount - 3 ? 2 : 4;
  }
  const range = {
    start: Math.round(currentPage - delta / 2),
    end: Math.round(currentPage + delta / 2)
  };
  if (range.start - 1 === 1 || range.end + 1 === pageCount) {
    range.start += 1;
    range.end += 1;
  }
  let pages = currentPage > delta ? getRange(
    Math.min(range.start, pageCount - delta),
    Math.min(range.end, pageCount)
  ) : getRange(1, Math.min(pageCount, delta + 1));
  const withDots = (value, pair) => pages.length + 1 !== pageCount ? pair : [value];
  if (pages[0] !== 1) {
    pages = withDots(1, [1, "..."]).concat(pages);
  }
  if (pages[pages.length - 1] < pageCount) {
    pages = pages.concat(withDots(pageCount, ["...", pageCount]));
  }
  return pages;
};
const createComponentData = (page, pathname) => {
  const { currentPage, lastPage, url } = page;
  const { prev, next } = url;
  const pageNums = createPageNumbers(currentPage, lastPage);
  let baseURL = pathname.replace(/\d+$/, "");
  baseURL = baseURL.replace(/\/$/, "");
  const pages = [
    {
      disabled: prev == null,
      href: prev,
      page: "Previous"
    }
  ];
  pageNums.forEach((page2) => {
    pages.push({
      disabled: false,
      href: page2 === "..." ? void 0 : page2 === 1 ? `${baseURL}` : `${baseURL}/${page2}`,
      page: page2.toString()
    });
  });
  pages.push({
    disabled: next == null,
    href: next,
    page: "Next"
  });
  return pages;
};

const $$Astro$l = createAstro();
const $$Pagination = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$l, $$props, $$slots);
  Astro2.self = $$Pagination;
  const {
    page,
    "aria-label": ariaLabel = "Page pagination control",
    class: className,
    itemClass,
    linkClass,
    size
  } = Astro2.props;
  const { pathname } = Astro2.url;
  const pages = createComponentData(page, pathname);
  return renderTemplate`${maybeRenderHead()}<nav${addAttribute(ariaLabel, "aria-label")}> <ul${addAttribute([
    "pagination",
    className,
    { "pagination-sm": size === "sm", "pagination-lg": size === "lg" }
  ], "class:list")}> ${renderSlot($$result, $$slots["default"], renderTemplate` ${pages && pages.map(({ href, disabled, page: page2 }) => renderTemplate`${renderComponent($$result, "Pagination.Item", Pagination.Item, { "class": itemClass, "disabled": disabled }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Pagination.Link", Pagination.Link, { "href": href, "class": linkClass }, { "default": ($$result3) => renderTemplate`${page2}` })} ` })}`)} `)} </ul> </nav>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Pagination.astro", void 0);

const $$Astro$k = createAstro();
const $$PaginationItem = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$k, $$props, $$slots);
  Astro2.self = $$PaginationItem;
  const { disabled = false, class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<li${addAttribute(["page-item", className, { disabled }], "class:list")}> ${renderSlot($$result, $$slots["default"])} </li>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/PaginationItem.astro", void 0);

const $$Astro$j = createAstro();
const $$PaginationLink = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$j, $$props, $$slots);
  Astro2.self = $$PaginationLink;
  const { href, class: className = "" } = Astro2.props;
  return renderTemplate`${renderComponent($$result, "ActiveLink", $$ActiveLink, { "href": href, "class": `page-link ${className}` }, { "default": ($$result2) => renderTemplate` ${renderSlot($$result2, $$slots["default"])} ` })} <!-- class:list={['page-link', className]} -->`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/PaginationLink.astro", void 0);

const Pagination = Object.assign($$Pagination, { Item: $$PaginationItem, Link: $$PaginationLink });

const $$Astro$i = createAstro();
const $$TabList = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$i, $$props, $$slots);
  Astro2.self = $$TabList;
  const { id, class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<ul${addAttribute(["nav nav-tabs", className], "class:list")}${addAttribute(`${id}-tabs`, "id")} role="tablist"> ${renderSlot($$result, $$slots["default"])} </ul> `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/TabList.astro", void 0);

const $$Astro$h = createAstro();
const $$TabItem = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$h, $$props, $$slots);
  Astro2.self = $$TabItem;
  const {
    index,
    active = false,
    id,
    class: className,
    linkClass
  } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<li${addAttribute(["nav-item", className], "class:list")} role="presentation"> <button${addAttribute(["nav-link", linkClass, { active }], "class:list")}${addAttribute(`${id}-tab-${index}`, "id")} data-bs-toggle="tab"${addAttribute(`#${id}-tab-pane-${index}`, "data-bs-target")} type="button" role="tab"${addAttribute(`${id}-tab-pane-${index}`, "aria-controls")}${addAttribute(index === 0, "aria-selected")}> ${renderSlot($$result, $$slots["default"])} </button> </li>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/TabItem.astro", void 0);

const $$Astro$g = createAstro();
const $$TabContent = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$g, $$props, $$slots);
  Astro2.self = $$TabContent;
  const { class: className = "", id } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["tab-content", className], "class:list")}${addAttribute(`${id}-tab-content`, "id")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/TabContent.astro", void 0);

const $$Astro$f = createAstro();
const $$TabPane = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$f, $$props, $$slots);
  Astro2.self = $$TabPane;
  const {
    index,
    class: className,
    active = false,
    fade = false,
    id
  } = Astro2.props;
  const show = fade && active;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["tab-pane", className, { fade, show, active }], "class:list")}${addAttribute(`${id}-tab-pane-${index}`, "id")} role="tabpanel"${addAttribute(`${id}-tab-${index}`, "aria-labelledby")} tabindex="0"> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/TabPane.astro", void 0);

const Tab = Object.assign({ List: $$TabList, Item: $$TabItem, Content: $$TabContent, Pane: $$TabPane });

const $$Astro$e = createAstro();
const $$Tabs = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$e, $$props, $$slots);
  Astro2.self = $$Tabs;
  const {
    tabs,
    id: userId,
    listClass,
    itemClass,
    linkClass,
    contentClass,
    paneClass,
    fade = false
  } = Astro2.props;
  const id = userId || `tabs-${nanoid(8)}`;
  return renderTemplate`${renderComponent($$result, "Tab.List", Tab.List, { "id": id, "class": listClass }, { "default": ($$result2) => renderTemplate`${tabs && tabs.map((tab, index) => renderTemplate`${renderComponent($$result2, "Tab.Item", Tab.Item, { "index": index, "id": id, "active": tab.active, "class": itemClass, "linkClass": linkClass }, { "default": ($$result3) => renderTemplate`${tab.title}` })}`)}` })} ${renderComponent($$result, "Tab.Content", Tab.Content, { "class": contentClass, "id": id }, { "default": ($$result2) => renderTemplate`${tabs && tabs.map((tab, index) => renderTemplate`${renderComponent($$result2, "Tab.Pane", Tab.Pane, { "index": index, "fade": fade, "id": id, "active": tab.active, "class": paneClass }, { "default": ($$result3) => renderTemplate`${tab.body}` })}`)}` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Tabs.astro", void 0);

const $$Astro$d = createAstro();
const $$Toast = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$d, $$props, $$slots);
  Astro2.self = $$Toast;
  const { id, class: className, animation = true, autohide = true, delay = 5e3 } = Astro2.props;
  const config = { delay, animation, autohide };
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(id, "id")}${addAttribute(["toast", className], "class:list")} role="alert" aria-live="assertive" aria-atomic="true"${addAttribute(JSON.stringify(config), "data-bs-config")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Toast.astro", void 0);

const $$Astro$c = createAstro();
const $$ToastBody = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$c, $$props, $$slots);
  Astro2.self = $$ToastBody;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["toast-body", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ToastBody.astro", void 0);

const $$Astro$b = createAstro();
const $$ToastClose = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$b, $$props, $$slots);
  Astro2.self = $$ToastClose;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<button type="button"${addAttribute(["btn-close", className], "class:list")} data-bs-dismiss="toast" aria-label="Close"></button>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ToastClose.astro", void 0);

const $$Astro$a = createAstro();
const $$ToastContainer = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$a, $$props, $$slots);
  Astro2.self = $$ToastContainer;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["toast-container", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ToastContainer.astro", void 0);

const $$Astro$9 = createAstro();
const $$ToastHeader = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$9, $$props, $$slots);
  Astro2.self = $$ToastHeader;
  const { class: className } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(["toast-header", className], "class:list")}> ${renderSlot($$result, $$slots["default"])} </div>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/ToastHeader.astro", void 0);

Object.assign($$Toast, { Body: $$ToastBody, Close: $$ToastClose, Container: $$ToastContainer, Header: $$ToastHeader });

const $$Astro$8 = createAstro();
const $$Tooltip = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$8, $$props, $$slots);
  Astro2.self = $$Tooltip;
  const {
    title,
    placement,
    animation,
    delay,
    html,
    trigger,
    customClass
  } = Astro2.props;
  const config = { title, placement, animation, delay, html, trigger, customClass };
  return renderTemplate`${renderComponent($$result, "tooltip-wrapper", "tooltip-wrapper", {}, { "default": () => renderTemplate` ${maybeRenderHead()}<span data-bs-toggle="tooltip"${addAttribute(JSON.stringify(config), "data-bs-config")}> ${renderSlot($$result, $$slots["default"])} </span> ` })} `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/components/Tooltip.astro", void 0);

const $$Astro$7 = createAstro();
const $$Marked = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$7, $$props, $$slots);
  Astro2.self = $$Marked;
  const { inline = false } = Astro2.props;
  const slot = await Astro2.slots.render("default");
  return renderTemplate`${Astro2.slots.has("default") && (inline ? renderTemplate`${renderComponent($$result, "Fragment", Fragment, {}, { "default": ($$result2) => renderTemplate`${unescapeHTML(marked.parseInline(slot))}` })}` : renderTemplate`${renderComponent($$result, "Fragment", Fragment, {}, { "default": ($$result2) => renderTemplate`${unescapeHTML(marked.parse(slot))}` })}`)}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/utils/Marked.astro", void 0);

const $$Astro$6 = createAstro();
const $$InlineCode = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$6, $$props, $$slots);
  Astro2.self = $$InlineCode;
  const { code } = Astro2.props;
  return renderTemplate`${renderComponent($$result, "Marked", $$Marked, { "inline": true }, { "default": ($$result2) => renderTemplate`\`${renderComponent($$result2, "Fragment", Fragment, {}, { "default": ($$result3) => renderTemplate`${unescapeHTML(code)}` })}\`` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/node_modules/astro-bootstrap/lib/utils/InlineCode.astro", void 0);

/**
   * Vue.js component that renders a button.
   *
   * @component CommonButton
   * @example
   * <CommonButton @common-button-click="functionName" is-loading="true" center-button="false" link-to="/link">Common button</CommonButton>
   */
  
  
const _sfc_main$5 = {
  __name: 'CommonButton',
  props: {
    isLoading: {
      type: Boolean,
      required: false,
      default: false,
    },
    linkTo: {
      type: String,
      required: false,
      default: "",
    },
    centerButton: { type: Boolean, required: false, default: false },
  },
  emits: ["CommonButtonClick"],
  setup(__props, { expose: __expose }) {
  __expose();

  
  
  
  
const __returned__ = { get ActiveLink() { return $$ActiveLink } };
Object.defineProperty(__returned__, '__isScriptSetup', { enumerable: false, value: true });
return __returned__
}

};

function _sfc_ssrRender$5(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  if ($props.linkTo) {
    _push(`<div${ssrRenderAttrs(mergeProps({
      class: { center: $props.centerButton }
    }, _attrs))} data-v-bce69507>`);
    _push(ssrRenderComponent($setup["ActiveLink"], {
      to: $props.linkTo,
      class: "button-link"
    }, {
      default: withCtx((_, _push, _parent, _scopeId) => {
        if (_push) {
          _push(`<button${
            (ssrIncludeBooleanAttr($props.isLoading)) ? " disabled" : ""
          } class="${
            ssrRenderClass({ disabled: $props.isLoading })
          }" type="submit" data-v-bce69507${
            _scopeId
          }>`);
          ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent, _scopeId);
          if ($props.isLoading) {
            _push(`<svg class="absolute -mt-6 -ml-2 animate-spin" width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-bce69507${
              _scopeId
            }><path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM4.14355 13.5165C4.85219 17.2096 8.10023 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.0886 4 4.83283 6.80704 4.13728 10.5165L6.72824 10.5071C7.37819 8.20738 9.49236 6.52222 12.0001 6.52222C15.0254 6.52222 17.4779 8.9747 17.4779 12C17.4779 15.0253 15.0254 17.4778 12.0001 17.4778C9.49752 17.4778 7.3869 15.7995 6.73228 13.5071L4.14355 13.5165ZM9.52234 12C9.52234 13.3684 10.6317 14.4778 12.0001 14.4778C13.3685 14.4778 14.4779 13.3684 14.4779 12C14.4779 10.6316 13.3685 9.52222 12.0001 9.52222C10.6317 9.52222 9.52234 10.6316 9.52234 12Z" fill="white" data-v-bce69507${
              _scopeId
            }></path></svg>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</button>`);
        } else {
          return [
            createVNode("button", {
              disabled: $props.isLoading,
              class: { disabled: $props.isLoading },
              onClick: withModifiers($event => (_ctx.$emit('CommonButtonClick')), ["stop"]),
              type: "submit"
            }, [
              renderSlot$1(_ctx.$slots, "default", {}, undefined, true),
              ($props.isLoading)
                ? (openBlock(), createBlock("svg", {
                    key: 0,
                    class: "absolute -mt-6 -ml-2 animate-spin",
                    width: "25",
                    height: "25",
                    viewBox: "0 0 24 24",
                    fill: "none",
                    xmlns: "http://www.w3.org/2000/svg"
                  }, [
                    createVNode("path", {
                      "fill-rule": "evenodd",
                      "clip-rule": "evenodd",
                      d: "M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM4.14355 13.5165C4.85219 17.2096 8.10023 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.0886 4 4.83283 6.80704 4.13728 10.5165L6.72824 10.5071C7.37819 8.20738 9.49236 6.52222 12.0001 6.52222C15.0254 6.52222 17.4779 8.9747 17.4779 12C17.4779 15.0253 15.0254 17.4778 12.0001 17.4778C9.49752 17.4778 7.3869 15.7995 6.73228 13.5071L4.14355 13.5165ZM9.52234 12C9.52234 13.3684 10.6317 14.4778 12.0001 14.4778C13.3685 14.4778 14.4779 13.3684 14.4779 12C14.4779 10.6316 13.3685 9.52222 12.0001 9.52222C10.6317 9.52222 9.52234 10.6316 9.52234 12Z",
                      fill: "white"
                    })
                  ]))
                : createCommentVNode("", true)
            ], 10, ["disabled", "onClick"])
          ]
        }
      }),
      _: 3
    }, _parent));
    _push(`</div>`);
  } else {
    _push(`<div${
      ssrRenderAttrs(mergeProps({
        class: { center: $props.centerButton }
      }, _attrs))
    } data-v-bce69507><button${
      (ssrIncludeBooleanAttr($props.isLoading)) ? " disabled" : ""
    } class="${
      ssrRenderClass({ disabled: $props.isLoading })
    }" type="submit" data-v-bce69507>`);
    ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
    if ($props.isLoading) {
      _push(`<svg class="absolute -mt-6 -ml-2 animate-spin" width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-bce69507><path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM4.14355 13.5165C4.85219 17.2096 8.10023 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.0886 4 4.83283 6.80704 4.13728 10.5165L6.72824 10.5071C7.37819 8.20738 9.49236 6.52222 12.0001 6.52222C15.0254 6.52222 17.4779 8.9747 17.4779 12C17.4779 15.0253 15.0254 17.4778 12.0001 17.4778C9.49752 17.4778 7.3869 15.7995 6.73228 13.5071L4.14355 13.5165ZM9.52234 12C9.52234 13.3684 10.6317 14.4778 12.0001 14.4778C13.3685 14.4778 14.4779 13.3684 14.4779 12C14.4779 10.6316 13.3685 9.52222 12.0001 9.52222C10.6317 9.52222 9.52234 10.6316 9.52234 12Z" fill="white" data-v-bce69507></path></svg>`);
    } else {
      _push(`<!---->`);
    }
    _push(`</button></div>`);
  }
}
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext()
  ;(ssrContext.modules || (ssrContext.modules = new Set())).add("src/components/common/CommonButton.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : undefined
};
const CommonButton = /*#__PURE__*/_export_sfc(_sfc_main$5, [['ssrRender',_sfc_ssrRender$5],['__scopeId',"data-v-bce69507"]]);

const _sfc_main$4 = {
  __name: 'ShowSingleProduct',
  props: ["product"],
  setup(__props, { expose: __expose }) {
  __expose();

//import ADD_TO_CART_MUTATION from "../../apollo/mutations/ADD_TO_CART_MUTATION.gql";
const addProductToCart = async (product) => {
  await cart.addToCart(product);

  watchEffect(() => {
    if (isLoading.value === false) ;
  });
};
const props = __props;

const selectedVariation = ref(18);

onMounted(() => {
  if (props.product.variations) {
    const firstVariant = props.product.variations.nodes[0].databaseId;
    selectedVariation.value = firstVariant;
  }
});

const changeVariation = (event) => {
  selectedVariation.value = event.target.value;
};

/*
watch(
  () => data.value,
  (dataValue) => {
    if (dataValue && dataValue.product?.variations?.nodes?.length > 0) {
      selectedVariation.value =
        dataValue.product?.variations?.nodes[0].databaseId;
    }
  },
  { immediate: true }
);  */


const __returned__ = { addProductToCart, props, selectedVariation, changeVariation, ref, onMounted, get filteredVariantPrice() { return filteredVariantPrice }, get stripHTML() { return stripHTML }, AddToCartButton, CommonButton };
Object.defineProperty(__returned__, '__isScriptSetup', { enumerable: false, value: true });
return __returned__
}

};

function _sfc_ssrRender$4(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  if ($props.product) {
    _push(`<div${
      ssrRenderAttrs(_attrs)
    }><h4>${
      ssrInterpolate($props.product.name)
    }</h4><section class="product-details spad"><div class="container"><div class="row"><div class="col-lg-6"><div class="product__details__img"><div class="product__details__big__img">`);
    if ($props.product.image) {
      _push(`<img id="product-image" class="big_img"${
        ssrRenderAttr("alt", $props.product.name)
      }${
        ssrRenderAttr("src", $props.product.image.sourceUrl)
      }>`);
    } else {
      _push(`<img id="product-image" class="big_img"${
        ssrRenderAttr("alt", $props.product.name)
      }${
        ssrRenderAttr("src", _ctx.process.env.placeholderSmallImage)
      }>`);
    }
    _push(`</div><div class="product__details__thumb"><div class="pt__item active"><img data-imgbigurl="/images/shop/details/product-big-2.jpg" src="/images/shop/details/product-big-2.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-1.jpg" src="/images/shop/details/product-big-1.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-4.jpg" src="/images/shop/details/product-big-4.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-3.jpg" src="/images/shop/details/product-big-3.jpg" alt=""></div><div class="pt__item"><img data-imgbigurl="/images/shop/details/product-big-5.jpg" src="/images/shop/details/product-big-5.jpg" alt=""></div></div></div></div><div class="col-lg-6"><div class="product__details__text"><div class="product__label">Cupcake</div><h4>${ssrInterpolate($props.product.name)}</h4>`);
    if ($props.product.onSale) {
      _push(`<div class="flex"><h5 class="pt-1 mt-4 text-3xl text-gray-900">`);
      if ($props.product.variations) {
        _push(`<span>${ssrInterpolate($props.product.price)}</span>`);
      } else {
        _push(`<span>${ssrInterpolate($props.product.salePrice)}</span>`);
      }
      _push(`</h5><h5 class="pt-1 pl-8 mt-4 text-2xl text-gray-900 line-through">`);
      if ($props.product.variations) {
        _push(`<span>${ssrInterpolate($props.product.price)}</span>`);
      } else {
        _push(`<span>${ssrInterpolate($props.product.regularPrice)}</span>`);
      }
      _push(`</h5></div>`);
    } else {
      _push(`<h5 class="pt-1 mt-4 text-2xl text-gray-900">${ssrInterpolate($props.product.price)}</h5>`);
    }
    _push(`<br>`);
    if ($props.product.stockQuantity) {
      _push(`<p class="pt-1 mt-4 text-2xl text-gray-900">${ssrInterpolate($props.product.stockQuantity)} in stock </p>`);
    } else {
      _push(`<!---->`);
    }
    if ($props.product.variations) {
      _push(`<p class="pt-1 mt-4 text-xl text-gray-900"><span class="py-2">Variants</span><select id="variant" name="variant" class="block w-64 px-6 py-2 bg-white border border-gray-500 rounded-lg focus:outline-none focus:shadow-outline"><!--[-->`);
      ssrRenderList($props.product.variations.nodes, (variation, index) => {
        _push(`<option${
          ssrRenderAttr("value", variation.databaseId)
        }${
          (ssrIncludeBooleanAttr(index === 0)) ? " selected" : ""
        }>${
          ssrInterpolate(variation.name)
        } (${
          ssrInterpolate(variation.stockQuantity)
        } in stock) </option>`);
      });
      _push(`<!--]--></select></p>`);
    } else {
      _push(`<!---->`);
    }
    _push(`<p>${ssrInterpolate($props.product.description)}</p><ul><li>SKU: <span>17</span></li><li>Category: <span>Biscuit cake</span></li><li>Tags: <span>Gadgets, minimalisstic</span></li></ul><div class="product__details__option"><div class="quantity"><div class="pro-qty"><input type="text" value="1"></div></div><a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>`);
    if ($props.product.variations) {
      _push(ssrRenderComponent($setup["AddToCartButton"], {
        product: $setup.selectedVariation,
        "client:visible": ""
      }, null, _parent));
    } else {
      _push(ssrRenderComponent($setup["AddToCartButton"], {
        product: $props.product,
        "client:visible": ""
      }, null, _parent));
    }
    _push(`<a hx-get="http://yiiwp.local/wordpress/cart/?add-to-cart=17" hx-swap="outerHTML">Click Me</a></div></div></div></div><div class="product__details__tab"><div class="col-lg-12"><ul class="nav nav-tabs" role="tablist"><li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tabs-1" role="tab">Description</a></li><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tabs-2" role="tab">Additional information</a></li><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tabs-3" role="tab">Previews(1)</a></li></ul><div class="tab-content"><div class="tab-pane active" id="tabs-1" role="tabpanel"><div class="row d-flex justify-content-center"><div class="col-lg-8"><p> Tab1:Description:This delectable Strawberry Pie is an extraordinary treat filled with sweet and tasty chunks of delicious strawberries. Made with the freshest ingredients, one bite will send you to summertime. Each gift arrives in an elegant gift box and arrives with a greeting card of your choice that you can personalize online! </p></div></div></div><div class="tab-pane" id="tabs-2" role="tabpanel"><div class="row d-flex justify-content-center"><div class="col-lg-8"><p> Tab2-Additional Information:This delectable Strawberry Pie is an extraordinary treat filled with sweet and tasty chunks of delicious strawberries. Made with the freshest ingredients, one bite will send you to summertime. Each gift arrives in an elegant gift box and arrives with a greeting card of your choice that you can personalize online!2 </p></div></div></div><div class="tab-pane" id="tabs-3" role="tabpanel"><div class="row d-flex justify-content-center"><div class="col-lg-8"><p> Tab3-Reviews:This delectable Strawberry Pie is an extraordinary treat filled with sweet and tasty chunks of delicious strawberries. Made with the freshest ingredients, one bite will send you to summertime. Each gift arrives in an elegant gift box and arrives with a greeting card of your choice that you can personalize online!3 </p></div></div></div></div></div></div></div></section></div>`);
  } else {
    _push(`<!---->`);
  }
}
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext()
  ;(ssrContext.modules || (ssrContext.modules = new Set())).add("src/components/Products/ShowSingleProduct.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : undefined
};
const ShowSingleProduct = /*#__PURE__*/_export_sfc(_sfc_main$4, [['ssrRender',_sfc_ssrRender$4]]);

async function getSingleProduct(pid) {
  const variables = {
    id: pid
  };
  const {
    data
  } = await client.query({
    query: gql`
      query Product($id: ID!) {
        product(id: $id, idType: DATABASE_ID) {
          databaseId
          averageRating
          name
          slug
          description
          onSale
          image {
            databaseId
            uri
            title
            srcSet
            sourceUrl
          }
          ... on SimpleProduct {
            price
            salePrice
            regularPrice
            databaseId
            stockQuantity
          }
          ... on VariableProduct {
            price
            salePrice
            regularPrice
            databaseId

            variations {
              nodes {
                databaseId
                name
                stockStatus
                stockQuantity
                purchasable
                onSale
                salePrice
                regularPrice
              }
            }
          }
          ... on ExternalProduct {
            price
            databaseId
            externalUrl
          }
          ... on GroupProduct {
            products {
              nodes {
                ... on SimpleProduct {
                  databaseId
                  price
                }
              }
            }
            id
          }
        }
      }
    `,
    variables
  });
  return data?.product;
}

async function getAllProducts() {
  const variables = {
    limit: 99
  };
  const {
    data,
    loading
  } = await client.query({
    query: gql`
  {
    products(first: 24) {
      nodes {
        databaseId
        name
        onSale
        slug
        image {
          sourceUrl
        }
        ... on SimpleProduct {
          databaseId
          price
          regularPrice
          salePrice
        }
        ... on VariableProduct {
          databaseId
          price
          regularPrice
          salePrice
          variations {
            nodes {
              price
              regularPrice
              salePrice
            }
          }
        }
      }
    }
  }  
    `,
    variables
  });
  return data?.products;
}

const $$Astro$5 = createAstro();
async function getStaticPaths() {
  const products = await getAllProducts();
  const paths = [];
  for (const prd of products.nodes) {
    const product = await getSingleProduct(prd.databaseId);
    if (typeof product.databaseId.toString() === "string") {
      paths.push({
        params: { id: product.databaseId.toString(), slug: product.slug },
        props: { product }
      });
    } else {
      console.error("Product ID is not a string:", prd.databaseId);
    }
  }
  return paths;
}
const $$slug = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$5, $$props, $$slots);
  Astro2.self = $$slug;
  Astro2.params;
  const { product } = Astro2.props;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "{product.name}" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<h1 class="text-3xl text-center font-bold p-6">${product.name}</h1> ${renderComponent($$result2, "ShowSingleProduct", ShowSingleProduct, { "product": product, "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Products/ShowSingleProduct.vue", "client:component-export": "default" })} ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/products/[id]/[slug].astro", void 0);

const $$file$4 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/products/[id]/[slug].astro";
const $$url$4 = "/products/[id]/[slug]";

const _slug_ = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$slug,
  file: $$file$4,
  getStaticPaths,
  url: $$url$4
}, Symbol.toStringTag, { value: 'Module' }));

const _sfc_main$3 = {
  __name: "ShowAllProducts",
  props: ["allProducts"],
  setup(__props, { expose: __expose }) {
    __expose();
    const { PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL } = Object.assign({"PUBLIC_GRAPHQL_URL": "http://yiiwp.local/wordpress/graphql", "PUBLIC_GRAPHQL_URL_NM": "http://crater.local/graphql", "PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL": "https://via.placeholder.com/500", "PUBLIC_CURRENCY": "NOK", "PUBLIC_CURRENCY_LOCALE": "nb-NO", "PUBLIC_ALGOLIA_INDEX_NAME": "change me", "BASE_URL": "/", "MODE": "production", "DEV": false, "PROD": true, "SSR": true, "SITE": undefined, "ASSETS_PREFIX": undefined}, { PUBLIC: process.env.PUBLIC });
    const productLink = (product) => {
      return {
        path: "/products/" + product.slug,
        query: { id: product.databaseId }
      };
    };
    const productImage = (product) => product.image ? product.image.sourceUrl : PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL;
    const __returned__ = { PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL, productLink, productImage, computed, ProductImage, ProductPrice };
    Object.defineProperty(__returned__, "__isScriptSetup", { enumerable: false, value: true });
    return __returned__;
  }
};
function _sfc_ssrRender$3(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "row product_item_inner" }, _attrs))}><!--[-->`);
  ssrRenderList($props.allProducts, (product) => {
    _push(`<div class="col-lg-4 col-md-4 col-6"><div class="cake_feature_item">`);
    _push(ssrRenderComponent($setup["ProductImage"], {
      alt: product.name,
      src: $setup.productImage(product),
      width: 270
    }, null, _parent));
    _push(`<div class="cake_text">`);
    _push(ssrRenderComponent($setup["ProductPrice"], {
      product,
      priceFontSize: "normal",
      shouldCenterPrice: true
    }, null, _parent));
    _push(`<h3><a class=""${ssrRenderAttr("href", `/products/${product.databaseId}/${product.slug}`)}>${ssrInterpolate(product.name)}</a></h3><button${ssrRenderAttr("data-product-id", product.databaseId)}>Add to Cart</button></div></div></div>`);
  });
  _push(`<!--]--></div>`);
}
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("src/components/Products/ShowAllProducts.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const ShowAllProducts = /* @__PURE__ */ _export_sfc(_sfc_main$3, [["ssrRender", _sfc_ssrRender$3]]);

const $$Astro$4 = createAstro();
const $$Products = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$4, $$props, $$slots);
  Astro2.self = $$Products;
  Object.assign({"PUBLIC_GRAPHQL_URL": "http://yiiwp.local/wordpress/graphql", "PUBLIC_GRAPHQL_URL_NM": "http://crater.local/graphql", "PUBLIC_PLACEHOLDER_SMALL_IMAGE_URL": "https://via.placeholder.com/500", "PUBLIC_CURRENCY": "NOK", "PUBLIC_CURRENCY_LOCALE": "nb-NO", "PUBLIC_ALGOLIA_INDEX_NAME": "change me", "BASE_URL": "/", "MODE": "production", "DEV": false, "PROD": true, "SSR": true, "SITE": undefined, "ASSETS_PREFIX": undefined}, { PUBLIC: process.env.PUBLIC });
  Astro2.props;
  const productVariables = { limit: 99 };
  const { data: allProducts } = await client.query({
    query: gql`
    {
      products(first: 24) {
        nodes {
          databaseId
          name
          onSale
          slug
          image {
            sourceUrl
          }
          ... on SimpleProduct {
            databaseId
            price
            regularPrice
            salePrice
          }
          ... on VariableProduct {
            databaseId
            price
            regularPrice
            salePrice
            variations {
              nodes {
                price
                regularPrice
                salePrice
              }
            }
          }
        }
      }
    }
  `,
    variables: productVariables
  });
  const categoryVariables = { id: "dGVybToyMA==" };
  await client.query({
    query: gql`
    query ProductsFromCategory($id: ID!) {
      productCategory(id: $id, idType: ID) {
        id
        name
        products(first: 50) {
          nodes {
            id
            databaseId
            onSale
            averageRating
            slug
            description
            image {
              id
              uri
              title
              srcSet
              sourceUrl
            }
            name
            ... on SimpleProduct {
              salePrice
              regularPrice
              onSale
              price
              id
            }
            ... on VariableProduct {
              salePrice
              regularPrice
              onSale
              price
              id
            }
            ... on ExternalProduct {
              price
              id
              externalUrl
            }
            ... on GroupProduct {
              products {
                nodes {
                  ... on SimpleProduct {
                    id
                    price
                  }
                }
              }
              id
            }
          }
        }
      }
    }
  `,
    variables: categoryVariables
  });
  const products = (
    //  allCategoryProducts.productCategory?.products?.nodes ||
    allProducts.products?.nodes || []
  );
  return renderTemplate`${renderComponent($$result, "ShopLayout", $$ShopLayout, { "title": "Products" }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "ShowAllProducts", ShowAllProducts, { "allProducts": products, "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Products/ShowAllProducts.vue", "client:component-export": "default" })} ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/products.astro", void 0);
const $$file$3 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/products.astro";
const $$url$3 = "/products";

const products = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Products,
  file: $$file$3,
  url: $$url$3
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$3 = createAstro();
const $$Search = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$3, $$props, $$slots);
  Astro2.self = $$Search;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "Search" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<main> <h1 class="text-center text-3xl font-bold p-4">Search</h1>
SEARCH
</main> ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/search.astro", void 0);

const $$file$2 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/search.astro";
const $$url$2 = "/search";

const search = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Search,
  file: $$file$2,
  url: $$url$2
}, Symbol.toStringTag, { value: 'Module' }));

const $$Astro$2 = createAstro();
const $$Success = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$2, $$props, $$slots);
  Astro2.self = $$Success;
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "Order placed" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<main> <h1 class="text-center text-3xl font-bold p-4">Order placed</h1> </main> ` })}`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/success.astro", void 0);

const $$file$1 = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/success.astro";
const $$url$1 = "/success";

const success = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Success,
  file: $$file$1,
  url: $$url$1
}, Symbol.toStringTag, { value: 'Module' }));

reactive({
  count: 0,
  increment() {
    this.count++;
  }
});

const _sfc_main$2 = {
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      onSlideChange: () => {},
      modules: [Autoplay],
    };
  },
  methods: {
    onSwiper(swiper) {
      const observer = new IntersectionObserver(
        ([entry]) => {
          if (entry.isIntersecting) {
            swiper.autoplay.start();
            observer.disconnect();
          }
        },
        { threshold: 0 }
      );
      observer.observe(swiper.el);
    },
  },
};

function _sfc_ssrRender$2(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_swiper = resolveComponent("swiper");
  const _component_swiper_slide = resolveComponent("swiper-slide");

  _push(ssrRenderComponent(_component_swiper, mergeProps({
    modules: $setup.modules,
    "slides-per-view": 1.5,
    "space-between": 15,
    onActiveIndexChange: $setup.onSlideChange,
    onSwiper: $options.onSwiper
  }, _attrs), {
    default: withCtx((_, _push, _parent, _scopeId) => {
      if (_push) {
        _push(ssrRenderComponent(_component_swiper_slide, null, {
          default: withCtx((_, _push, _parent, _scopeId) => {
            if (_push) {
              _push(`<img src="/images/cakebanner1.jpg"${_scopeId}>`);
            } else {
              return [
                createVNode("img", { src: "/images/cakebanner1.jpg" })
              ]
            }
          }),
          _: 1
        }, _parent, _scopeId));
        _push(ssrRenderComponent(_component_swiper_slide, null, {
          default: withCtx((_, _push, _parent, _scopeId) => {
            if (_push) {
              _push(`<img src="/images/cakebanner2.jpg"${_scopeId}>`);
            } else {
              return [
                createVNode("img", { src: "/images/cakebanner2.jpg" })
              ]
            }
          }),
          _: 1
        }, _parent, _scopeId));
        _push(ssrRenderComponent(_component_swiper_slide, null, {
          default: withCtx((_, _push, _parent, _scopeId) => {
            if (_push) {
              _push(`<img src="/images/cakebanner3.jpg"${_scopeId}>`);
            } else {
              return [
                createVNode("img", { src: "/images/cakebanner3.jpg" })
              ]
            }
          }),
          _: 1
        }, _parent, _scopeId));
      } else {
        return [
          createVNode(_component_swiper_slide, null, {
            default: withCtx(() => [
              createVNode("img", { src: "/images/cakebanner1.jpg" })
            ]),
            _: 1
          }),
          createVNode(_component_swiper_slide, null, {
            default: withCtx(() => [
              createVNode("img", { src: "/images/cakebanner2.jpg" })
            ]),
            _: 1
          }),
          createVNode(_component_swiper_slide, null, {
            default: withCtx(() => [
              createVNode("img", { src: "/images/cakebanner3.jpg" })
            ]),
            _: 1
          })
        ]
      }
    }),
    _: 1
  }, _parent));
}
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext()
  ;(ssrContext.modules || (ssrContext.modules = new Set())).add("src/components/Index/HomeCarousel.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : undefined
};
const HomeSlider = /*#__PURE__*/_export_sfc(_sfc_main$2, [['ssrRender',_sfc_ssrRender$2]]);

const _sfc_main$1 = /* @__PURE__ */ defineComponent({
  __name: "Button",
  props: {
    link: { type: Boolean }
  },
  setup(__props, { expose: __expose }) {
    __expose();
    const count = ref(0);
    const __returned__ = { count };
    Object.defineProperty(__returned__, "__isScriptSetup", { enumerable: false, value: true });
    return __returned__;
  }
});
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<!--[-->${ssrInterpolate($setup.count)} <button>Count</button><button class="button">`);
  ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
  _push(`</button><input name="post-input-2" class="post-input rounded border border-black bg-slate-200 px-2" id="post-input-2" type="text"><button hx-get="/partials/clicked" hx-target="#chat-container" hx-swap="beforeend" hx-include=".post-input"> Click Me </button><!--]-->`);
}
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("src/components/common/Button.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const Button = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["ssrRender", _sfc_ssrRender$1]]);

const _sfc_main = {
  __name: 'ShowAllCategories',
  props: ["categories"],
  setup(__props, { expose: __expose }) {
  __expose();



const __returned__ = {  };
Object.defineProperty(__returned__, '__isScriptSetup', { enumerable: false, value: true });
return __returned__
}

};

function _sfc_ssrRender(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  if ($props.categories) {
    _push(`<div${ssrRenderAttrs(_attrs)}><div class="categories"><div class="container"><div class="row"><!--[-->`);
    ssrRenderList($props.categories.nodes, (category) => {
      _push(`<!--[-->`);
      if (category.slug !== undefined) {
        _push(`<div class="categories__item"><a class="text-black cursor-pointer hover:underline"${
          ssrRenderAttr("href", `/category/${category.slug}`)
        }><div class="categories__item__icon"><span class="flaticon-030-cupcake-2"></span><h5>${
          ssrInterpolate(category.name)
        }</h5></div></a></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    });
    _push(`<!--]--></div></div></div></div>`);
  } else {
    _push(`<!---->`);
  }
}
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext()
  ;(ssrContext.modules || (ssrContext.modules = new Set())).add("src/components/Category/ShowAllCategories.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : undefined
};
const ShowAllCategories = /*#__PURE__*/_export_sfc(_sfc_main, [['ssrRender',_sfc_ssrRender]]);

var root = "z0pz8u0";
var size = {
  small: "z0pz8u1",
  medium: "z0pz8u2",
  large: "z0pz8u3"
};
var text = "z0pz8u4";
var twStyle = "text-[hsl(280,100%,70%)]";

const $$Astro$1 = createAstro();
const $$CarRow = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1, $$props, $$slots);
  Astro2.self = $$CarRow;
  const { item } = Astro2.props;
  const { size: size$1 = "medium" } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<tr${addAttribute([root, size[size$1]], "class:list")}> <td${addAttribute([text], "class:list")}>${item.id}</td> <td${addAttribute([twStyle], "class:list")}>${item.make}</td> <td>${item.model}</td> </tr><tr></tr>`;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/CarRow.astro", void 0);

const Cars = [{
  id: 1,
  make: "Toyota",
  model: "Supra"
}, {
  id: 2,
  make: "Dodge",
  model: "Charger"
}, {
  id: 3,
  make: "Mitsubishi",
  model: "Eclipse"
}, {
  id: 4,
  make: "Nissan",
  model: "Skyline GT-R"
}, {
  id: 5,
  make: "Mazda",
  model: "RX-7"
}];

const $$Astro = createAstro();
const $$Index = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$Index;
  const categories = await getAllCategories();
  const variables = { limit: 99 };
  const { data, loading } = await client.query({
    query: gql`
    {
      productCategories(first: 20) {
        nodes {
          id
          databaseId
          name
          slug
        }
      }
    }
  `,
    variables
  });
  console.log(data.nodes);
  return renderTemplate`${renderComponent($$result, "Layout", $$Layout, { "title": "Index", "data-astro-cid-j7pv25f6": true }, { "default": ($$result2) => renderTemplate`  ${renderComponent($$result2, "HomeSlider", HomeSlider, { "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Index/HomeCarousel.vue", "client:component-export": "default", "data-astro-cid-j7pv25f6": true })} ${maybeRenderHead()}<h1 class="text-center text-3xl font-bold p-4" data-astro-cid-j7pv25f6>Categories</h1>  ${renderComponent($$result2, "ShowAllCategories", ShowAllCategories, { "categories": categories, "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Category/ShowAllCategories.vue", "client:component-export": "default", "data-astro-cid-j7pv25f6": true })} <section id="banner" data-astro-cid-j7pv25f6> <h2 data-astro-cid-j7pv25f6>Up to <span data-astro-cid-j7pv25f6>30% Off</span> on All Cakes &amp; Decoratives</h2> ${renderComponent($$result2, "Button", Button, { "client:load": true, "client:component-hydration": "load", "client:component-path": "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/components/Common/Button.vue", "client:component-export": "default", "data-astro-cid-j7pv25f6": true })} <div id="chat-container" data-astro-cid-j7pv25f6>CHAT CONTENT</div> </section> <table data-astro-cid-j7pv25f6> <thead data-astro-cid-j7pv25f6> <tr data-astro-cid-j7pv25f6> <th data-astro-cid-j7pv25f6>ID</th> <th data-astro-cid-j7pv25f6>Make</th> <th data-astro-cid-j7pv25f6>Model</th> </tr> </thead> <tbody data-astro-cid-j7pv25f6> ${Cars.map((item) => renderTemplate`${renderComponent($$result2, "CartRow", $$CarRow, { "item": item, "data-astro-cid-j7pv25f6": true })}`)} </tbody> </table> ` })} `;
}, "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/index.astro", void 0);

const $$file = "C:/gitrepos/luya_shop_admin/luya_shop_frontend/src/pages/index.astro";
const $$url = "";

const index = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Index,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

export { _404 as _, about as a, checkout as b, cart$2 as c, cart$1 as d, categories as e, _slug_$1 as f, graphql as g, error$1 as h, bakes as i, clicked as j, detail as k, _slug_ as l, menu as m, products as n, success as o, pricelist as p, index as q, search as s };
