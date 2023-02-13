import { useQuery } from "@tanstack/react-query";
import { Empty, Space } from "antd";
import React from "react";
import orderApi from "../../../../../Api/orderAPI";
import OrderItem from "../OrderItem";
import LoadingOrder from "./LoadingOrder";

const OrderComplete = () => {
  const { data, isLoading } = useQuery(
    ["orderComplete"],
    orderApi.getAllComplete
  );

  return isLoading ? (
    <LoadingOrder />
  ) : (
    <div>
      <Space size={25} className="w-full" direction="vertical">
        {data?.length === 0 ? (
          <Empty />
        ) : (
          data?.map((item) => <OrderItem data={item} />)
        )}
      </Space>
    </div>
  );
};

export default OrderComplete;
