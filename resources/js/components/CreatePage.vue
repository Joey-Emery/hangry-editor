<script setup>
	import axios from 'axios';
</script>

<template>
	<div class="create-page">
		<h2>Create a new page</h2>
		<form @submit.prevent="createPage">
			<div class="row row-xs">
				<div class="col-md-9">
					<input type="text" class="form-control" placeholder="Name" v-model="model.name" />
				</div>
				<div class="col-md-3">
					<input type="submit" class="btn btn-primary pull-right" value="Create" />
				</div>
			</div>
		</form>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				model: {
					name: null,
					project_id: null,
				}
			}
		},

		computed: {
			project()
			{
				return this.$store.state.project;
			}
		},

		mounted()
		{
			$('.create-page .form-control').focus();
		},

		methods: {
			createPage()
			{
				if(!this.model.name || this.model.name == '') return;

				this.model.project_id = this.project.data.id;

				axios.post(`/api/pages`, this.model)
					.then(response => {
						this.$store.dispatch('getProject', {id: this.$route.params.project});
						this.$store.commit('setActivePage', response.data);
					}).catch(error => {
						console.log(error);
					});
			}
		}
	}
</script>