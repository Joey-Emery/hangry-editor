<template>
	<div class="well-wrapper" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
		<div class="well">{{ contents.content }}</div>
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