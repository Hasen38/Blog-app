// App.jsx
// import React from 'react';
import {createBrowserRouter,createRoutesFromElements,RouterProvider,Route } from 'react-router-dom';
import Guestlayout from './layout/Guestlayout';
import Mainlayout from './layout/Mainlayout';
import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/blog';
import Login from './pages/Login';
import Signup from './pages/Signup';
import Contact from './pages/Contact';
import './index.css';


// import Login from './pages/Login';
// import Signup from './pages/Signup';
// import {RouterProvider} from 'react-router-dom'


function App() {

    const router = createBrowserRouter(
        createRoutesFromElements(
        <>
            <Route path='/'  element={<Mainlayout/>}>
            <Route index element={<Home />} />
            <Route path='blog'  element={<Blog />} />
            <Route path='about'  element={<About />} />
            <Route path='contact'  element={<Contact />} />
            </Route>
            <Route  element={<Guestlayout/>}>
                <Route path='/Login' element={<Login/>}/>
                <Route path='/Signup' element={<Signup/>}/>
            </Route>
            </>
        )

); 
    return (
        <div>
         
       <RouterProvider router={router}/>
       </div>
);
}
export default App;
