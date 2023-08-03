<script setup>
	import axios from 'axios';
	import _ from 'lodash';
	import Swal from 'sweetalert2'
</script>

<template>
	<div class="page-renderer">
		<div
			class="component-wrapper"
			v-if="components_loaded && active_page.components && active_page.components.length > 0"
			v-for="component in active_page.components"
			@click="selectComponent(component)"
			:data-id="component.page_component_id"
		>
			<component :is="getComponent(component.identifier)" :contents="component.contents" />
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				components_loaded: false,
				loaded_components: {},
			}
		},

		computed: {
			active_page()
			{
				return this.$store.state.active_page;
			}
		},

		mounted() {
			this.importComponents();
			this.enableDroppable();
			this.enableSortable();

			$('body').on('click', '.page-renderer .block-renderer', function(e) {
				e.preventDefault();
			});
		},

		methods: {
			importComponents()
			{
				var _context = this;

				axios.get('/api/components')
					.then(response => {
						_.each(response.data, function(component) {
							_context.loaded_components[component.identifier] = {
								name: component.name,
								identifier: component.identifier,
								component: require(`./app/${component.filename}.vue`).default,
							}
						});

						_context.components_loaded = true;
					});
			},

			enableDroppable()
			{
				var _context = this;

				$('.page-renderer').droppable({
					accept: '.component',
					drop: function(event, ui)
					{
						var component_id = $(ui.helper).data('id');

						axios.post(`/api/pages/${_context.active_page.id}`, {component_id: component_id})
							.then(response => {
								_context.$store.dispatch('getProject', {id: _context.$route.params.project});
								_context.$root.reloadActivePage(_context.active_page.id, false);
							});
					}
				});
			},

			enableSortable()
			{
				var _context = this;

				$('.page-renderer').sortable({
					axis: 'y',
					accept: '.component-wrapper',
					update()
					{
						var updates = {};
						$('.page-renderer .component-wrapper').each(function() {
							var id = $(this).data('id'),
								index = ($(this).index() + 1);

							updates[id] = index;
						});

						axios.put(`/api/pages/${_context.active_page.id}/order`, updates)
							.then(response => {
								_context.$store.commit('addToast', {
									title: "Component Order Saved",
									text: "The order of your components has been updated",
									type: 'success',
								});

								var page_id = _context.active_page.id;

								_context.$store.dispatch('getProject', {id: _context.$route.params.project});
								_context.$root.reloadPageComponents(page_id, false);
							});
					}
				});

				$('.page-renderer').sortable('disable');
			},

			getComponent(identifier)
			{
				return this.loaded_components[identifier].component;
			},

			selectComponent(component)
			{
				var _context = this;
				
				switch(this.$root.activeTool) {
					case 'pointer':
						this.$store.commit('setActiveComponent', component);
					break;

					case 'delete':
						Swal.fire({
							title: "Delete this component?",
							text: "Are you sure you want to remove this component? Changes cannot be undone",
							icon: 'question',
							heightAuto: false,
							showCancelButton: true,
							cancelButtonText: "No",
							confirmButtonText: "Yes",
						}).then(response => {
							if(response.isConfirmed) {
								axios.delete(`/api/page_components/${component.page_component_id}`)
									.then(response => {
										_context.$root.reloadActivePage(_context.active_page.id, true);
										_context.$store.dispatch('getProject', {id: _context.$route.params.project});
									});
							}
						});
					break;
				}
			}
		}
	}
</script>