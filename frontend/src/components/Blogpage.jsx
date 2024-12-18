import React, { useEffect,useState } from 'react'
import axiosClient from '../Axios/Axios-client'
import Blogcard from '../components/blogcard';
function Blogpage() {
  const [loading,setLoading]=useState(null);
  const [posts,setPosts]=useState(null);
  const [error,setError]=useState(null);

  useEffect(() => {
    const fetchBlog = async () => {
      try {
    
        // Send GET request to Laravel API
        const response = await axiosClient.get('/posts');
        setPosts(response.data);  // Store the blog data in state
        setLoading(false);
      } catch (err) {
        setError('Error fetching blog post',err);
        setLoading(false);
      }
    };
    fetchBlog();
  }, []); 

  if (error) {
    return <div>{error}</div>; // Show loading text while fetching
  }

  return (
    <div className='mt-15'>
      <Blogcard posts={posts}/>
    </div>
  )
}

export default Blogpage;