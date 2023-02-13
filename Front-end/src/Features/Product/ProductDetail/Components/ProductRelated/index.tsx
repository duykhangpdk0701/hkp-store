import { Col, Row } from "antd";
import React from "react";
import ProductItem from "../../../ListProduct/Components/ProductShop/ProductItem";

const ProductRelated = () => {
  return (
    <div>
      <div className="text-center mb-12">
        <h2 className="text-3xl font-semibold">Related Products</h2>
        <p>
          Contemporary, minimal and modern designs embody the Lavish Alice
          handwriting
        </p>
      </div>
      <div>
        <Row gutter={[25, 25]}>
          {/* <Col span={24} lg={6} md={8}>
            <ProductItem />
          </Col>
          <Col span={24} lg={6} md={8}>
            <ProductItem />
          </Col>
          <Col span={24} lg={6} md={8}>
            <ProductItem />
          </Col>
          <Col span={24} lg={6} md={8}>
            <ProductItem />
          </Col> */}
        </Row>
      </div>
    </div>
  );
};

export default ProductRelated;
