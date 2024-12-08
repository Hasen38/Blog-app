// Navbar.jsx
import React, { useState } from "react";
import { NavLink } from 'react-router-dom';
import { FaGithub } from "react-icons/fa";
import { FaInstagram } from "react-icons/fa";
import { FaFacebook } from "react-icons/fa";
import { GiHamburgerMenu } from "react-icons/gi";
import { MdOutlineClose } from "react-icons/md";
 

const Navbar = () => {
const [isMenuopen , setisMenuopen] = useState(false);
const togglemenu = ()=>{
  setisMenuopen(!isMenuopen);
}
     const navItems = [
         {path:"/", link:"Home"},
       {path:"/about" ,link:"About"},
         {path:"/blog" ,link:"Blog"},
         {path:"/contact" ,link:"Contact"},

     ];

  return( 
    <header className="bg-black text-white fixed top-0 left-0 right-0">
  <nav className=" px-4 py-4 md:flex max-w-7xl mx-auto  justify-between ">
    <h3 className="text-white font-bold">DEV<span className="text-orange-500 font-semibold">CONNECT</span></h3>
    {/* menuitems for md and above screens only */}
    <ul className="md:flex gap-12 text-lg cursor-pointer hidden">
{
        navItems.map(({path,link}) => <li className="text-white" key={path}>
            <NavLink className={({ isActive, isPending }) =>
                      isActive
                        ? "active"
                        : isPending
                        ? "pending"
                        : ""}  to={path} onClick={togglemenu}>{link}</NavLink>
            </li>
          )
}
            </ul>
        <div className="text-white lg:flex items-center hidden">
          <a href="/" className="hover:text-orange-400"><FaGithub /></a>
          <a href="/"className="hover:text-orange-400"><FaInstagram /></a>
          <a href="/" className="hover:text-orange-400"><FaFacebook/> </a>
          <a href="/login" className="bg-orange-400 rounded-md px-4 py-2 hover:bg-white hover:text-orange-400 transition-all duration-200 ease-in">Sign In</a>
        </div >
        <div className="md:hidden absolute right-3 top-4 ">
        <button onClick={togglemenu} className="cursor-pointer">
        { isMenuopen ? <MdOutlineClose className="w-5 h-5"/>
: <GiHamburgerMenu className="w-5 h-5"/> }
          </button>
          </div>
          <div>
            {/* menuitems only for mobile screen */}

          <ul className={`md:hidden gap-12 text-lg block space-y-3 bg-white ${isMenuopen ? " w-full top-0 left-0 transition-all duration-150 ease-out" : "hidden"}`}>
{
        navItems.map(({path,link}) => <li className="text-black" key={path}>
            <NavLink className={({ isActive, isPending }) =>
                      isActive
                        ? "active"
                        : isPending
                        ? "pending"
                        : ""} to={path} onClick={togglemenu}>{link}</NavLink>
            </li>
          )
}
            </ul>
          </div>          
  </nav>
  </header>
  );
}


export default Navbar;
