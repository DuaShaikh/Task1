import './App.css';
import  NavbarContainer from './components/Navbar';
import ReactRouter from './components/Routes/ReactRouter';

function App() {
  return (
    <div>
      <NavbarContainer />
      <ReactRouter />
    </div>
    // <BrowserRouter>
    //   <NavbarContainer />
    //   <ReactRouter />
    // </BrowserRouter>
    
  );
}
export default App;