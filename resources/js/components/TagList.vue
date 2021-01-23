<template>
	<div class="tile is-ancestor">
		<div class="tile is-12 is-vertical">
			<div class="tile box">
				<div class="container">
					<h4 class="title is-size-5">Add Tag</h4>
					<tag-component
						v-on:refresh="getData"
					></tag-component>
				</div>
			</div>
			<div class="tile box">
				<div class="container">
					<div class="column is-half is-offset-one-quarter">
						<div class="field has-addons">
							<p class="control is-expanded">
								<input class="input is-fullwidth" type="text" placeholder="Search for an Tag" v-model="search" @keyup="getData(1)">
							</p>
							<p class="control">
								<button class="button is-link">Search</button>
							</p>
						</div>
					</div>
					<tag-component
						v-for="(tag, index) in tags"
						:key="tag.id"
						v-bind:tag="tag"
						v-on:delete="tags.splice(index, 1)"
					></tag-component>
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
			tags: [],
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

			axios.get(`/api/tags?page=${page}&search=${this.search}`).then(({data}) => {
				this.tags = data.tags;
				this.numPages = data.meta.last_page;
			});
		},
	},
};
</script>
