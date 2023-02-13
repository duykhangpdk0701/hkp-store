import { Typography } from "antd";
import React, { FC } from "react";

interface IOderDetailAddress {
  shippingAddress?: string;
  shippingPhone?: string;
}
const OrderDetailAddress: FC<IOderDetailAddress> = (props) => {
  const { shippingAddress, shippingPhone } = props;
  return (
    <div>
      <div
        className="h-[2px] mb-5"
        style={{
          backgroundImage:
            "repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px)",
        }}
      ></div>
      <div>
        <Typography.Title level={3}>Delivery Address</Typography.Title>
        <Typography.Text className="block">
          Address: {shippingAddress}
        </Typography.Text>
        <Typography.Text className="block">
          Phone: {shippingPhone}
        </Typography.Text>
      </div>{" "}
      <div
        className="h-[2px] my-5"
        style={{
          backgroundImage:
            "repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px)",
        }}
      ></div>
    </div>
  );
};

export default OrderDetailAddress;
