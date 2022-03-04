import React from "react";

const TableBody = ({ data }) => {
    return data.map(item => (
        <tr key={item.id}>
            <td>{item.pName}</td>
            <td>{item.description}</td>
            <td>{item.productPrice}</td>
        </tr>
    ));
};

export default TableBody;