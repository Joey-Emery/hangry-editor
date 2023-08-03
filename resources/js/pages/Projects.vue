<script setup>
	import axios from 'axios';
	import moment from 'moment';
</script>

<template>
	<div class="page page-projects">
		<aside class="recent">
			<h2 class="title">Load Existing Project</h2>

			<div class="project-wrapper" v-if="projects && projects.status == 200">
				<router-link
					exact
					:to="{name: 'editor', params: {project: project.id}}"
					v-for="project in projects.data"
					class="project"
				>
					<h2>{{ project.name }}</h2>
					<p>Created {{ moment(project.created_at).fromNow() }}</p>
				</router-link>
			</div>
		</aside>

		<div class="content">
			<div class="inner">
				<div class="logo">
					<span class="far fa-brush"></span>
					<h1>Hangry</h1>
					<h2>Editor</h2>
				</div>
				<div class="create-project">
					<h2>Create new Project</h2>
					<form @submit.prevent="createProject">
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
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				model: {
					name: '',
				}
			}
		},

		computed: {
			projects()
			{
				return this.$store.state.projects;
			}
		},

		mounted()
		{
			this.$store.dispatch('getProjects');
			$('.create-project .form-control').focus();
		},

		methods: {
			createProject()
			{
				if(!this.model || this.model.name == '') return;

				axios.post(`/api/projects`, {name: this.model.name})
					.then(response => {
						this.$router.push({
							name: 'editor',
							params: {
								project: response.data.id,
							}
						});
					}).catch(error => {
						alert('Unexpected error occured');
					})
			}
		}
	}
</script>