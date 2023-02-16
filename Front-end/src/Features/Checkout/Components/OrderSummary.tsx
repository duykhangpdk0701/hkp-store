import { Button } from "antd";
import React, { FC } from "react";
import toVND from "../../../Utils/toVND";

interface IOrderSummary {
  handleSubmit: () => void;
  isLoading: boolean;
  subTotal?: string;
  shippingFee?: string;
  total?: string;
}

const OrderSummary: FC<IOrderSummary> = (props) => {
  const { handleSubmit, isLoading, subTotal, shippingFee, total } = props;

  return (
    <div className="mt-6">
      <div className="mx-6">
        <div className="font-semibold mb-4">Order</div>
        <div className="mb-2 flex text-xs">
          <span className="basis-full">Sub total</span>
          <span className="ml-4 whitespace-nowrap">{toVND(subTotal)}</span>
        </div>
        <div className="mb-2 flex text-xs">
          <span className="basis-full">Shipping fee</span>
          <span className="ml-4 whitespace-nowrap">{toVND(shippingFee)}</span>
        </div>
        <div className="mb-2 flex text-xs font-bold">
          <span className="basis-full">Total</span>
          <span className="ml-4 whitespace-nowrap">{toVND(total)}</span>
        </div>
      </div>
      <div className="mt-5 mx-6">
        <Button block type="primary" onClick={handleSubmit} loading={isLoading}>
          Confirm
        </Button>
      </div>
    </div>
  );
};

export default OrderSummary;
