<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-0">
            <router-link to="/" class="navbar-brand">
                <img
                    alt="CSGO Nades logo"
                    :src="'/logo.png'"
                    width="55"
                    height="36"
                />
            </router-link>
            <div class="d-flex ml-auto flex-row">
                <div class="p-2">
                    <button
                        class="btn border-secondary"
                        onclick="darkModeTrigger()"
                    >
                        <i class="fas fa-moon"></i>
                    </button>
                </div>

                <div class="p-2" v-if="authUserName == null">
                    <a href="/login">
                        <button class="btn btn-primary">
                            <i class="fab fa-steam"></i>
                            Sign in with <strong>STEAM</strong>
                        </button>
                    </a>
                </div>
                
               
                <div class="p-2" v-else>
                    <div class="dropdown">
                    <button type="button" class="dropdown-toggle btn p-0" style="outline:none; border:none; background:transparent" data-toggle="dropdown">
                        <img :src="authUserAvatar" style="align-self: center; width: 40px; height: 38px; border-radius: 50%; margin-right: 6px;">
                        <span class="pr-1 text-dark">{{authUserName}}</span>
                    </button>
                    <div>
                        <ul class="dropdown-menu">
                            <li><router-link class="dropdown-item" to="../createnade">Add Nades</router-link></li>
                            <li><router-link class="dropdown-item" :to="{name: 'UserDetail', params: {usersteamid: authUserSteamId}}">Profile</router-link></li>
                            <li><a class="dropdown-item" href="#" @click.prevent="logout">Logout</a></li>
                        </ul>
                       
                    </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
<script>
export default {
    name: "header-component",
    data() {
        return {
            authUserName: null,
            authUserSteamId: null,
            authUserAvatar: null
            }
        },

        created() {
           this.authUserName = window.authUserName;
           this.authUserAvatar = window.authUserAvatar;
           this.authUserSteamId = window.authUserSteamId
        },
         methods:{
            logout:function(){
               axios.post('logout').then(response => {
                  if (response.status === 302 || 401) {
                     this.$router.go('/');
                  }
                }).catch(error => {
                    console.log(error)
              });
            },
        },
    
};
</script>
