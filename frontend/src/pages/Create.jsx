import React, { useState, useEffect } from "react";
import axiosClient from "../Axios/Axios-client";
import { useNavigate } from "react-router-dom";

function CreateBlog() {
  const navigate = useNavigate();
  const [user, setUser] = useState(null);
  const [formData, setFormData] = useState({
    title: "",
    body: "",
    image: null,
    category_id: "",
    user_id: "",
  });
  const [imagePreview, setImagePreview] = useState("");
  const [categories, setCategories] = useState([]);
  useEffect(() => {
    const fetchCategories = async () => {
      try {
        const response = await axiosClient.get("/categories");
        setCategories(response.data);
        if (response.data.length > 0) {
          setFormData((prev) => ({
            ...prev,
            category_id: response.data[0].id,
          }));
        }
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    };

    fetchCategories();
  }, []);

  useEffect(() => {
    const fetchUser = async () => {
      try {
        const response = await axiosClient.get("/user");
        if (response.data && response.data.id) {
          setUser(response.data);
          setFormData((prev) => ({
            ...prev,
            user_id: response.data.id.toString(),
          }));
        } else {
          console.error("No valid user data received");
          navigate("/login");
        }
      } catch (error) {
        console.error("Error fetching user:", error);
        navigate("/login");
      }
    };
    fetchUser();
  }, [navigate]);

  // Event Handlers
  const handleInputChange = (e) => {
    const { id, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [id]: value,
    }));
  };

  const handleImageChange = (e) => {
    const file = e.target.files[0];
    if (file) {
      setFormData((prev) => ({
        ...prev,
        image: file,
      }));
      setImagePreview(URL.createObjectURL(file));
    }
  };
  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!formData.user_id) {
      console.error("No user_id available");
      return;
    }

    try {
      const submitData = new FormData();

      // Explicitly add user_id first
      submitData.append("user_id", formData.user_id);

      // Then add the rest of the form data
      Object.keys(formData).forEach((key) => {
        if (formData[key] && key !== "user_id") {
          submitData.append(key, formData[key]);
        }
      });

      // Debug log
      for (let pair of submitData.entries()) {
        console.log(pair[0] + ": " + pair[1]);
      }

      await axiosClient.post("/posts", submitData);
      navigate("/");
    } catch (error) {
      console.error("Error submitting the form:", error);
    }
  };

  // Component Rendering
  const renderImagePreview = () => {
    if (!imagePreview) return null;

    return (
      <div className="mt-4">
        <img
          src={imagePreview}
          alt="Preview"
          className="max-w-full h-auto rounded-lg shadow-md"
        />
      </div>
    );
  };

  return (
    <div className="p-6 mx-auto max-w-2xl">
      <h1 className="mb-6 text-3xl font-bold text-center">Create a New Blog</h1>

      <form
        onSubmit={handleSubmit}
        className="p-6 bg-white rounded-lg shadow-lg"
        encType="multipart/form-data"
        method="POST"
      >
        {/* Title input */}
        <div className="mb-4">
          <label
            className="block mb-2 font-semibold text-gray-700"
            htmlFor="title"
          >
            Blog Title
          </label>
          <input
            type="text"
            id="title"
            className="p-3 w-full rounded-lg border"
            placeholder="Enter the title"
            value={formData.title}
            onChange={handleInputChange}
            required
          />
        </div>
        <div>
          <input type="hidden" id="user_id" name="user_id" value={user?.id} />
        </div>

        {/* Category Selection */}
        <div className="mb-4">
          <label
            className="block mb-2 font-semibold text-gray-700"
            htmlFor="category_id"
          >
            Category
          </label>
          <select
            id="category_id"
            className="p-3 w-full rounded-lg border"
            value={formData.category_id}
            onChange={handleInputChange}
            required
          >
            <option value="">Select a category</option>
            {categories.map((category) => (
              <option key={category.id} value={category.id}>
                {category.name}
              </option>
            ))}
          </select>
        </div>

        {/* Image upload */}
        <div className="mb-4">
          <label className="block mb-2 text-lg text-gray-700" htmlFor="image">
            Upload Image
          </label>
          <input
            type="file"
            id="image"
            onChange={handleImageChange}
            className="p-3 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
            accept="image/*"
          />
          {renderImagePreview()}
        </div>

        {/* Body content */}
        <div className="mb-6">
          <label
            className="block mb-2 font-semibold text-gray-700"
            htmlFor="body"
          >
            Blog Content
          </label>
          <textarea
            id="body"
            className="p-3 w-full rounded-lg border"
            placeholder="Write your blog content"
            value={formData.body}
            onChange={handleInputChange}
            rows="5"
            required
          />
        </div>

        {/* Submit button */}
        <button
          type="submit"
          className="py-3 w-full text-white bg-blue-500 rounded-lg transition duration-200 hover:bg-blue-600"
        >
          Publish
        </button>
      </form>
    </div>
  );
}

export default CreateBlog;
