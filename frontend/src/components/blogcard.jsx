// import React from 'react';
import { Link } from 'react-router-dom';

const BlogCard = ({ posts}) => {
//   Display loading message while fetching data
//   if (loading) {
//     return <div>Loading...</div>;
//   }

  // Check if posts exist, if not display a message
  if (!posts || posts.length === 0) {
    return <p>Loading.........</p>;
  }

  return (
    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      {posts.map((post) => (
        <div key={post.id} className="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white transform transition duration-300 hover:scale-105">
          {/* Blog Image */}
          {/* {post.image && (
            <img
              className="w-full h-48 object-cover"
              src={post.image}
              alt={post.title}
            />
          )} */}

          {/* Blog Content */}
          <div className="p-6">
            {post.image ? (<img src={`storage/${post.image}`} className='w-50' alt="images" />):(<p>No image</p>
            )}
            <h2 className="text-2xl font-bold text-gray-800">{post.title}</h2>
            <p className="text-gray-600 text-sm my-2">
              By {post.user?.name} | {new Date(post.created_at).toLocaleDateString()}
            </p>
            <p className="text-gray-700 text-base line-clamp-3">{post.body}</p>

            <div className="mt-4 flex justify-between items-center">
              <Link
                to={`/show/${post.id}`} // Link to the individual post
                className="text-blue-600 hover:text-blue-800 font-semibold"
              >
                Read more
              </Link>
            </div>
            <div>
           <Link to={`edit/${post.id}`} className="px-6 py-2 bg-gray-800 text-white rounded-full hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">Edit</Link>
           </div>
          </div>
        </div>
))}
    
    </div>
  );
};

export default BlogCard;
