/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// import $ from 'jquery';
// window.$ = window.jQuery = $;

window.axios = require('axios');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.directive('focus', {
	inserted: function(el) {
		el.focus();
	},
});

Vue.component(
	'paginate-component',
	require('./components/PaginateComponent.vue').default,
);

Vue.component(
	'tag-list',
	require('./components/TagList.vue').default,
);

Vue.component(
	'tag-component',
	require('./components/TagComponent.vue').default,
);

Vue.component(
	'ingredient-list',
	require('./components/IngredientList.vue').default,
);

Vue.component(
	'ingredient-component',
	require('./components/IngredientComponent.vue').default,
);

Vue.component(
	'category-list',
	require('./components/CategoryList.vue').default,
);

Vue.component(
	'category-component',
	require('./components/CategoryComponent.vue').default,
);

Vue.component(
	'passport-clients',
	require('./components/passport/Clients.vue').default,
);

Vue.component(
	'passport-authorized-clients',
	require('./components/passport/AuthorizedClients.vue').default,
);

Vue.component(
	'passport-personal-access-tokens',
	require('./components/passport/PersonalAccessTokens.vue').default,
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
});

// (function() {
// 	const burger = document.querySelector('.nav-toggle');
// 	const menu = document.querySelector('.nav-menu');
// 	burger.addEventListener('click', function() {
// 		burger.classList.toggle('is-active');
// 		menu.classList.toggle('is-active');
// 	});
// })();
