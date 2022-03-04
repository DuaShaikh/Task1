import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Card from '../components/Card';
import Button from '../components/Button';
import Table from '../components/Table';

export default function Product() {

    const [products, setProducts] = useState([])

    const getData = async () => {
        await axios.get('http://laravelbackend.me/api/products').then(({data})=>{
            setProducts(data.data)
        })
      }
    
    useEffect(() => {
    getData()
    }, []);

    const theadData = ["Product Name", "Description", "Product Price"];

    const customClass = ['table table-bordered table-striped'];

    return (
        <div>
            
        </div>
    );
}

