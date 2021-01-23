<template>
	<div class="tile is-ancestor">
		<div class="tile is-12 is-vertical">
			<div class="tile box">
				<div class="container">
					<h4 class="title is-size-5">Add Category</h4>
					<category-component
						v-on:refresh="getData"
					></category-component>
				</div>
			</div>
			<div class="tile box">
				<div class="container">
					<div class="column is-half is-offset-one-quarter">
						<div class="field has-addons">
							<p class="control is-expanded">
								<input class="input is-fullwidth" type="text" placeholder="Search for a Category" v-model="search" @keyup="getData(1)">
							</p>
							<p class="control">
								<button class="button is-link">Search</button>
							</p>
						</div>
					</div>
					<category-component
						v-for="(category, index) in categories"
						:key="category.id"
						v-bind:category="category"
						v-on:delete="categories.splice(index, 1)"
					></category-component>
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
			categories: [],
			numPages: 1,
			search: '',
		};
	},

	mounted() {
		this.getData();
	},

	methods: {
		getData(page) {
			if (typeof(page) === 'undefined') page = 1;

			axios.get(`/api/categories?page=${page}&search=${this.search}`).then(({data}) => {
				this.categories = data.categories;
				this.numPages = data.meta.last_page;
			});
		},
	},
};
</script>
