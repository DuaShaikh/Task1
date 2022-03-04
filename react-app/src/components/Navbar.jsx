import React from 'react';
import {Nav, Navbar, Container, NavDropdown} from 'react-bootstrap';
import { useLocation, Link, useNavigate } from 'react-router-dom';
import '../App.css';

export default function NavbarContainer() {
  const useAuth = () => {
    const user = localStorage.getItem('users')
    if(user) {
        return true
    } else {
        return false
    }
}

  const navigate = useNavigate();
  const location = useLocation();
  const user = useAuth();

  const logout = () => 
  {
      localStorage.removeItem("users")
      navigate("/");
  }

  return (
    <Navbar collapseOnSelect expand="lg" variant="dark" className='bg-purple-700'>
    <Container>
    <Navbar.Brand href="#home">React-App</Navbar.Brand>
    <Navbar.Toggle aria-controls="responsive-navbar-nav" />
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
                <Link to="/dashboard/profile" className={location.pathname==='dashboard/profile' ? 'active' : 'unActive'} >Profile</Link>
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

