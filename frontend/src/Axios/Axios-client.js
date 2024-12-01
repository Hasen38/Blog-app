// import React, {} from 'react';
// import {axios} from 'axios';


// const axiosClient = axios.create({
//     baseURL: `${import.meta.env.API_BASE_URL}/api`
// });

// axiosClient.interceptors.request.use((config)=> {
//     const token = localStorage.getItem('ACCESS_TOKEN')
//     config.headers.Authorization = `Bearer ${token}`
//     return config;
// })

// axiosClient.interceptors.Response.use((response)=>{
// return response;
// },(error)=>{
// const {response} = error;
// if(response.status === 401){
//     localStorage.removeItem('ACCESS_TOKEN')
// }
// });