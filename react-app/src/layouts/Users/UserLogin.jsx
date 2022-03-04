import axios from 'axios';
import '../../App.css';
import {useNavigate } from 'react-router-dom';
import React, { useState, useEffect } from 'react';
import {Card, Button, Col, Row, Form} from 'react-bootstrap';

export default function UserLogin() {
    const navigate = useNavigate ();
    const [user, setUser] = useState({
        'email'   : '',
        'password': '',
    });

    const { email, password }  = user;
 
    const onInputChange = e => {
        setUser({...user, [e.target.name]: e.target.value});
    }

    const loginUser = async e => {
        e.preventDefault();
        if(email && password ) {
            const users = await axios.post("http://laravelbackend.me/api/user-login", user);
            localStorage.setItem('users', JSON.stringify(users));
               
                navigate("/dashboard");
        } else {
            alert('Please Enter Correct Email/Password');
        }
      }

    return (
        <div >
            <Card className="container my-20">
                <Card.Header>Login</Card.Header>
                <Card.Body>
                        <Form onSubmit={loginUser}>

                            <Form.Group as={Row} className="mb-3" controlId="formHorizontalEmail">
                                <Form.Label column sm={2}>
                                    Email
                                </Form.Label>
                                <Col sm={10}>
                                    <Form.Control 
                                    type="email" 
                                    placeholder="Email" 
                                    name="email"
                                    value={email} 
                                    onChange={(e)=>onInputChange(e)}/>
                                </Col>
                            </Form.Group>

                            <Form.Group as={Row} className="mb-3" controlId="formHorizontalPassword">
                                <Form.Label column sm={2}>
                                    Password
                                </Form.Label>
                                <Col sm={10}>
                                    <Form.Control 
                                    type="password" 
                                    placeholder="Password" 
                                    name="password"
                                    value={password}
                                    onChange={(e)=>onInputChange(e)}/>
                                </Col>
                            </Form.Group>

                            <Form.Group as={Row} className="mb-3">
                                <Col sm={{ span: 10, offset: 2 }}>
                                <Button type="submit">Login</Button>
                                </Col>
                            </Form.Group>

                        </Form>
                </Card.Body>
            </Card>
        </div>
    );
}