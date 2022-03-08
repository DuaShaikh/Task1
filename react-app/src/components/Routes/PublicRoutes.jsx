import React from 'react';

import {Navigate, Outlet, useLocation} from 'react-router-dom'

const useAuth = () => {
  const auth_token = localStorage.getItem('auth_token')
  if(auth_token) {
      return true
  } else {
      return false
  }
}

const  PublicRoutes=(props) =>{
const location = useLocation();
  const auth = useAuth()

  return auth ? <Navigate to={{ pathname: "/dashboard", state:{ from: location.pathname } }}/>: <Outlet/>
}

export default PublicRoutes;