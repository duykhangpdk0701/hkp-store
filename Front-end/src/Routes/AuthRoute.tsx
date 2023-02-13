import React from "react";
import { Routes, Route } from "react-router-dom";
import Login from "../Features/Auth/Login";
import Register from "../Features/Auth/Register";

const AuthRoute = () => {
  return (
    <Routes>
      <Route path="login" element={<Login />} />
      <Route path="register" element={<Register />} />
    </Routes>
  );
};

export default AuthRoute;
