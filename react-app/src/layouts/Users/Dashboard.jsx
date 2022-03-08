import React, {useEffect, useState} from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

const Dashboard = () => {

const [search, setSearch] = useState(['']);

const userID = localStorage.getItem('id');

const [users, setUsers] = useState([]);

const api = `/api/users/${userID}`; 

const token = localStorage.getItem('auth_token');

// const onInputChange = e => {
//     setSearch({...search, [e.target.name]: e.target.value});
// }

console.log(search);
  const getData = async () => {
    axios.get('/sanctum/csrf-cookie').then(response => {
      axios.get(api , { headers: {
        "Authorization" : `Bearer ${token}`,
        } 
      }).then(res => {
        if(res.data.status === 200) {
          setUsers(res.data.user);
        }
      });
    });
  }

  useEffect(() => {
  getData()
 
  }, []);

  return (
   <div>
    <div className="container mt-4">
      <div className="row">
        <div className="card">
          <div className="card-header">
              <div className="col-md-12">
              All Users
              </div>
              <div className="col-md-12 mt-4">
                  <input type="text" name="search" class="form-control form-input" autoComplete='off' placeholder="Search..." value={search} onChange={(e)=>setSearch(e.target.value)} />
              </div>
             </div>
          <div className="card-body">
            <table className='table table-stripped table-bordered'>
              <thead>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                </tr>
              </thead>
              <tbody>
                {users.filter(( user )=>{
                    if ( search=="" ) {
                    return user
                } else if ( user.name.toLowerCase().includes(search.toLowerCase())) {
                    return user
                }}).map(user =>(
                    <tr>
                        <td>{user.id}</td>
                        <td>{user.name}</td>
                        <td>{user.email}</td>
                        <td><Link to={{pathname : `/dashboard/user-record/${user.id}` }}><i className="fa-solid fa-eye text-purple-700 "></i></Link></td>
                    </tr>
                ))
                }
              </tbody>
            </table>
            </div>
          </div>
         </div>

    </div>
  
   </div>
  );
}

export default Dashboard;