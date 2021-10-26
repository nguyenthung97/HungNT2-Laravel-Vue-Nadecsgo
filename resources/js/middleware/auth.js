import store from "~/store/index.js";

export default async (to, from, next) => {
    if (!store.getters["auth/check"]) {
        next("/login");
    } else {
        next();
    }
};
