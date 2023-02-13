import { Divider, Image } from "antd";
import React, { FC } from "react";
import IOrder from "../../../../../Interfaces/Order";
import toVND from "../../../../../Utils/toVND";

interface IOrderDetailItem {
  data?: IOrder;
}
const OrderDetailItem: FC<IOrderDetailItem> = (props) => {
  const { data } = props;
  return (
    <>
      {data?.order_items.map((item) => (
        <div className="flex mt-3">
          <div className="flex-1 mb-3 flex">
            <div>
              <Image
                src={item.item.thumbnail_url}
                className="w-20 h-20"
                preview={false}
              />
            </div>
            <div className="ml-3">
              <div className="text-base font-medium">{item.item_name}</div>
              <div className="text-xs text-gray-500">
                <span>type: </span>(<span>{item.size_value}</span>,{" "}
                <span>{item.color_name}</span>)
              </div>
              <div>
                <span>x{item.quantity}</span>
              </div>
            </div>
          </div>
          <div>
            <span className="text-xs text-orange-500">{toVND(item.price)}</span>
          </div>
        </div>
      ))}
      <Divider className="my-0" />
      <div className="mt-6 mb-6">
        <div className="flex justify-end items-center">
          <span className="mr-2 text-sm">Total</span>
          <span className="text-lg font-medium text-orange-500">
            {toVND(data?.total)}
          </span>
        </div>
      </div>
    </>
  );
};

export default OrderDetailItem;
