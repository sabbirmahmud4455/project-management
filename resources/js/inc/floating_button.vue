<template lang="">
    <div>
        <div class="position-absolute;" style="right:0;bottom:0;">
            <div style="padding:20px;background:#eee;width:50px;height:50px;float:right;border-radius:50%">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
        </div>

    </div>
</template>
<script>
export default {
  mounted() {
    document.body.insertBefore(this.$el, document.body.firstChild);
  },
};
</script>
<style lang="">
</style>
