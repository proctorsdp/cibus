<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ user }}
                    </div>

                    <div class="card-body">
                        <ul>
							<li v-for="recipe in recipes" :key="recipe.title">
								{{ recipe.title }}
							</li>
						</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

	data() {
		return {
			user: null,

			recipes: [],
		};
	},

	ready() {
		this.getData();
	},

	mounted() {
		console.log('Component mounted.');
		this.getData();
		console.log(this.recipes);
	},

	methods: {
		getData() {
			axios.get('/api/user').then((response) => {
				this.user = response.data.name;
			});

			axios.get('/api/recipes').then((response) => {
				// TODO: requires two calls to data, why?
				this.recipes = response.data.recipes.data;
			});
		},
	},
};
</script>
