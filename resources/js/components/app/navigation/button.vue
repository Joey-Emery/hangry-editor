<template>
	<div class="button-wrapper" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
		<a href="#" class="btn block-renderer" :class="'btn-' + contents.type">{{ contents.button }}</a>
	</div>
</template>

<script>
	export default {
		props: {
			contents: {
				required: true,
			}
		}
	}
</script>