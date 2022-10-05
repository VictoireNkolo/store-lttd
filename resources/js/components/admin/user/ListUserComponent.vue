<template>
    <div>

    </div>
</template>

<script>

    import ApiUser  from    "../../../api/user/ApiUser";

    export default {
        components: {
        },
        data() {
            return {

            }
        },

        props: {
            users: Object
        },
        methods: {

            loadUserFromApi(url) {
                // chargement données utilisateurs
                ApiUser.loadUserFromApi(url)
                    .then( (res) => {
                        if (res.data) {

                        }
                    } )
                    .catch( (err) => {

                    } )
            },

            showDetail(id) {
                console.log(id);
            },

            deleteUser(id) {
                console.log(id);
            }


        },

        mounted() {

        }
    }
</script>

