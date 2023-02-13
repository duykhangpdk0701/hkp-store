import { PlusOutlined } from "@ant-design/icons";
import { Button, Divider, Modal, Spin } from "antd";
import React, { ReactNode, FC, Fragment } from "react";
import IAddress from "../../../../Interfaces/Address";
import AddressItem from "./AddressItem";

interface IAdressLayout {
  isOpen: boolean;
  showModal: () => void;
  handleOk: () => void;
  handleCancel: () => void;
  AddAddress: ReactNode;
  address?: IAddress[];
  isLoading: boolean;
  refetch: () => void;
  defaultAddressId?: number;
}

const AddressLayout: FC<IAdressLayout> = (props) => {
  const {
    isOpen,
    showModal,
    handleOk,
    handleCancel,
    AddAddress,
    address,
    isLoading,
    refetch,
    defaultAddressId,
  } = props;

  return (
    <>
      <Spin spinning={isLoading} tip="Loading...">
        <div className="p-8">
          <div className="flex justify-between items-center">
            <div className="text-lg font-medium">My Address</div>
            <Button icon={<PlusOutlined />} type="primary" onClick={showModal}>
              Add an new address
            </Button>
          </div>
          <Divider className="mt-3 mb-5" />
          <div>
            <div className="text-lg font-medium">Address</div>
            <div>
              {address?.map((item, index) => (
                <Fragment key={item.id}>
                  <AddressItem
                    data={item}
                    refetch={refetch}
                    isDefault={item.id === defaultAddressId ? true : false}
                  />
                  {index < address.length - 1 && <Divider className="my-0" />}
                </Fragment>
              ))}
            </div>
          </div>
        </div>
      </Spin>
      <Modal
        title="Add Address"
        open={isOpen}
        onOk={handleOk}
        onCancel={handleCancel}
      >
        {AddAddress}
      </Modal>
    </>
  );
};

export default AddressLayout;
