<template>
	<nav class="pagination" role="navigation" v-if="lastPage > 1">
		<button class="pagination-previous" @click="changePage(prevPage)" :disabled="prevPage == null">Previous</button>
		<button class="pagination-next" @click="changePage(nextPage)" :disabled="nextPage == null">Next page</button>
		<ul class="pagination-list">
			<li>
				<a class="pagination-link" :class="{ 'is-current': currentPage == 1 }" @click="changePage(1)">1</a>
			</li>
			<li :hidden="midPage <= 3">
				<span class="pagination-ellipsis">&hellip;</span>
			</li>
			<li v-if="lastPage > 4">
				<a class="pagination-link" :class="{ 'is-current': currentPage == midPrev }" v-text="midPrev" @click="changePage(midPrev)"></a>
			</li>
			<li v-if="lastPage > 2">
				<a class="pagination-link" :class="{ 'is-current': currentPage == midPage }" v-text="midPage" @click="changePage(midPage)"></a>
			</li>
			<li v-if="lastPage > 3">
				<a class="pagination-link" :class="{ 'is-current': currentPage == midNext }" v-text="midNext" @click="changePage(midNext)"></a>
			</li>
			<li :hidden="midPage >= lastPage-2">
				<span class="pagination-ellipsis">&hellip;</span>
			</li>
			<li>
				<a class="pagination-link" :class="{ 'is-current': currentPage == lastPage }" v-text="lastPage" @click="changePage(lastPage)"></a>
			</li>
		</ul>
	</nav>
</template>

<script>
export default {
	props: {
		lastPage: {
			type: Number,
			default: function() {
				return 1;
			},
		},
	},

	emits: {
		'update-page': null,
	},

	data() {
		return {
			currentPage: 1,
			nextPage: 2,
			prevPage: null,
			midPage: 3,
			midNext: 4,
			midPrev: 2,
			firstUpdate: true,
		};
	},

	beforeUpdate() {
		if (this.firstUpdate) {
			this.updatePages(this.currentPage);
			this.firstUpdate = false;
		}
	},

	methods: {
		updatePages(current) {
			if (typeof(current) === 'undefined') current = 1;

			this.currentPage = current;
			this.nextPage = this.currentPage < this.lastPage ? current+1 : null;
			this.prevPage = this.currentPage > 1 ? current-1 : null;

			if (this.currentPage === 1 || this.currentPage === this.lastPage) {
				this.midPage = Math.ceil(this.lastPage / 2);
			} else if (this.lastPage < 5) {
				this.midPage = this.midPage;
			} else if (this.currentPage === 2) {
				this.midPage = this.currentPage + 1;
			} else if (this.currentPage === this.lastPage-1) {
				this.midPage = this.currentPage - 1;
			} else {
				this.midPage = this.currentPage;
			}

			this.midPrev = this.midPage - 1;
			this.midNext = this.midPage + 1;
		},

		changePage(number) {
			this.updatePages(number);
			this.$emit('update-page', this.currentPage);
		},
	},
};
</script>
