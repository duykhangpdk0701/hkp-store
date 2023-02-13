import { Button, Result } from "antd";
import React from "react";
import { Link } from "react-router-dom";

const PurchaseSuccess = () => {
  return (
    <Result
      status="success"
      title="Successfully Purchased Item!"
      subTitle="Thank you for choosing us."
      extra={[
        <Link to={"/"}>
          <Button type="primary" key="console">
            Go to Home
          </Button>
        </Link>,
        <Link to={"/product"}>
          <Button key="buy">Buy Again</Button>
        </Link>,
      ]}
    />
  );
};

export default PurchaseSuccess;
