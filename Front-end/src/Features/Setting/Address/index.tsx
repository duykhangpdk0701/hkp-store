import { useMutation, useQuery } from "@tanstack/react-query";
import { notification } from "antd";
import { useForm } from "antd/es/form/Form";
import React, { useState } from "react";
import addressApi from "../../../Api/addressApi";
import authApi from "../../../Api/authAPI";
import AddAddress from "../../../Components/AddAddress";
import IAddAddress from "../../../Model/AddAddress";
import AddressLayout from "./Components/AddressLayout";

const Address = () => {
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [form] = useForm<IAddAddress>();
  const [isLoading, setIsLoading] = useState(false);
  const addressMutation = useMutation({
    mutationKey: ["addAddress"],

    mutationFn: ({ name, city, district, ward, address }: IAddAddress) =>
      addressApi.createNewAddress(name, city, district, ward, address),
  });

  const userDetailQuery = useQuery({
    queryKey: ["address"],
    queryFn: authApi.getUserDetail,
  });

  const showModal = () => {
    setIsModalOpen(true);
  };

  const handleOk = () => {
    form.submit();
  };

  const handleCancel = () => {
    setIsModalOpen(false);
  };

  const refetch = async () => {
    await userDetailQuery.refetch();
  };

  const onFinish = async (values: IAddAddress) => {
    setIsLoading(true);
    const { name, city, district, ward, address } = values;

    await addressMutation.mutateAsync(
      { name, city, district, ward, address },
      {
        onSuccess: () => {
          notification.success({
            message: "Success",
            description: "create address successfully",
            placement: "bottomLeft",
          });
          setIsModalOpen(false);
        },
      }
    );
    await refetch();
    setIsLoading(false);
  };

  return (
    <AddressLayout
      defaultAddressId={userDetailQuery.data?.address_default?.id}
      refetch={refetch}
      isLoading={isLoading}
      showModal={showModal}
      handleCancel={handleCancel}
      handleOk={handleOk}
      isOpen={isModalOpen}
      AddAddress={<AddAddress form={form} onFinish={onFinish} />}
      address={userDetailQuery.data?.multiple_address}
    />
  );
};

export default Address;
