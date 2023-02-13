import { Breadcrumb } from "antd";
import React, { FC, ReactNode } from "react";
import { Link } from "react-router-dom";

interface ICartLayout {
  CartList: ReactNode;
  OrderSummary: ReactNode;
}

const CartLayout: FC<ICartLayout> = (props) => {
  const { CartList, OrderSummary } = props;
  return (
    <div className="mx-auto px-7 max-w-[1140px]">
      <div>
        <Breadcrumb>
          <Breadcrumb.Item>
            <Link to="/">Home</Link>
          </Breadcrumb.Item>
          <Breadcrumb.Item>
            <Link to="/cart">Cart</Link>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <div className="flex flex-col lg:flex-row">
        <div className="basis-full lg:basis-[calc(100%-360px)]">{CartList}</div>
        <div className="basis-full lg:basis-[360px]">{OrderSummary}</div>
      </div>
    </div>
  );
};

export default CartLayout;
