import { Button, Col, Row, Steps } from "antd";
import React, { FC } from "react";

interface IStepProgressOrderDetail {
  current?: number;
}

const steps = [
  {
    title: "Confirm",
    description: "You has confirmed placing an order",
  },
  {
    title: "Pedding",
    description: "Your order are in pedding",
  },
  {
    title: "Complete",
    description: "Package had been deliverd",
  },
];

const StepProgressOrderDetail: FC<IStepProgressOrderDetail> = (props) => {
  const { current } = props;
  return (
    <Row>
      <Col xs={24}>
        <Steps current={current}>
          {steps.map((item) => (
            <Steps.Step title={item.title} description={item.description} />
          ))}
        </Steps>
      </Col>
      <Col xs={24}>
        <div className="flex justify-end py-5">
          <Button size="large" type="primary">
            Canncel Order
          </Button>
        </div>
      </Col>
    </Row>
  );
};

export default StepProgressOrderDetail;
