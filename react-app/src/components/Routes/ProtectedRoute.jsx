import React from 'react';
import {Outlet, Navigate} from 'react-router-dom';

const useAuth = () => {
    const user = localStorage.getItem('users')
    if(user) {
        return true
    } else {
        return false
    }
}

const ProtectedRoute = (props) => {

    const auth = useAuth()

    return (
        auth ? <Outlet /> : <Navigate to='/' />
    );
}

export default ProtectedRoute;
c