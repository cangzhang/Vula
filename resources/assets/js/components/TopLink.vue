<template>
    <div class="top-link">
        <div class="top-right">
            {{ msg }}
        </div>
    </div>
</template>

<script>
    console.info('in');
	export default {
		name:'topLink',
		data() {
			return {
				message: 'test'
			}
		},
        computed: {
			msg() {
				return this.message
            }
        }
	};
</script>

<style></style>