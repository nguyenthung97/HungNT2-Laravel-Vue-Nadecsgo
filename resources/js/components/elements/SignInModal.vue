<template>
    <div
        id="add-nade-wrapper"
        style="position: absolute; top: 16px; right: 16px; z-index: 1"
    >
        <div v-if="authUserSteamId == null">
            <button class="add-btn" @click="showModal = true">
                <span style="font-size: 13px; font-weight: 700">Add Nade</span>
                <i class="fas fa-plus" fill="green"></i>
            </button>
            <transition name="modal">
                <div v-if="showModal">
                    <div class="modal-bg">
                        <div class="modal-wrapper">
                            <button class="close-modal" @click="showModal = false">
                                <i
                                    class="fas fa-times"
                                    style="
                                        fill: black;
                                        stroke: white;
                                        height: 1em;
                                        width: 1em;
                                    "
                                ></i>
                            </button>
                            <div class="modal-title">
                                <h3>Sign In Required</h3>
                            </div>
                            <div class="modal-content">
                                <div class="sign-in-warming">
                                    <div class="section">
                                        Sign in and you can...
                                    </div>
                                    <div class="section">
                                        <span>
                                            <i
                                                class="icon-plus fas fa-plus"
                                            ></i>
                                            <span>Add new nades</span>
                                        </span>
                                    </div>
                                    <div class="section">
                                        <span>
                                            <i
                                                class="icon-star fas fa-star"
                                            ></i>
                                            <span>Favorite nades</span>
                                        </span>
                                    </div>
                                    <div class="section">
                                        <span>
                                            <i class="fas fa-comment"></i>
                                            <span>Comment on nades</span>
                                        </span>
                                    </div>
                                    <div class="btn-wrapper">
                                        <div
                                            class="steam-login-wrapper-warning"
                                        >
                                            <a href="../login">
                                                <button class="btn btn-primary">
                                                    <i class="fab fa-steam"></i
                                                    >Sign in with STEAM
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
        <div v-else>
            <a href="../createnade">
                <button class="add-btn">
                    <span style="font-size: 13px; font-weight: 700"
                        >Add Nade</span
                    >
                    <i class="fas fa-plus" fill="green"></i>
                </button>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'signin-modal-component',
    data() {
        return {
            showModal: false,
            authUserSteamId: null,
        };
    },
    created() {
        this.authUserSteamId = window.authUserSteamId
    },
};
</script>
