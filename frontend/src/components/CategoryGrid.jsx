import React from 'react';
import { CATEGORY_ICONS } from '../constants/categoryIcons';

const CategoryGrid = ({ categories, selectedCategory, onCategorySelect }) => {
  const categoryItemClass = (isSelected) =>
    `cursor-pointer p-4 rounded-lg transition-all duration-300 transform hover:scale-105 ${
      isSelected
        ? 'bg-purple-600 text-white'
        : 'bg-white text-gray-800 hover:bg-purple-50'
    } shadow-md`;

  const getCategoryIcon = (name) => CATEGORY_ICONS[name] || CATEGORY_ICONS.default;

  return (
    <div className="my-8">
      <h2 className="text-2xl font-bold text-gray-800 mb-6 text-center">Explore With Category</h2>
      <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div
          onClick={() => onCategorySelect('all')}
          className={categoryItemClass(selectedCategory === 'all')}
        >
          <div className="text-3xl mb-2">📚</div>
          <h3 className="font-semibold">All Posts</h3>
          <p className="text-sm opacity-75">View everything</p>
        </div>

        {categories.map((category) => (
          <div
            key={category.id}
            onClick={() => onCategorySelect(category.id)}
            className={categoryItemClass(selectedCategory === category.id)}
          >
            <div className="text-3xl mb-2">{getCategoryIcon(category.name)}</div>
            <h3 className="font-semibold">{category.name}</h3>
            <p className="text-sm opacity-75">View posts</p>
          </div>
        ))}
      </div>
    </div>
  );
};

export default CategoryGrid;
