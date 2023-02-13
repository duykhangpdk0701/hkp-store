import React, { FC, ReactNode } from "react";
import orderApi from "../../../../../Api/orderAPI";
import StepProgressOrderDetail from "./StepProgressOrderDetail";

interface IOrderDetailLayout {
  stepProgressOrderDetail: ReactNode;
  orderDetailAddress: ReactNode;
  orderDetailItem: ReactNode;
}
const OrderDetailLayout: FC<IOrderDetailLayout> = (props) => {
  const { stepProgressOrderDetail, orderDetailAddress, orderDetailItem } =
    props;
  return (
    <div className="p-8">
      <div>{stepProgressOrderDetail}</div>
      <div>{orderDetailAddress}</div>
      <div>{orderDetailItem}</div>
    </div>
  );
};

export default OrderDetailLayout;
