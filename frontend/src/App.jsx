import React from 'react';
import {createBrowserRouter,createRoutesFromElements,Route } from 'react-router-dom';
import Mainlayout from './layout/Mainlayout';
import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/Blog';
// import Blogs from './pages/Blogs';
import Login from './pages/Login';
// import Verifyemail from './pages/Verifyemail'
import Contact from './pages/Contact';
import './index.css';
import Signup from './pages/Signup';
import Create from './pages/Create'

    const router = createBrowserRouter(
        createRoutesFromElements(
        <>
            <Route path='/'  element={<Mainlayout/>}>
            <Route index element={<Home />} />
            {/* <Route path='blogs'  element={<Blogs />} /> */}
            <Route path='about'  element={<About />} />
            <Route path='contact'  element={<Contact />} />
            <Route path='/blog/:post'  element={<Blog />} />
            </Route>
                <Route path='/login' element={<Login/>}/>
                <Route path='/Signup' element={<Signup/>}/>
                <Route path='/create' element={<Create/>}/>
                {/* <Route path='/verifyemail' element={<Verifyemail/>}/> */}
            </>
        )
    ); 

    
         
      
       

export default router;
