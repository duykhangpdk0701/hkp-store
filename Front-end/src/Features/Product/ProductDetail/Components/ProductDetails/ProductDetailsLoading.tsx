import { Col, Form, Row, Skeleton, Space } from "antd";
import React from "react";

const ProductDetailsLoading = () => {
  return (
    <div>
      <Row gutter={20}>
        <Col lg={10} md={10}>
          <div className="h-full">
            <Skeleton.Image active={true} className="w-full h-full" />
          </div>
        </Col>
        <Col lg={14} md={14}>
          <Form>
            <Form.Item>
              <Space>
                <Skeleton.Input
                  className="rounded-lg"
                  size="small"
                  active={true}
                />
                <Skeleton.Button
                  className="rounded-lg"
                  size="small"
                  active={true}
                />
                <Skeleton.Input
                  className="rounded-lg"
                  size="small"
                  active={true}
                />
              </Space>
            </Form.Item>
            <div className="mb-4">
              <span className="text-sm font-medium">$70.00</span>
            </div>
            <div>
              <Skeleton active={true} paragraph={{ rows: 4 }} />
            </div>
            <div className="flex">
              <Form.Item
                label={
                  <span className="text-base font-bold mr-20">Color:</span>
                }
              >
                <Skeleton.Input className="rounded-lg" active={true} />
              </Form.Item>
            </div>
            <div className="flex">
              <Form.Item
                label={<span className="text-base font-bold mr-20">Size:</span>}
              >
                <Skeleton.Input className="rounded-lg" active={true} />
              </Form.Item>
            </div>
            <div className="flex">
              <Form.Item
                initialValue={1}
                label={<span className="text-base font-bold">Quantity</span>}
              >
                <Skeleton.Input className="rounded-lg" active={true} />
              </Form.Item>
              <Skeleton.Button className="ml-2" active={true} />
            </div>
          </Form>
        </Col>
      </Row>
    </div>
  );
};

export default ProductDetailsLoading;
