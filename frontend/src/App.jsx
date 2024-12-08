import React from 'react';
import {createBrowserRouter,createRoutesFromElements,Route } from 'react-router-dom';
import Mainlayout from './layout/Mainlayout';
import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/blog';
import Login from './pages/Login';
// import Register from './pages/Register';
import Contact from './pages/Contact';
import './index.css';
import Signup from './pages/Signup';

    const router = createBrowserRouter(
        createRoutesFromElements(
        <>
            <Route path='/'  element={<Mainlayout/>}>
            <Route index element={<Home />} />
            <Route path='blog'  element={<Blog />} />
            <Route path='about'  element={<About />} />
            <Route path='contact'  element={<Contact />} />
            </Route>
                <Route path='/login' element={<Login/>}/>
                <Route path='/Signup' element={<Signup/>}/>
            </>
        )
    ); 

    
         
      
       

export default router;
