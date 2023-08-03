<template>
	<div class="alert-wrapper" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
		<div class="alert" :class="'alert-' + contents.type">{{ contents.content }}</div>
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