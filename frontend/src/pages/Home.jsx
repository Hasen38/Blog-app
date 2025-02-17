import React, { useState, useEffect } from "react";
import axiosClient from "../Axios/Axios-client";
import BlogCard from "../components/Blogcard";
import Banner from "../components/banner";
import CategoryGrid from "../components/CategoryGrid";
// import { Link } from "react-router-dom";
import Pagination from "../components/Pagination";

function Home() {
  const [posts, setPosts] = useState({ data: [], meta: {} });
  const [categories, setCategories] = useState([]);
  const [selectedCategory, setSelectedCategory] = useState("all");
  const [currentPage, setCurrentPage] = useState(1);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchCategories = async () => {
      try {
        const response = await axiosClient.get("/categories");
        setCategories(response.data);
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    };
    fetchCategories();
  }, []);

  useEffect(() => {
    const fetchPosts = async () => {
      setLoading(true);
      try {
        const url =
          selectedCategory === "all"
            ? `/posts?page=${currentPage}`
            : `/posts?category=${selectedCategory}&page=${currentPage}`;
        const response = await axiosClient.get(url);

        // Let's log the response to see what we're getting
        console.log("API Response:", response.data);

        setPosts({
          data: response.data.posts.data,
          meta: {
            current_page: response.data.posts.current_page,
            last_page: response.data.posts.last_page,
            per_page: response.data.posts.per_page,
            total: response.data.posts.total,
          },
        });
      } catch (error) {
        console.error("Error fetching posts:", error);
      } finally {
        setLoading(false);
      }
    };
    fetchPosts();
  }, [selectedCategory, currentPage]);

  const getSelectedCategoryName = () => {
    if (selectedCategory === "all") return "Latest Posts";
    const category = categories.find((c) => c.id === selectedCategory);
    return category ? `Posts in ${category.name}` : "";
  };

  const handlePageChange = (page) => {
    setCurrentPage(page);
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  return (
    <>
      <div className="w-full">
        <Banner />
      </div>
      <div className="container mx-auto">
        <CategoryGrid
          categories={categories}
          selectedCategory={selectedCategory}
          onCategorySelect={setSelectedCategory}
        />
        <div className="mt-12">
          <h2 className="mb-6 text-2xl font-bold text-center text-gray-800">
            {getSelectedCategoryName()}
          </h2>
          {loading ? (
            <div className="flex justify-center items-center h-32">
              <div className="w-12 h-12 rounded-full border-b-2 border-purple-600 animate-spin"></div>
            </div>
          ) : (
            <>
              <BlogCard posts={posts.data} loading={loading} />
              {posts.meta.last_page > 1 && (
                <Pagination
                  currentPage={posts.meta.current_page}
                  totalPages={posts.meta.last_page}
                  onPageChange={handlePageChange}
                />
              )}
            </>
          )}
        </div>
      </div>
    </>
  );
}

export default Home;
