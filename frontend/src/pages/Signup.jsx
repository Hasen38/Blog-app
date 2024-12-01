import React,{useState} from 'react'
// import { AppContext } from '../Context/Appcontext'

function Signup() {

  // const{setToken} = useContext(AppContext);

const[formData, setformData] = useState({
  fullname: "",
  email: "",
  password: "",
  password_confirmation: ""
});
 const [ errors , seterrors] = useState({});
async function handleregister(e){
e.preventdefault();
const res = await fetch("/api/register",{
 method:"POST",
 body:JSON.stringify(formData),
});
const data = await res.json();
console.log(data);
if(data.errors){
  seterrors(data.errors);
} else {
  localStorage.setItem('token', data.token);
  setToken(data.token);
}
}
return (
  <div className="bg-slate-200 flex justify-center items-center h-screen">
        <div className="w-96 p-6 shodow-lg bg-white rounded-md mt-0">
            <h1 className="text-3xl font-semibold text-center">Register</h1>
            <hr className="mt-3"/>
            <div className="mt-3">
                <form onSubmit={handleregister}>
               <div>
                 < label htmlFor ="fullname" className="block text-base mb-4">FullName</ label >
                <input type="text" name="fullname" className="input " placeholder="Enter your email....."value={formData.fullname} onChange={(e)=>setformData({...formData,fullname:e.target.value})}/>
               </div>
                  {errors.fullname && <p> {errors.fullname[0]}</p>}
<div>
< label htmlFor= "email" className="block text-base mb-4">Email</ label >
                <input type="email" name="email" value={formData.email} onChange={(e)=>setformData({...formData,email:e.target.value})} className="input" placeholder="Enter your email....."/>
</div>
{errors.email && <p> {errors.email[0]}</p>}

<div>
< label  htmlFor="password" className="block text-base mb-4">Password</ label >
                <input type="password" name="password" value={formData.password} onChange={(e)=>setformData({...formData,password:e.target.value})}className="input " placeholder="Enter your password....."/>
</div>
{errors.password && <p> {errors.password[0]}</p>}
<div>
< label htmlFor="password_confirmation" className="block text-base mb-4">Confirm Password</ label >
                <input type="password" name="password_confirmation" className="input" value={formData.password_confirmation} onChange={(e)=>setformData({...formData,password_confirmation:e.target.value})}  placeholder="Enter your password....."/>
</div>
<div className="mt-5">
<button type = "submit" className="btn">Register</button>
</div>
                </form>        

</div>
</div>
</div>        
  )
}


export default Signup;
