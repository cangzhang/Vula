<template>
    <div class="top-link">
        <div class="top-right">
            {{ msg }}
        </div>
    </div>
</template>

<script>
	module.exports = {
		name    : 'topLink',
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