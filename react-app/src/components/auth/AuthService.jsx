const useAuth = () => {
    const auth_token = localStorage.getItem('auth_token');
    if(auth_token) {
        return true
    } else {
        return false
    }
}