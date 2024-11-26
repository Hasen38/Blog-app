import React, { useContext } from 'react'
import Banner from '../components/banner';
import { AppContext } from '../Context/Appcontext';

function home() {
  const {name} = useContext(AppContext);
  return (
    <div>
       <Banner/>
{name}
    </div>

  )
}

export default home;

