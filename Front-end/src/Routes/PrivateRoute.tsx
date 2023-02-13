import React from "react";
import { Navigate, useLocation } from "react-router-dom";
import { useAppSelector } from "../Hooks/redux";

const PrivateRoute = ({ children }: { children: JSX.Element }) => {
  const auth = useAppSelector((state) => state.auth.current);
  const location = useLocation();
  if (!auth.isLogIn) {
    return <Navigate to="/auth/login" state={{ from: location }} replace />;
  }

  return children;
};

export default PrivateRoute;
