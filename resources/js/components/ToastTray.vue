<template>
	<div class="toast-tray">
		<div
			v-for="toast, index in toasts"
			class="toast"
			:class="'toast-' + toast.type"
			@click.prevent="removeToast(index)"
		>
			<h2>{{ toast.title }}</h2>
			<p>{{ toast.text }}</p>
		</div>
	</div>
</template>

<script>
	export default {
		computed: {
			toasts()
			{
				return this.$store.state.toasts;
			}
		},

		methods: {
			removeToast(index)
			{
				this.$store.commit('removeToast', index);
			}
		}
	}
</script>