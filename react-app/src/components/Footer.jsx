import React from 'react';
import '../App.css';

export default function Footer() {
    return (
        <div className="container-fuild">
            <footer className="page-footer font-small blue-grey lighten-5" >
                <div className="row">
                    <div className="col-md-4" >
                    <div className="footer-copyright text-center text-black-50 ">Cloud Dashboard</div>
                    </div>
                    <div className="col-md-4">
                    <div className="footer-copyright text-center text-black-50 ">© BBCS 2021 All Right Reserved</div>
                    </div>
                    <div className="col-md-4">
                    <div className="footer-copyright text-center text-black-50 ">midgard Environment . Version 0.5</div>
                    </div>
                </div>
            </footer>
        </div>
    );
}