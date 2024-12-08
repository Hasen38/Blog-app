import React,{useContext} from 'react'
import Banner from '../components/banner';
import {MainContext}  from '../Context/Maincontext';

function home() {
  const {name} = useContext(MainContext);
  return (
    <div>
       <Banner/>
    <h1>{ name }</h1>
    </div>

  )
}

export default home;

