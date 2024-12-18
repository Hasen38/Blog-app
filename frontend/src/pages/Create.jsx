import React, { useState } from 'react';
import axiosClient from '../Axios/Axios-client';
import { useNavigate } from 'react-router-dom';

function CreateBlog() {
  const navigate = useNavigate();
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");
  const [image, setImage] = useState(null);
  const [imagePreview, setImagePreview] = useState("");

  // Handle image selection and preview
  const handleImageChange = (e) => {
    const file = e.target.files[0];
    if (file) {
      setImage(file);
      setImagePreview(URL.createObjectURL(file));  // For preview
    }
  };

  // Handle form submission
  const handleSubmit = (e) => {
    e.preventDefault();

    // Create a new FormData object and append form fields
    const formData = new FormData();
    formData.append('title', title);
    formData.append('body', body);
    if (image) formData.append('image', image);

    // Send POST request to API
    axiosClient
      .post('/posts', formData) // Directly pass the formData
      .then(() => {
        navigate('/'); // Navigate to homepage after successful submission
      })
      .catch((error) => {
        console.error("There was an error submitting the form!", error);
        // Handle error (optional: show an error message to the user)
      });
  };

  return (
    <div className="max-w-2xl mx-auto p-6">
      <h1 className="text-3xl font-bold text-center mb-6">Create a New Blog</h1>
      
      <form onSubmit={handleSubmit} className="bg-white p-6 rounded-lg shadow-lg" encType='multipart/form-data'>
        {/* Title input */}
        <div className="mb-4">
          <label className="block text-gray-700 font-semibold mb-2" htmlFor="title">
            Blog Title
          </label>
          <input
            type="text"
            id="title"
            className="w-full p-3 border rounded-lg"
            placeholder="Enter the title"
            value={title}
            onChange={(e) => setTitle(e.target.value)}
            required
          />
        </div>

        {/* Image upload */}
        <div className="mb-4">
          <label className="block text-gray-700 text-lg mb-2" htmlFor="image">
            Upload Image
          </label>
          <input
            type="file"
            id="image"
            onChange={handleImageChange}
            className="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            accept="image/*"
          />
          {imagePreview && (
            <div className="mt-4">
              <img
                src={imagePreview}
                alt="Preview"
                className="max-w-full h-auto rounded-lg shadow-md"
              />
            </div>
          )}
        </div>

        {/* Body content */}
        <div className="mb-6">
          <label className="block text-gray-700 font-semibold mb-2" htmlFor="body">
            Blog Content
          </label>
          <textarea
            id="body"
            className="w-full p-3 border rounded-lg"
            placeholder="Write your blog content"
            value={body}
            onChange={(e) => setBody(e.target.value)}
            rows="5"
            required
          />
        </div>

        {/* Submit button */}
        <button
          type="submit"
          className="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-200"
        >
          Publish
        </button>
      </form>
    </div>
  );
}

export default CreateBlog;
