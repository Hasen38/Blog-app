import React, { useState,useEffect } from 'react'
import { useNavigate, useParams } from 'react-router-dom';
import axiosClient from '../Axios/Axios-client';

function Blog() {
  const [loading,setLoading]=useState(null);
  const [blog,setBlog]=useState(null);
  const {post} = useParams();
  const [error,setError]=useState(null);
const navigate = useNavigate();
  useEffect(() => {
    const fetchBlog = async () => {
      try {
        // Send GET request to Laravel API
        const response = await axiosClient.get(`posts/${post}`);
        setBlog(response.data);  // Store the blog data in state
        setLoading(false);
      } catch (err) {
        setError('Error fetching blog post',err);
        setLoading(false);
      }
    };

    fetchBlog();
  }, [post]); 
  
    {loading && <p>Loading......</p>}
{error && <p>error</p>}  
  return (
    <div>
      {blog ? (
         <div className="mt-20 max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg my-10 overflow-hidden">
         <div className="text-center mb-6">
         <div className="mb-8">
          { blog.image && <img
            src={blog.image}
            alt={blog.title}
            className="w-full h-auto rounded-lg shadow-md"
          />}
        </div>
           <h1 className="text-4xl font-extrabold text-gray-900">{blog.title}</h1>
           <p className="text-lg text-gray-500 mt-2">By{blog.user?.name}|Posted on {new Date(blog.created_at).toLocaleDateString()}</p>
         </div>
         <div className="mt-4">
           <p className="text-gray-700 leading-relaxed text-xl">{blog.body}</p>
         </div>
   
         <div className="mt-6 text-center">
           <button 
             onClick={() => navigate('/')} 
             className="px-6 py-2 bg-gray-800 text-white rounded-full hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
           >
             Back to Blogs
           </button>
         </div>
         </div>
      ) : (
        <p>Loading...................</p>
      )}
    </div>
  );
}

export default Blog;
