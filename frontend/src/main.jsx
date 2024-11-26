import React from 'react';
import * as ReactDOM from "react-dom/client";
// import { RouterProvider } from "react-router-dom";
import App  from './App';
import AppProvider from './Context/Appcontext';

ReactDOM.createRoot(document.getElementById('root')).render(
    <AppProvider>
     <App/>
     </AppProvider>

);
