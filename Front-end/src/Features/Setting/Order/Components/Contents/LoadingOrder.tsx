import { Space } from "antd";
import React from "react";
import OrderItemLoading from "../OrderItemLoading";

const LoadingOrder = () => {
  return (
    <div>
      <Space size={25} className="w-full" direction="vertical">
        <OrderItemLoading />
        <OrderItemLoading />
        <OrderItemLoading />
        <OrderItemLoading />
      </Space>
    </div>
  );
};

export default LoadingOrder;
