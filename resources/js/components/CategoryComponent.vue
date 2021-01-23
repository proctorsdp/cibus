<template>
	<article class="media">
		<div class="media-content">
			<div class="content">
				<div v-on:keyup.enter="saveCategory" v-on:keyup.esc="cancelEdit">
					<p class="control">
						<input type="text" class="input" placeholder="Category Name" v-model="name" v-bind:class="{ 'is-static': !edit, 'has-text-weight-bold': !edit }" v-bind:readonly="!edit">
					</p>
					<p class="control">
						<input type="text" class="input" placeholder="Category Description" v-model="description" v-bind:class="{ 'is-static': !edit, 'is-italic': !edit }" v-bind:readonly="!edit">
					</p>
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
						<span v-if="isOld" class="icon is-medium has-text-link" v-on:click="deleteCategory">
							<i class="fa fa-trash-o"></i>
						</span>
					</div>
				</template>
				<span class="icon is-medium has-text-link" type="submit" v-on:click="saveCategory">
					<i class="fa fa-floppy-o"></i>
				</span>
			</template>
			<span v-else class="icon is-medium has-text-link" v-on:click="editCategory">
				<i class="fa fa-pencil"></i>
			</span>
		</div>
	</article>
</template>

<script>
export default {
	props: {
		category: {
			type: Object,
			default: function() {
				return {
					id: null,
					name: '',
					description: '',
				};
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
		};
	},

	mounted() {
		this.id = this.category.id;
		this.name = this.category.name;
		this.description = this.category.description;

		if (this.id === null) {
			this.isOld = false;
			this.edit = true;
		}
	},

	methods: {
		editCategory() {
			this.edit = true;
		},

		cancelEdit() {
			this.edit = false;
		},

		saveCategory() {
			axios({
				method: this.id === null ? 'POST' : 'PUT',
				url: this.id === null ? '/api/categories' : `/api/categories/${this.id}`,
				data: {
					id: this.id,
					name: this.name,
					description: this.description,
				},
			}).then(({data}) => {
				if (this.isOld) {
					const newCategory = data.category;
					this.edit = !this.edit;
					this.id = newCategory.id;
					this.name = newCategory.name;
					this.description = newCategory.description;
				} else {
					this.name = '';
					this.description = '';
					this.$emit('refresh');
				}
			});
		},

		deleteCategory() {
			axios.delete(`/api/categories/${this.id}`).then(({data}) => {
				if (data) {
					this.$emit('delete');
				}
			});
		},
	},
};
</script>
