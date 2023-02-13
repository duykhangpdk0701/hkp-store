import { Breadcrumb } from "antd";
import React, { FC, ReactNode } from "react";
import { Link } from "react-router-dom";

interface ICheckoutLayout {
  OrderSummary: ReactNode;
  OrderCheckout: ReactNode;
}

const CheckoutLayout: FC<ICheckoutLayout> = (props) => {
  const { OrderSummary, OrderCheckout } = props;

  return (
    <div className="mx-auto px-7 max-w-[1140px]">
      <Breadcrumb>
        <Breadcrumb.Item>
          <Link to="/">Home</Link>
        </Breadcrumb.Item>
        <Breadcrumb.Item>
          <Link to="/cart">Check Out</Link>
        </Breadcrumb.Item>
      </Breadcrumb>

      <div className="flex flex-col lg:flex-row items-start relative">
        <div className="basis-full lg:basis-[calc(100%-360px)]">
          {OrderCheckout}
        </div>
        <div className="basis-full lg:basis-[360px] sticky top-[52px]">
          {OrderSummary}
        </div>
      </div>
    </div>
  );
};

export default CheckoutLayout;
