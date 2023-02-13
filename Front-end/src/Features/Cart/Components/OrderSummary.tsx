import { Button } from "antd";
import React, { FC } from "react";
import { Link } from "react-router-dom";
import toVND from "../../../Utils/toVND";

interface IOrderSummary {
  totalPrice?: string;
  totalShipping?: string;
  total?: string;
}

const OrderSummary: FC<IOrderSummary> = (props) => {
  const { totalPrice, totalShipping, total } = props;
  console.log(toVND(totalPrice));

  return (
    <div className="mt-6">
      <div className="mx-6">
        <div className="font-semibold mb-4 font-base">Total</div>
        <div className="mb-2 flex text-xs">
          <span className="basis-full">Sub Total</span>
          <span className="ml-4">{toVND(totalPrice)}</span>
        </div>
        <div className="mb-2 flex text-xs">
          <span className="basis-full">Shipping fee</span>
          <span className="ml-4">{toVND(totalShipping)}</span>
        </div>
        <div className="mb-2 flex text-xs font-bold">
          <span className="basis-full">Total</span>
          <span className="ml-4">{toVND(total)}</span>
        </div>
      </div>
      <div className="mt-5 mx-6">
        <Link to="/check-out">
          <Button block type="primary">
            Check Out
          </Button>
        </Link>
      </div>
    </div>
  );
};

export default OrderSummary;
