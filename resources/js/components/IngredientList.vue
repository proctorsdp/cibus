<template>
	<div class="tile is-ancestor">
		<div class="tile is-12 is-vertical">
			<div class="tile box">
				<div class="container">
					<h4 class="title is-size-5">Add Ingredient</h4>
					<ingredient-component
						v-on:refresh="getData"
						v-bind:categories="categories"
					></ingredient-component>
				</div>
			</div>
			<div class="tile box">
				<div class="container">
					<div class="column is-half is-offset-one-quarter">
						<div class="field has-addons">
							<p class="control is-expanded">
								<input class="input is-fullwidth" type="text" placeholder="Search for an Ingredient" v-model="search" @keyup="getData(1)">
							</p>
							<p class="control">
								<button class="button is-link">Search</button>
							</p>
						</div>
					</div>
					<ingredient-component
						v-for="(ingredient, index) in ingredients"
						:key="ingredient.id"
						v-bind:ingredient="ingredient"
						v-bind:categories="categories"
						v-on:delete="ingredients.splice(index, 1)"
					></ingredient-component>
				</div>
			</div>
			<paginate-component
				v-bind:lastPage="numPages"
				v-on:update-page="getData($event)"
			></paginate-component>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			ingredients: [],
			numPages: 1,
			search: '',
			categories: [],
		};
	},

	mounted() {
		this.getData();
		axios.get('/api/categories?paginate=false').then(({data}) => {
			this.categories = data.categories;
		});
	},

	methods: {
		getData(page) {
			if (typeof(page) === 'undefined') page = 1;

			axios.get(`/api/ingredients?page=${page}&search=${this.search}`).then(({data}) => {
				this.ingredients = data.ingredients;
				this.numPages = data.meta.last_page;
			});
		},
	},
};
</script>
