import axios from 'axios';
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import Card from '../components/Card';

export default function AddProduct() {

  const [product, setProduct] = useState({
    pName         : '',
    description   : '',
    productPrice  : ''
  });

 const { pName,description,productPrice } = product;

 const onInputChange = e => {
   setProduct({...product, [e.target.name]: e.target.value});
 }
  const createProduct = async e =>
  {
    e.preventDefault();
    // console.log(product);
    await axios.post("http://laravelbackend.me/api/add-product", product);
    alert('data submitted');
    window.location.reload();
  }

  return (
    <div className='main'>
       <Card className='card-header'>
           <h4>Add Products</h4>
       </Card>
       <Card className = 'card-body'>
         <form onSubmit={createProduct}>
            <input
              type="text"
              placeholder='product Name'
              className='form-control'
              name="pName"  
              value={pName}
              onChange={(e) => onInputChange(e)}/>

            <input 
              type="text"
              placeholder='Description'
              className='form-control'
              name="description"
              value={description}
              onChange={(e) => onInputChange(e)}/>

            <input 
              type="text"
              placeholder='Product Price'
              className='form-control'
              name="productPrice"
              value={productPrice}
              onChange={(e) => onInputChange(e)}/>

              <button type='submit' className="btn btn-primary" >Submit</button>
          </form>
       </Card>
    </div>
  );
}

