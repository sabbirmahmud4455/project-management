<template lang="">
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <!-- vue route view -->
                            <userList></userList>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import userList from "./user_table/user_list";

export default {
    components: {
        userList
    },
    mounted() {
        console.log("user list");
    }
};
</script>
<style lang=""></style>
