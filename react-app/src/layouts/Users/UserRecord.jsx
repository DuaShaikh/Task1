import React, {useEffect, useState} from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';

const UserRecord = () => {
  const { id } = useParams();
  
  const [user, setUser] = useState([]);

const api = `/api/user/${id}`; 

const token = localStorage.getItem('auth_token');
// console.log(token);

  const getData = async () => {
    axios.get('/sanctum/csrf-cookie').then(response => {
      axios.get(api , { headers: {
        "Authorization" : `Bearer ${token}`,
        } 
      }).then(res => {
        if(res.data.status === 200) {
          setUser(res.data.user);
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
          <div className="card-header">User Profile</div>
          <div className="card-body">
            <table className='table table-stripped table-bordered'>
              <thead>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <td>{user.id}</td>
                  <td>{user.name}</td>
                  <td>{user.email}</td>
                  <td>{user.phone}</td>
                  <td>{user.gender}</td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
         </div>

    </div>
  
   </div>
  );
}

export default UserRecord;