import './App.css';
import axios from 'axios';
import  NavbarContainer from './components/Navbar';
import ReactRouter from './components/Routes/ReactRouter';

axios.defaults.xsrfHeaderName = "X-CSRFTOKEN";
axios.defaults.xsrfCookieName = "csrftoken";

axios.defaults.withCredentials = true
axios.defaults.baseURL = "http://laravel-app.me/";
axios.defaults.headers.post["Access-Control-Allow-Origin"]= "http://localhost:3000";
axios.defaults.headers.post["Content-Type"] = 'application/json';
axios.defaults.headers.post["Accept"] = 'application/json';


function App() {

  return (
    <div>
      <NavbarContainer />
      <ReactRouter />
    </div>    
  );
}
export default App;