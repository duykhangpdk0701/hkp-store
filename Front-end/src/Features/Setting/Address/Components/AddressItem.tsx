import { useMutation } from "@tanstack/react-query";
import { Button, Modal, notification, Spin, Tag } from "antd";
import { useForm } from "antd/es/form/Form";
import { update } from "lodash";
import React, { FC, useState } from "react";
import addressApi from "../../../../Api/addressApi";
import UpdateAddress from "../../../../Components/UpdateAddress";
import IAddress from "../../../../Interfaces/Address";
import IUpdateAddress from "../../../../Model/UpdateAddress";

interface IAddressItem {
  data: IAddress;
  refetch: () => void;
  isDefault: boolean;
}

const AddressItem: FC<IAddressItem> = (props) => {
  const { data, refetch, isDefault } = props;
  const [isLoading, setIsLoading] = useState(false);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [form] = useForm();

  const deleteMutation = useMutation({
    mutationKey: ["addAddress"],

    mutationFn: () => addressApi.deleteAddress(data.id),
    onSuccess: () => {
      notification.success({
        message: "Success",
        description: "Delete address successfully",
        placement: "bottomLeft",
      });
    },
  });

  const setDefaultAddress = useMutation({
    mutationKey: ["setDefaultAddress"],

    mutationFn: () => addressApi.setDefaultAddress(data.id),
    onSuccess: () => {
      notification.success({
        message: "Success",
        description: "Set Default address successfully",
        placement: "bottomLeft",
      });
    },
  });

  const UpdateAddressMutation = useMutation({
    mutationKey: ["updateAddress"],
    mutationFn: ({
      addressId,
      name,
      city,
      district,
      ward,
      address,
    }: IUpdateAddress) =>
      addressApi.updateAddress(addressId, name, city, district, ward, address),
    onSuccess: () => {
      notification.success({
        message: "Success",
        description: "Update address successfully",
        placement: "bottomLeft",
      });
    },
  });

  const handleSetDefaultAddress = async () => {
    setIsLoading(true);
    await setDefaultAddress.mutateAsync();
    await refetch();
    setIsLoading(false);
  };

  const handleDeleteAddress = async () => {
    setIsLoading(true);
    await deleteMutation.mutateAsync();
    await refetch();
    setIsLoading(false);
  };

  const showModal = async () => {
    form.setFieldsValue({
      name: data.name,
      address: data.address,
      city: data.city_id,
      district: data.district_id,
      ward: data.ward_id,
    });
    setIsModalOpen(true);
  };

  const handleOk = () => {
    form.submit();
  };

  const handleCancel = () => {
    setIsModalOpen(false);
  };

  const onFinish = async (values: any) => {
    setIsLoading(true);
    const { name, city, district, ward, address } = values;
    await UpdateAddressMutation.mutateAsync({
      addressId: data.id,
      name,
      city,
      district,
      ward,
      address,
    });
    setIsModalOpen(false);
    await refetch();
    setIsLoading(false);
  };

  return (
    <>
      <Modal
        title="Update Address"
        open={isModalOpen}
        onOk={handleOk}
        onCancel={handleCancel}
        confirmLoading={UpdateAddressMutation.isLoading}
      >
        <UpdateAddress form={form} onFinish={onFinish} />
      </Modal>

      <Spin spinning={isLoading} tip="Loading...">
        <div className="py-5">
          <div>
            <div className="flex justify-between">
              <div className="flex items-center">
                <span className="text-base font-medium">{data.name}</span>
              </div>
              <div className="flex items-center">
                <Button type="link" onClick={showModal}>
                  Update
                </Button>
                <Button type="link" onClick={handleDeleteAddress}>
                  Delete
                </Button>
              </div>
            </div>

            <div className="flex justify-between mb-1">
              <div>
                <div>
                  <span className="text-sm text-slate-500 font-light">
                    {data.address}
                  </span>
                </div>
                <div>
                  <span className="text-sm text-slate-500 font-light">
                    {data.parse_address_string}
                  </span>
                </div>
              </div>
              <div>
                <Button disabled={isDefault} onClick={handleSetDefaultAddress}>
                  Set as Default
                </Button>
              </div>
            </div>

            <div>
              <div>{isDefault && <Tag color="red">Default</Tag>}</div>
              <div></div>
            </div>
          </div>
        </div>
      </Spin>
    </>
  );
};

export default AddressItem;
