import React from "react";
import Footer from "../Layout/Footer";
import Header from "../Layout/Header";
import { Routes, Route } from "react-router-dom";
import Home from "../Features/Home";
import ListProduct from "../Features/Product/ListProduct";
import ProductDetail from "../Features/Product/ProductDetail";
import Cart from "../Features/Cart";
import Checkout from "../Features/Checkout";
import SettingRoute from "./SettingRoutes";
import PurchaseSuccess from "../Features/PurchaseSuccess";
import AboutUs from "../Features/About";
import Contact from "../Features/Contact";
import PrivateRoute from "./PrivateRoute";

const ContextRoutes = () => {
  return (
    <>
      <Header />
      <main style={{ minHeight: "87vh" }} className="mb-20">
        <Routes>
          <Route index element={<Home />} />
          <Route
            path="cart"
            element={
              <PrivateRoute>
                <Cart />
              </PrivateRoute>
            }
          />
          <Route
            path="check-out"
            element={
              <PrivateRoute>
                <Checkout />
              </PrivateRoute>
            }
          />
          <Route path="product">
            <Route index element={<ListProduct />} />
            <Route path=":slug" element={<ProductDetail />} />
          </Route>
          <Route path="about" element={<AboutUs />} />
          <Route path="contact" element={<Contact />} />
          <Route
            path="setting/*"
            element={
              <PrivateRoute>
                <SettingRoute />
              </PrivateRoute>
            }
          />
          <Route
            path="purchase-success"
            element={
              <PrivateRoute>
                <PurchaseSuccess />
              </PrivateRoute>
            }
          />
        </Routes>
      </main>
      <Footer />
    </>
  );
};

export default ContextRoutes;
