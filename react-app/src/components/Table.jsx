import React from "react";
import TableBody from "./TableBody";
import TableHead from "./TableHead";

const Table = ({ theadData, tbodyData, customClass }) => {
    console.log(tbodyData)
    return (
        <table className={customClass}>
            <thead>
                <tr>
                    {theadData.map((h) => {
                        return <TableHead key={h} item={h} />
                    })}
                </tr>
            </thead>
            <tbody>
                <TableBody data={tbodyData} />
            </tbody>
        </table>
    );
};

export default Table;