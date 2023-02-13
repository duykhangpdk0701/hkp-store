import { PlusOutlined } from "@ant-design/icons";
import { Button, Card, Modal } from "antd";
import React, { FC, useState, ReactNode } from "react";

interface IAddAndSelectInput {
  onChange?: (value: any) => void;
  title: string;
  label: string;
  children: JSX.Element;
  displayValue?: ReactNode;
}

const AddAndSelectInput: FC<IAddAndSelectInput> = (props) => {
  const { onChange, children, label, title, displayValue } = props;
  const [isModalOpen, setIsModalOpen] = useState(false);

  const showModal = () => {
    setIsModalOpen(true);
  };

  const handleOk = () => {
    setIsModalOpen(false);
  };

  return (
    <>
      <Card size="small" title={title}>
        <div>{displayValue}</div>
        <Button type="text" block onClick={showModal}>
          <div className="flex justify-between text-xs font-semibold text-orange-600">
            <div>{label}</div>
            <div>
              <PlusOutlined />
            </div>
          </div>
        </Button>
      </Card>
      <Modal
        title={title}
        open={isModalOpen}
        onOk={handleOk}
        cancelButtonProps={{ className: "hidden" }}
        centered
      >
        {children}
      </Modal>
    </>
  );
};

export default AddAndSelectInput;
