import { PlusOutlined } from "@ant-design/icons";
import { useQuery } from "@tanstack/react-query";
import { Button, Divider, Form, FormInstance, Modal, Radio, Space } from "antd";
import React, { FC, ReactNode, useState } from "react";
import authApi from "../../../../Api/authAPI";
import RadioItem from "./RadioItem";

interface ISelectAddressPopUp {
  AddAddress: ReactNode;
  form: FormInstance<{ address: string }>;
  onFinish: (values: any) => void;
}

const SelectAddressPopUp: FC<ISelectAddressPopUp> = (props) => {
  const { AddAddress, form, onFinish } = props;
  const [isModalOpen, setIsModalOpen] = useState(false);

  const userDetailQuery = useQuery({
    queryKey: ["address"],
    queryFn: authApi.getUserDetail,
  });

  const showAddAddressModal = () => {
    setIsModalOpen(true);
  };

  const handleAddAddressModalOk = () => {
    setIsModalOpen(false);
  };

  const handleAddAddressModalCancel = () => {
    setIsModalOpen(false);
  };

  return (
    <>
      <Form layout="vertical" form={form} onFinish={onFinish}>
        <div className="flex flex-col">
          <Form.Item name="address" noStyle>
            <Radio.Group>
              <Space
                direction="vertical"
                size={0}
                className="w-full"
                split={<Divider className="my-0" />}
              >
                {userDetailQuery.data?.multiple_address.map((item) => {
                  const value = JSON.stringify(item);
                  const isDefault =
                    item.id === userDetailQuery.data.address_default.id;
                  return (
                    <Radio
                      key={item.id}
                      value={value}
                      onChange={() => form.submit()}
                    >
                      <RadioItem data={item} isDefault={isDefault} />
                    </Radio>
                  );
                })}
              </Space>
            </Radio.Group>
          </Form.Item>

          <Form.Item noStyle>
            <Button block icon={<PlusOutlined />} htmlType="submit">
              add address
            </Button>
          </Form.Item>
        </div>
      </Form>
      <Modal
        centered
        title="Add an address"
        open={isModalOpen}
        onOk={handleAddAddressModalOk}
        onCancel={handleAddAddressModalCancel}
      >
        {AddAddress}
      </Modal>
    </>
  );
};

export default SelectAddressPopUp;
