import React from 'react'
import { Outlet } from 'react-router-dom';
import Navbar from '../components/navbar';

function Mainlayout() {
  return (
    <div>
        <Navbar/>
        <Outlet/>
    </div>
  )
}

export default Mainlayout;
