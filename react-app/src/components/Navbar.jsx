import React from 'react';
import {Nav, Navbar, Container, NavDropdown} from 'react-bootstrap';
import { useLocation, Link, useNavigate } from 'react-router-dom';
import '../App.css';
// import { useAuth } from './auth/AuthService';

export default function NavbarContainer() {
  
  const useAuth = () => {
    const auth_token = localStorage.getItem('auth_token')
    if(auth_token) {
        return true
    } else {
        return false
    }
  }

  const id = localStorage.getItem('id');
  const navigate = useNavigate();
  const location = useLocation();
  const user = useAuth();

  const logout = () => 
  {
      localStorage.removeItem("auth_token");
      localStorage.removeItem("id");
      navigate("/");
  }

  return (
    <Navbar collapseOnSelect expand="lg" variant="dark" className='bg-purple-700'>
    <Container>
    <Navbar.Brand href="/">React-App</Navbar.Brand>
    <Navbar.Toggle aria-controls="responsive-navbar-nav"/>
    <Navbar.Collapse id="responsive-navbar-nav">
      <Nav className="me-auto">
      </Nav>
      <Nav>
        { !user &&
          <>
            <Link to="/" className={location.pathname==='/' ? 'active' : 'unActive'} >Login</Link>
            <Link to="/register" className={location.pathname==='/register' ? 'active' : 'unActive'}>Register</Link>
          </>
        }
        {
          user &&
            <>
            <Link to="/dashboard" className={location.pathname==='/dashboard' ? 'active' : 'unActive'} >Dashboard</Link>
             <NavDropdown
                id="nav-dropdown-dark-example"
                title="Account"
                menuVariant="dark">
                <Link to={{ pathname : `/dashboard/profile/${parseInt(id)}` }} className={location.pathname === 'dashboard/profile' ? 'active' : 'unActive'} >Profile</Link>
                <NavDropdown.Divider />
                <NavDropdown.Item  onClick={logout} className='unActive'>Logout</NavDropdown.Item>
              </NavDropdown>
            </>
        }
      </Nav>
    </Navbar.Collapse>
    </Container>
    </Navbar>
  );
}


