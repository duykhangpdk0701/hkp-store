import { Breadcrumb, Col, Drawer, Row } from "antd";
import React, { FC, ReactNode, useState } from "react";
import { Link } from "react-router-dom";

interface IProductLayout {
  shop: ReactNode;
  sidebar: ReactNode;
  drawer: ReactNode;
}

const ProductLayout: FC<IProductLayout> = (props) => {
  const { sidebar, shop, drawer } = props;

  return (
    <div className="px-5">
      <Row justify="center">
        <Col flex={"1140px"}>
          <div>
            <Row>
              <Col span={24}>
                <Breadcrumb>
                  <Breadcrumb.Item>
                    <Link to="/">Home</Link>
                  </Breadcrumb.Item>
                  <Breadcrumb.Item>
                    <Link to="/product">Shop</Link>
                  </Breadcrumb.Item>
                </Breadcrumb>
              </Col>
            </Row>
            <Row gutter={20}>
              <Col lg={6} xs={0}>
                {sidebar}
              </Col>
              <Col lg={18} xs={24}>
                {shop}
              </Col>
            </Row>
            {drawer}
          </div>
        </Col>
      </Row>
    </div>
  );
};

export default ProductLayout;
