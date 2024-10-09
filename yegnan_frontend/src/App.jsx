import { Route , Routes } from "react-router-dom"
import Error404 from "./view/error404"
import Home from "./view/home"
import Login from "./view/auth/login"
import Register from "./view/auth/register"  


function App() {
   return (
       <Routes>
           <Route path="/" element={<Home />} />
           <Route path="/login" element={<Login />} />
           <Route path="/register" element={<Register />} />
           <Route path="*" element={<Error404 />} />
       </Routes>
   )
}
export default App
