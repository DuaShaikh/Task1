import React from 'react';
import {Outlet, Navigate} from 'react-router-dom';

const useAuth = () => {
    const auth_token = localStorage.getItem('auth_token')
    if(auth_token) {
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
