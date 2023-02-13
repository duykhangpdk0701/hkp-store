import { Col, Row, Tabs } from "antd";
import React from "react";
import InfoContent from "./Components/InfoContent";
import ReviewsContent from "./Components/ReviewsContent";
import SheetContent from "./Components/SheetContent";

const items = [
  {
    label: "MORE INFO",
    key: "tab1",
    children: <InfoContent />,
  },
  {
    label: "DATA SHEET",
    key: "tab2",
    children: <SheetContent />,
  },
  {
    label: "REVIEWS",
    key: "tab3",
    children: <ReviewsContent />,
  },
];

const ProductInfo = () => {
  return (
    <div>
      <Row>
        <Col span={24}>
          <div className="border border-solid border-gray-300 py-7 px-10">
            <Tabs items={items} />
          </div>
        </Col>
      </Row>
    </div>
  );
};

export default ProductInfo;
