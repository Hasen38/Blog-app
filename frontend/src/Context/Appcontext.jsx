// import { createContext, useState } from "react";
// // import axios from "axios";
//   export const AppContext = createContext();

// export default function AppProvider({children})
// {
// const [ token, _setToken] = useState(localStorage.getItem('ACCESS_TOKEN'));
// const [user, setUser] = useState(null);

// const setToken = (token)=> {
//     _setToken(token)
//     if (token) {
//       localStorage.setItem('ACCESS_TOKEN',token); 
//     }else{
//         localStorage.removeItem('ACCESS_TOKEN');
//     }

// return(
    
//     <AppContext.Provider value={{token, 
//         user,
//       setToken 
//      ,setUser}}>
//     {children}
//     </AppContext.Provider>
//     );
// }
// }
