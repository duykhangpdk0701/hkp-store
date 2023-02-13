import "antd/dist/antd.variable.min.css";
import React, { useEffect } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import ContextRoutes from "./Routes/ContextRoutes";
import AuthRoute from "./Routes/AuthRoute";
import { useMutation, useQuery } from "@tanstack/react-query";
import cartApi from "./Api/cartApi";
import { setUserCartId } from "./Contexts/slices/cartSlice";
import { logOut } from "./Contexts/slices/authSlice";
import { useAppDispatch, useAppSelector } from "./Hooks/redux";

function App() {
  const dispatch = useAppDispatch();
  const authState = useAppSelector((state) => state.auth.current);

  const quotesCart = useMutation({
    mutationKey: ["quotes"],
    mutationFn: cartApi.getQuotes,
    onSuccess(data) {
      dispatch(setUserCartId({ cartId: data.id }));
    },
    onError(err: any) {
      if (err.code === 401) {
        dispatch(logOut());
      }
    },
  });

  useEffect(() => {
    if (authState.isLogIn) {
      quotesCart.mutate();
    }
  }, []);

  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path="/*" element={<ContextRoutes />} />
          <Route path="/auth/*" element={<AuthRoute />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
