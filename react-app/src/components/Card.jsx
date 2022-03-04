import React from 'react';

const Card = props => {
  return (
    <div className='card'>
      <div className={`${props.className}`}>
        {props.children}
      </div>
    </div>
  );
}
export default Card;
