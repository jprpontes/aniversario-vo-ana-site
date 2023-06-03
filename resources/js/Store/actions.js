const signIn = ({ commit }, { token, user }) => {
    // $cookies.set("token", token);
    localStorage.setItem("token", token);
    localStorage.setItem("user", JSON.stringify(user));
    commit("setToken", token);
    commit("setUser", user);
};

const signOut = ({ commit }) => {
    // $cookies.set("token", token);
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    commit("setToken", null);
    commit("setUser", {});
};

const checkAuth = ({ commit }) => {
    // const token = $cookies.get("token");
    const token = localStorage.getItem("token");
    const user = localStorage.getItem("user");
    if (token && user) {
        commit("setToken", token);
        commit("setUser", JSON.parse(user));
    }
};

export { signIn, signOut, checkAuth };
