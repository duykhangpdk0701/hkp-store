import { useQuery } from "@tanstack/react-query";
import { Divider, Form, FormInstance, Radio, Space } from "antd";
import React, { useState, FC } from "react";
import checkoutApi from "../../../../Api/checkoutApi";

interface ISelectPaymentMethodPopUp {
  form: FormInstance<{ payment: string }>;
  onFinish: (values: any) => void;
}

const SelectPaymentMethodPopUp: FC<ISelectPaymentMethodPopUp> = (props) => {
  const { form, onFinish } = props;
  const paymentQuery = useQuery({
    queryKey: ["payment"],
    queryFn: checkoutApi.getListPaymentMethod,
  });

  return (
    <Form layout="vertical" form={form} onFinish={onFinish}>
      <div className="flex flex-col">
        <Form.Item name="payment" noStyle>
          <Radio.Group>
            <Space direction="vertical" className="w-full">
              {paymentQuery?.data?.map((item) => {
                const value = JSON.stringify(item);
                return (
                  <Radio
                    key={item.id}
                    value={value}
                    onChange={() => form.submit()}
                  >
                    {item.name}
                  </Radio>
                );
              })}
            </Space>
          </Radio.Group>
        </Form.Item>
      </div>
    </Form>
  );
};

export default SelectPaymentMethodPopUp;
