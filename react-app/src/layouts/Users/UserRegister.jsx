import axios from 'axios';
import '../../App.css';
import {useNavigate } from 'react-router-dom';
import React, { useState } from 'react';
import {Card, Button, Col, Row, Form} from 'react-bootstrap';

export default function UserRegister(props) {
    const navigate = useNavigate ();

    const [user, setUser] = useState({
        'name'    : '',
        'email'   : '',
        'password': '',
        'gender'  : '',
        'phone'   : ''
    });

    const { name, email, password, gender, phone }  = user;

    const onInputChange = e => {
        setUser({...user, [e.target.name]: e.target.value});
    }

    console.log(user);
    const registerUser = e => {
        e.preventDefault();
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post(`api/user-register`, user).then(res=>{
                if(res.data.status == 200) {
                    alert('data submitted');
                    navigate('/');
                }
            });
      });
    }

    return (
        <div >
            <Card className="container my-20">
                <Card.Header>Register</Card.Header>
                <Card.Body>
                        <Form onSubmit={registerUser}>
                            <Form.Group as={Row} className="mb-3" >
                                <Form.Label column sm={2}>
                                    Name
                                </Form.Label>
                                <Col sm={10}>
                                    <Form.Control 
                                    type="text" 
                                    placeholder="Name" 
                                    name="name" 
                                    value={name}
                                    onChange={(e)=>onInputChange(e)}/>
                                </Col>
                            </Form.Group>

                            <Form.Group as={Row} className="mb-3" >
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

                            <Form.Group as={Row} className="mb-3" >
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

                            <Form.Group as={Row} className="mb-3" >
                                <Form.Label column sm={2}>
                                    Phone
                                </Form.Label>
                                <Col sm={10}>
                                    <Form.Control 
                                    type="text" 
                                    placeholder="Phone Number" 
                                    name="phone"
                                    value={phone}
                                    onChange={(e)=>onInputChange(e)}/>
                                </Col>
                            </Form.Group>
                            <fieldset>
                                <Form.Group as={Row} className="mb-3">
                                    <Form.Label as="legend" column sm={2}>
                                        Gender
                                    </Form.Label>
                                    <Col sm={10}>
                                        <Form.Check
                                        type="radio"
                                        label="Male"
                                        name="gender"
                                        value="M"
                                        onChange={(e)=>onInputChange(e)}
                                        />
                                        <Form.Check
                                        type="radio"
                                        label="Female"
                                        name="gender"
                                        value="F"
                                        onChange={(e)=>onInputChange(e)}
                                        />
                                    </Col>
                                </Form.Group>
                            </fieldset>
                            {/* <Form.Group as={Row} className="mb-3" controlId="formHorizontalCheck">
                                <Col sm={{ span: 10, offset: 2 }}>
                                <Form.Check label="Remember me" />
                                </Col>
                            </Form.Group> */}

                            <Form.Group as={Row} className="mb-3">
                                <Col sm={{ span: 10, offset: 2 }}>
                                <Button type="submit">Register</Button>
                                </Col>
                            </Form.Group>

                        </Form>
                </Card.Body>
            </Card>
        </div>
    );
}