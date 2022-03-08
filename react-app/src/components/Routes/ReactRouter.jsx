import React from 'react';
import { Routes, Route } from 'react-router-dom';
import Dashboard from '../../layouts/Users/Dashboard';
import UserLogin from '../../layouts/Users/UserLogin';
import UserRegister from '../../layouts/Users/UserRegister';
import ProtectedRoute from './ProtectedRoute';
import PublicRoutes from './PublicRoutes';
import Profile from '../../layouts/Users/Profile';
import UserRecord from '../../layouts/Users/UserRecord';

export default function ReactRouter(){

return (
    <Routes>
        <Route exact path='/' element={<PublicRoutes />} >
            <Route exact path='/' element={<UserLogin />} />
            <Route path='/register' element={<UserRegister/>} />
        </Route>
        <Route path="/dashboard" element={<ProtectedRoute />} >
            <Route path='/dashboard' element={<Dashboard/>}/>
            <Route path='/dashboard/user-record/:id' element={<UserRecord/>}/>
            <Route path='/dashboard/profile/:id' element={<Profile/>}/>
        </Route>
    </Routes>
);
}