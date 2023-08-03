<script setup>
	import axios from 'axios';
	import Swal from 'sweetalert2';
</script>

<template>
	<header class="main">
		<ul>
			<li v-if="project && project.status == 200">
				<p @click.prevent="togglePageDropdown" class="page-dropdown-toggle">{{ getActivePageName() }} <span class="far fa-caret-down"></span></p>
				<div class="page-dropdown">
					<a href="#" v-for="page in project.data.pages" :class="{active: (active_page && active_page.id == page.id)}" @click.prevent="setActivePage(page)">{{ page.name }}</a>
					<a href="#" @click.prevent="setActivePage(null)">Add new <span class="far fa-plus pull-right"></span></a>
				</div>
			</li>
			<li><a href="#" :class="{active: ($root.activeTool == 'pointer')}" @click.prevent="$root.updateActiveTool('pointer')"><span class="far fa-arrow-pointer"></span></a></li>
			<li><a href="#" :class="{active: ($root.activeTool == 'move')}" @click.prevent="$root.updateActiveTool('move')"><span class="far fa-compress"></span></a></li>
			<li><a href="#" :class="{active: ($root.activeTool == 'delete')}" @click.prevent="$root.updateActiveTool('delete')"><span class="far fa-eraser"></span></a></li>

			<li class="pull-right"><a href="#" @click.prevent="deletePage"><span class="far fa-trash"></span></a></li>
		</ul>
	</header>
</template>

<script>
	export default {
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

		methods: {
			togglePageDropdown()
			{
				$('.page-dropdown').toggleClass('open');
			},

			setActivePage(page)
			{
				this.$store.commit('setActivePage', page);
			},

			deletePage(page)
			{
				Swal.fire({
					title: "Delete this page?",
					text: "Are you sure you want to remove this page? Changes cannot be undone",
					icon: 'question',
					heightAuto: false,
					showCancelButton: true,
					cancelButtonText: "No",
					confirmButtonText: "Yes",
				}).then(response => {
					if(response.isConfirmed) {
						axios.delete(`/api/pages/${this.active_page.id}`)
							.then(response => {
								this.$store.dispatch('getProject', {id: this.$route.params.project});
								this.$store.commit('setActivePage', null);
							});
					}
				});
			},

			getActivePageName()
			{
				return (this.active_page) ? this.active_page.name : 'New page';
			}
		}
	}
</script>