import React, { FC, useState } from "react";
import { Form, Slider, Row, Col, InputNumber, Input, Button } from "antd";
import { DollarOutlined } from "@ant-design/icons";

type SliderType = [number, number];

interface ISliderInput {
  onChange?: (values: any) => void;
  initialValue?: [number, number];
}

const SliderInput: FC<ISliderInput> = (props) => {
  const { onChange, initialValue } = props;
  const [value, setValue] = useState(initialValue);

  const handleOnChange = (values: SliderType) => {
    setValue(values);
    if (onChange) {
      onChange(values);
    }
  };

  return (
    <div>
      <Form.Item name="range" initialValue={[10000, 5000000]}>
        <Slider
          min={10000}
          max={5000000}
          step={10000}
          range
          onChange={handleOnChange}
          value={value}
        />
      </Form.Item>
      <Input.Group>
        <Row>
          <Col span={24}>
            <Row justify="space-between">
              <Col flex={"45%"}>
                <InputNumber
                  defaultValue={10000}
                  value={value ? value[0] : undefined}
                  prefix={<DollarOutlined />}
                  controls={false}
                  className="w-full"
                  formatter={(value) =>
                    `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                  }
                />
              </Col>
              <Col>
                <div className="h-full flex items-center">-</div>
              </Col>
              <Col flex={"45%"}>
                <InputNumber
                  defaultValue={5000000}
                  value={value ? value[1] : undefined}
                  prefix={<DollarOutlined />}
                  controls={false}
                  className="w-full"
                  formatter={(value) =>
                    `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                  }
                />
              </Col>
            </Row>
          </Col>
          <Col span={24}>
            <div className="flex justify-end my-2">
              <Button type="primary" shape="round" htmlType="submit">
                FILTER
              </Button>
            </div>
          </Col>
        </Row>
      </Input.Group>
    </div>
  );
};

export default SliderInput;
