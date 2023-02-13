import { Col, Row } from "antd";
import React from "react";
import { Route, Routes } from "react-router-dom";
import Address from "../Features/Setting/Address";
import ChangePassword from "../Features/Setting/ChangePassword";
import Order from "../Features/Setting/Order";
import OrderDetail from "../Features/Setting/Order/OrderDetail";
import UserProfile from "../Features/Setting/UserProfile";
import UserProfileSideBar from "../Layout/UserProfileSideBar";

const SettingRoute = () => {
  return (
    <div className="max-w-[1140px] mx-auto">
      <Row>
        <Col span={5}>
          <UserProfileSideBar />
        </Col>
        <Col span={19}>
          <Routes>
            <Route index element={<UserProfile />} />
            <Route path="address" element={<Address />} />
            <Route path="change-password" element={<ChangePassword />} />
            <Route path="order" element={<Order />} />
            <Route path="order/:orderCode" element={<OrderDetail />} />
          </Routes>
        </Col>
      </Row>
    </div>
  );
};

export default SettingRoute;
