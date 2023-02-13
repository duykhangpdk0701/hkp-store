import { Col, Row, Skeleton, Space } from "antd";
import React from "react";

const ProductItemLoading = () => {
  return (
    <div>
      <Row gutter={[25, 25]}>
        <Col span={24} lg={8} md={8}>
          <Space direction="vertical" className="w-full">
            <div className="h-64">
              <Skeleton.Image className="w-full h-full" active={true} />
            </div>
            <div>
              <Skeleton.Input active={true} block className="w-full" />
            </div>
            <div>
              <Skeleton.Input active={true} size="small" />
            </div>
          </Space>
        </Col>
        <Col span={24} lg={8} md={8}>
          <Space direction="vertical" className="w-full">
            <div className="h-64">
              <Skeleton.Image className="w-full h-full" active={true} />
            </div>
            <div>
              <Skeleton.Input active={true} block className="w-full" />
            </div>
            <div>
              <Skeleton.Input active={true} size="small" />
            </div>
          </Space>
        </Col>
        <Col span={24} lg={8} md={8}>
          <Space direction="vertical" className="w-full">
            <div className="h-64">
              <Skeleton.Image className="w-full h-full" active={true} />
            </div>
            <div>
              <Skeleton.Input active={true} block className="w-full" />
            </div>
            <div>
              <Skeleton.Input active={true} size="small" />
            </div>
          </Space>
        </Col>
        <Col span={24} lg={8} md={8}>
          <Space direction="vertical" className="w-full">
            <div className="h-64">
              <Skeleton.Image className="w-full h-full" active={true} />
            </div>
            <div>
              <Skeleton.Input active={true} block className="w-full" />
            </div>
            <div>
              <Skeleton.Input active={true} size="small" />
            </div>
          </Space>
        </Col>
        <Col span={24} lg={8} md={8}>
          <Space direction="vertical" className="w-full">
            <div className="h-64">
              <Skeleton.Image className="w-full h-full" active={true} />
            </div>
            <div>
              <Skeleton.Input active={true} block className="w-full" />
            </div>
            <div>
              <Skeleton.Input active={true} size="small" />
            </div>
          </Space>
        </Col>
      </Row>
    </div>
  );
};

export default ProductItemLoading;
