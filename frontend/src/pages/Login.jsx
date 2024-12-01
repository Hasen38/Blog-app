import React,{useState} from 'react'
import axios from 'axios';


function Login() {
  // const{setToken} = useContext(AppContext);

const[formData, setFormData] = useState({
  fullname: "",
  email: "",
  password: "",
  password_confirmation: ""
})
const handlelogin = (ev) => {
ev.preventdefault()
}

return (
  <div className="bg-slate-200 flex justify-center items-center h-screen">
        <div className="w-96 p-6 shodow-lg bg-white rounded-md mt-0">
            <h1 className="text-3xl font-semibold text-center">Login to Your Acount</h1>
            <hr className="mt-3"/>
            <div className="mt-3">
                <form onSubmit={handlelogin}>
    <div>
<label label htmlFor= "email" className="block text-base mb-4">Email</label >
                <input type="email" name="email" value={formData.email} onChange={(e)=>setFormData({...formData,email:e.target.value})} className="input" placeholder="Enter your email....."/>
</div>
{/* {errors.email && <p> {errors.email[0]}</p>} */}

<div>
< label  htmlFor="password" className="block text-base mb-4">Password</ label >
                <input type="password" name="password" value={formData.password} onChange={(e)=>setFormData({...formData,password:e.target.value})}className="input" placeholder="Enter your password....."/>
</div>
{/* {errors.password && <p> {errors.password[0]}</p>} */}
<div className="mt-5">
<button type = "submit" className="btn">Login</button>
</div>
                </form>        

</div>
</div>
</div>        
  )

}
export default Login;
