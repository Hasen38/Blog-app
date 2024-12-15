import React, { useState,useEffect } from 'react'
import Banner from '../components/banner';
// import {MainContext}  from '../Context/Maincontext';
import axiosClient from '../Axios/Axios-client';
import Blogpage from '../components/Blogpage';

function Home() {
const [post,setPost] = useState(null);
// const [loading,setLoading]=useState(null);

const getblog =()=> {
    // Send GET request to Laravel api
    axiosClient.get('/posts')
    .then(({data})=>{
      setPost(data);
    });
}
  useEffect(() => {
      getblog();
    }, []);
  
    
  return (<>
    <div>  
       <Banner/>
       </div>
    <Blogpage/>
    </>
  );
}

export default Home;

