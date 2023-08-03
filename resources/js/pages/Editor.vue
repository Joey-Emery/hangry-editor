<script setup>
	import SidebarComponents from '../components/SidebarComponents.vue';
	import SidebarConfig from '../components/SidebarConfig.vue';
	import CreatePage from '../components/CreatePage.vue';
	import PageRenderer from '../components/PageRenderer.vue';

	window.$ = require('jquery');
	require('jquery-ui-bundle');
</script>

<template>
	<div class="page page-editor">
		<div class="editor-wrapper" v-if="project && project.status == 200">
			<SidebarComponents />
			<section class="editor">
				<PageRenderer v-if="active_page" />
				<CreatePage v-else />
			</section>
			<SidebarConfig />
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				auto_page_set: false,
			}
		},

		computed: {
			project()
			{
				return this.$store.state.project;
			},

			active_page()
			{
				return this.$store.state.active_page;
			}
		},

		mounted()
		{
			this.$store.dispatch('getProject', {id: this.$route.params.project});
		},

		updated()
		{
			if(!this.auto_page_set) this.setActivePage();
		},

		methods: {
			setActivePage()
			{
				if(this.active_page || !this.project || this.project.status != 200) return;

				if(this.project.data.pages && this.project.data.pages.length > 0) {
					this.auto_page_set = true;
					this.$store.commit('setActivePage', this.project.data.pages[0]);
				}
			},
		}
	}
</script>