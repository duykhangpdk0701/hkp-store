import { useQuery } from "@tanstack/react-query";
import React from "react";
import { useParams } from "react-router-dom";
import orderApi from "../../../../Api/orderAPI";
import OrderDetailAddress from "./Components/OrderDetailAddress";
import OrderDetailItem from "./Components/OrderDetailItem";
import OrderDetailLayout from "./Components/OrderDetailLayout";
import StepProgressOrderDetail from "./Components/StepProgressOrderDetail";

const OrderDetail = () => {
  const { orderCode } = useParams();
  const { data, isLoading } = useQuery(["orderDetail"], () => {
    if (orderCode) {
      return orderApi.getOrderDetail(orderCode);
    }
    return;
  });
  return (
    <OrderDetailLayout
      stepProgressOrderDetail={
        <StepProgressOrderDetail current={data?.order_status_id} />
      }
      orderDetailAddress={
        <OrderDetailAddress
          shippingAddress={data?.shipping_address}
          shippingPhone={data?.shipping_phone}
        />
      }
      orderDetailItem={<OrderDetailItem data={data} />}
    />
  );
};

export default OrderDetail;
