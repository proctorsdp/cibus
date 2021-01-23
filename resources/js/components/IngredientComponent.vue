<template>
	<article class="media">
		<div class="media-content">
			<div class="content">
				<div v-on:keyup.enter="saveIngredient" v-on:keyup.esc="cancelEdit">
					<p class="control">
						<input type="text" class="input" placeholder="Ingredient Name" v-model="name" v-bind:class="{ 'is-static': !edit, 'has-text-weight-bold': !edit }" v-bind:readonly="!edit">
					</p>
					<p class="control">
						<input type="text" class="input" placeholder="Ingredient Description" v-model="description" v-bind:class="{ 'is-static': !edit, 'is-italic': !edit }" v-bind:readonly="!edit">
					</p>
					<template v-if="edit">
						<p class="select">
							<select v-model="category_id">
								<option value="" disabled selected>Select a Category</option>
								<option
									v-for="category in categories"
									:key="category.id"
									v-bind:value="category.id"
								>{{category.name}}</option>
							</select>
						</p>
					</template>
					<template v-else>
						<span class="tag is-primary">{{category_name}}</span>
					</template>
				</div>
			</div>
		</div>
		<div class="media-right">
			<template v-if="edit">
				<template v-if="isOld">
					<div>
						<span v-if="isOld" class="icon is-medium has-text-link" v-on:click="cancelEdit">
							<i class="fa fa-times"></i>
						</span>
					</div>
					<div>
						<span v-if="isOld" class="icon is-medium has-text-link" v-on:click="deleteIngredient">
							<i class="fa fa-trash-o"></i>
						</span>
					</div>
				</template>
				<span class="icon is-medium has-text-link" type="submit" v-on:click="saveIngredient">
					<i class="fa fa-floppy-o"></i>
				</span>
			</template>
			<span v-else class="icon is-medium has-text-link" v-on:click="editIngredient">
				<i class="fa fa-pencil"></i>
			</span>
		</div>
	</article>
</template>

<script>
export default {
	props: {
		ingredient: {
			type: Object,
			default: function() {
				return {
					id: null,
					name: '',
					description: '',
				};
			},
		},
		categories: {
			type: Array,
			default: function() {
				return [{
					id: '',
					name: '',
				}];
			},
		},
	},

	data() {
		return {
			id: null,
			name: '',
			description: '',
			edit: false,
			isOld: true,
			category_id: '',
			category_name: '',
		};
	},

	mounted() {
		this.id = this.ingredient.id;

		if (this.id === null) {
			this.isOld = false;
			this.edit = true;
		} else {
			this.name = this.ingredient.name;
			this.description = this.ingredient.description;
			this.category_id = this.ingredient.category.id;
			this.category_name = this.ingredient.category.name;
		}
	},

	methods: {
		editIngredient() {
			this.edit = true;
		},

		cancelEdit() {
			this.edit = false;
		},

		saveIngredient() {
			axios({
				method: this.id === null ? 'POST' : 'PUT',
				url: this.id === null ? '/api/ingredients' : `/api/ingredients/${this.id}`,
				data: {
					id: this.id,
					name: this.name,
					description: this.description,
					category_id: this.category_id,
				},
			}).then(({data}) => {
				if (this.isOld) {
					const newIngredient = data.ingredient;
					this.edit = !this.edit;
					this.id = newIngredient.id;
					this.name = newIngredient.name;
					this.description = newIngredient.description;
					this.category_id = newIngredient.category.id;
				} else {
					this.name = '';
					this.description = '';
					this.$emit('refresh');
				}
			});
		},

		deleteIngredient() {
			axios.delete(`/api/ingredients/${this.id}`).then(({data}) => {
				if (data) {
					this.$emit('delete');
				}
			});
		},
	},
};
</script>
