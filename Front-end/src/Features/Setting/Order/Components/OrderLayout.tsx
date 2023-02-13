import { Tabs } from "antd";
import React from "react";
import OrderCancel from "./Contents/OrderCancel";
import AllOrder from "./Contents/AllOrder";
import OrderPending from "./Contents/OrderPending";
import OrderShipped from "./Contents/OrderShipped";
import OrderProcessing from "./Contents/OrderProcessing";
import "./OrderLayout.scss";
import OrderComplete from "./Contents/OrderComplete";

const tabItems = [
  {
    label: `All`,
    key: "1",
    children: <AllOrder />,
  },
  {
    label: "Pending",
    key: "2",
    children: <OrderPending />,
  },
  {
    label: `Completed`,
    key: "3",
    children: <OrderComplete />,
  },
  {
    label: `Canceled`,
    key: "4",
    children: <OrderCancel />,
  },
];

const OrderLayout = () => {
  return (
    <div className="p-8">
      <div>
        <Tabs size="large" items={tabItems} />
      </div>
    </div>
  );
};

export default OrderLayout;
