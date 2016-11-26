<template>
    <div class="flex-center position-ref full-height">
        <top-link></top-link>
        <div class="content">
            <div class="title m-b-md">
                {{ title }}
            </div>
            <button @click="getTitle()">ALERT 1</button>

            <div class="links">
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
            </div>
        </div>
    </div>
</template>

<script>
	import TopLink from './components/TopLink.vue'

	module.exports = {
		name      : 'indexPage',
		components: {
			TopLink
		},
		data() {
			return {
				title: 'Note'
			}
		},
		methods   : {
			getTitle() {
				alert('123')
			}
		}
	};
</script>

<style>
</style>