import React from 'react';
import {BrowserRouter,Router, Routes, Route, Navigate} from 'react-router-dom';
import Dashboard from '../../layouts/Users/Dashboard';
import UserLogin from '../../layouts/Users/UserLogin';
import UserRegister from '../../layouts/Users/UserRegister';
import ProtectedRoute from './ProtectedRoute';
import PublicRoutes from './PublicRoutes';
import Profile from '../../layouts/Users/Profile';

export default function ReactRouter(){

    const user = localStorage.getItem('users');
    console.log(user);

return (
    <Routes>
        <Route exact path='/' element={<PublicRoutes />} >
            <Route exact path='/' element={<UserLogin />} />
            <Route path='/register' element={<UserRegister/>} />
        </Route>
        <Route path="/dashboard" element={<ProtectedRoute />} >
            <Route path='/dashboard' element={<Dashboard/>}/>
            <Route path='/dashboardprofile' element={<Profile/>}/>
        </Route>
    </Routes>
);
}