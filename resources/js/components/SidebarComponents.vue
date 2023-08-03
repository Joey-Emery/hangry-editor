<script setup>
	window.$ = require('jquery');
	require('jquery-ui-bundle');
</script>

<template>
	<aside class="components">
		<div class="category-wrapper" v-if="categories && categories.status == 200">
			<div class="category open" v-for="category in categories.data">
				<h2 class="title">
					{{ category.name }}
					<span class="fa fa-plus pull-right"></span>
					<span class="fa fa-minus pull-right"></span>
				</h2>
				<div class="component-wrapper open">
					<div class="component" v-for="component in category.components" :data-id="component.id" :data-name="component.name">
						<div class="image"></div>
						<div class="description">
							<h3>{{ component.name }}</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</aside>
</template>

<script>
	export default {
		computed: {
			categories()
			{
				return this.$store.state.component_categories;
			}
		},

		mounted()
		{
			this.$store.dispatch('getComponentCategories');

			$('body').on('click', '.category .title', function(e) {
				$(this).parent('.category').toggleClass('open');
			});
		},

		updated()
		{
			$('.components .category-wrapper .component').draggable({
				appendTo: 'body',
				helper: function(event, ui) {
					return "<div class='drag-helper' data-id='" + $(event.currentTarget).data('id') + "'><h2>" + $(event.currentTarget).data('name') + "</h2></div>";
				},
			});
		}
	}
</script>