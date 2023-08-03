<script setup>
	import Glide from '@glidejs/glide'
</script>

<template>
	<div class="header-hero" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
		<div class="glide">
		  	<div class="glide__track" data-glide-el="track">
		    	<ul class="glide__slides">
		      		<li class="glide__slide">
		      			<img src="https://picsum.photos/300/200?random=1" />
		      		</li>
		      		<li class="glide__slide">
		      			<img src="https://picsum.photos/300/200?random=2" />
		      		</li>
		      		<li class="glide__slide">
		      			<img src="https://picsum.photos/300/200?random=3" />
		      		</li>
		    	</ul>
		    	<div class="glide__bullets" data-glide-el="controls[nav]">
				    <button class="glide__bullet" data-glide-dir="=0"></button>
				    <button class="glide__bullet" data-glide-dir="=1"></button>
				    <button class="glide__bullet" data-glide-dir="=2"></button>
				</div>
		  	</div>
		</div>	
	</div>
</template>

<script>
	export default {
		props: {
			contents: {
				required: true,
			}
		},
		
		mounted()
		{
			new Glide('.glide', {
				gap: 0,
				autoplay: 2000,
			}).mount();
		},
	}
</script>