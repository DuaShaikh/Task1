import React from 'react';
import { Link } from 'react-router-dom';

export default function Button(props) {
  return (
    <div>
       <Link to={`${props.link}`} className={`${props.className}`}>{props.children} </Link>
    </div>
  );
}
