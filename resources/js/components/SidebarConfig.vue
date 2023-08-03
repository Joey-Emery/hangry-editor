<script setup>
	import axios from 'axios';
</script>

<template>
	<aside class="config">
		<div v-if="active_component" class="active-component">
			<h1 class="title">{{ active_component.name }} <span class="far fa-times pull-right" @click.prevent="$store.commit('setActiveComponent', null)"></span></h1>

			<form style="margin: 0; padding: 0;" @submit.prevent="saveChanges">

				<div class="config-wrapper">
					<div class="item" v-for="value, name in active_component.contents" :data-id="name">
						<label>{{ name.replace('_', ' ') }}</label>
						<input type="text" class="form-control" :value="value" />
					</div>

					<input type="submit" class="btn btn-primary" value="Save Changes" />
				</div>
			</form>
		</div>

		<div v-else class="no-component">
			<span class="far fa-boxes-stacked"></span>
			<h2>No component selected</h2>
			<p>Select a component from the page to edit it's properties</p>
		</div>
	</aside>
</template>

<script>
	export default {
		computed: {
			active_component()
			{
				return this.$store.state.active_component;
			},

			active_page()
			{
				return this.$store.state.active_page;
			}
		},

		methods: {
			saveChanges()
			{
				var contents = {};

				$('.config-wrapper .item').each(function() {
					var name = $(this).data('id'),
						value = $(this).find('.form-control').val();

					contents[name] = value;
				});

				axios.put(`/api/page_components/${this.active_component.page_component_id}`, {contents: contents})
					.then(response => {
						this.$store.dispatch('getProject', {id: this.$route.params.project});
						this.$root.reloadActivePage(this.active_page.id, true);

						this.$store.commit('addToast', {
							title: "Updates Saved",
							text: "Your component has been updated",
							type: 'success',
						});
					});
			}
		}
	}
</script>