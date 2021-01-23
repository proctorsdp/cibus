<template>
	<article class="media">
		<div class="media-content">
			<div class="content">
				<div v-on:keyup.enter="saveTag" v-on:keyup.esc="cancelEdit">
					<p class="control">
						<input type="text" class="input" placeholder="Tag Name" v-model="name" v-bind:class="{ 'is-static': !edit, 'has-text-weight-bold': !edit }" v-bind:readonly="!edit">
					</p>
					<p class="control">
						<input type="text" class="input" placeholder="Tag Description" v-model="description" v-bind:class="{ 'is-static': !edit, 'is-italic': !edit }" v-bind:readonly="!edit">
					</p>
				</div>
			</div>
		</div>
		<div class="media-right">
			<template v-if="edit">
				<template v-if="isOld">
					<div>
						<span v-if="isOld" class="icon is-medium has-text-link" v-on:click="cancelEdit" v-on:keyup.enter="cancelEdit" tabindex="0">
							<i class="fa fa-times"></i>
						</span>
					</div>
					<div>
						<span v-if="isOld" class="icon is-medium has-text-link" v-on:click="deleteTag" v-on:keyup.enter="deleteTag" tabindex="0">
							<i class="fa fa-trash-o"></i>
						</span>
					</div>
				</template>
				<span class="icon is-medium has-text-link" type="submit" v-on:click="saveTag" v-on:keyup.enter="saveTag" tabindex="0">
					<i class="fa fa-floppy-o"></i>
				</span>
			</template>
			<span v-else class="icon is-medium has-text-link" v-on:click="editTag" v-on:keyup.enter="editTag" tabindex="0">
				<i class="fa fa-pencil"></i>
			</span>
		</div>
	</article>
</template>

<script>
export default {
	props: {
		tag: {
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
		this.id = this.tag.id;
		this.name = this.tag.name;
		this.description = this.tag.description;

		if (this.id === null) {
			this.isOld = false;
			this.edit = true;
		}
	},

	methods: {
		editTag() {
			this.edit = true;
		},

		cancelEdit() {
			this.edit = false;
		},

		saveTag() {
			axios({
				method: this.id === null ? 'POST' : 'PUT',
				url: this.id === null ? '/api/tags' : `/api/tags/${this.id}`,
				data: {
					id: this.id,
					name: this.name,
					description: this.description,
				},
			}).then(({data}) => {
				if (this.isOld) {
					const newTag = data.tag;
					this.edit = !this.edit;
					this.id = newTag.id;
					this.name = newTag.name;
					this.description = newTag.description;
				} else {
					this.name = '';
					this.description = '';
					this.$emit('refresh');
				}
			});
		},

		deleteTag() {
			axios.delete(`/api/tags/${this.id}`).then(({data}) => {
				if (data) {
					this.$emit('delete');
				}
			});
		},
	},
};
</script>
