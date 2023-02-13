import { Breadcrumb } from "antd";
import React, { FC, ReactNode } from "react";
import { Link } from "react-router-dom";

interface IProductLayout {
  detailComponent: ReactNode;
  infoComponent: ReactNode;
  relateComponent: ReactNode;
}

const ProductLayout: FC<IProductLayout> = (props) => {
  const { detailComponent, infoComponent, relateComponent } = props;
  return (
    <div className="mx-auto px-7 max-w-[1140px]">
      <div className="py-10">
        <Breadcrumb>
          <Breadcrumb.Item>
            <Link to="/">Home</Link>
          </Breadcrumb.Item>
          <Breadcrumb.Item>
            <Link to="/product">Shop</Link>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
      <div className="mb-20">{detailComponent}</div>
      <div className="mb-20">{infoComponent}</div>
      <div className="mb-20">{relateComponent}</div>
    </div>
  );
};

export default ProductLayout;
