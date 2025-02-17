import React from 'react';
import { Outlet } from 'react-router-dom';
import Navbar from '../components/navbar';
import Footer from '../components/Footer'


function Mainlayout() {
  return (
    <div className="min-h-screen flex flex-col bg-gray-50">
      {/* Header */}
      <header className="bg-white shadow-md sticky top-0 z-50">
        <div className="container mx-auto">
          <Navbar />
        </div>
      </header>

      {/* Main Content */}
      <main className="flex-grow py-6">
        <Outlet />
      </main>

      {/* Footer */}
      <footer className="bg-white shadow-md mt-auto">
        <div className="container mx-auto">
          <Footer />
        </div>
      </footer>
    </div>
  );
}

export default Mainlayout;
